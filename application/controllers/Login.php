<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
  
    public function index()
  {
    if ($this->session->userdata('email')) {
            redirect('user');
        }
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
    $data['judul_halaman'] = 'Login - Opentrip';
    $data['navActive'] = $data['judul_halaman'];
    $this->load->view('layout/Front-end/Login/V_Login', $data, FALSE);
    } else {
            $this->_login();
        }
  }

  private function _login()
  {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //select * form table user dan row array untuk satu baris
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) { // if jika usernya ada
            if ($user['user_aktif'] == 1) { //if apakah user tersebut aktive
                //cek password apakah yg di input sama tidak dengan data yang di database
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'level_akses' => $user['level_akses']
                        //role id nantinya akan menentukan untuk menu, akan lebih banyak daripada member
                    ];
                    //simpan datanya kedalam session sebagai userdata dari array diatas
                    $this->session->set_userdata($data);
                    if ($user['level_akses'] == 1) {
                        redirect('user/dashboardAdmin');
                    } elseif($user['level_akses'] == 2) {
                        redirect('user');
                    } elseif($user['level_akses'] == 3) {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email has not been activated!</div>');
                redirect('login');
            }
        } else { // kalo tidak kasi pesan eror
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered!</div>');
            redirect('login');
        }
    
  }

  public function dashboardAdmin()
  {
    $data['judul_halaman'] = 'Admin Dashboard';
    $data['navActive'] = "Admin Dashboard";
    $data['content'] = 'layout/Back-end/Admin/V_Dashboard';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
    
  }

    public function registrasi()
    {
        //agar saat login atau sedang dalam sistem tidak dapat masuk kelogin
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }

        //name diambil dari form,required yaitu form tidak bole kosong
        //trim untuk menghapus spasi jadi ridak masuk ke database
        $this->form_validation->set_rules('nama_depan', 'Nama_depan', 'required|trim');
        $this->form_validation->set_rules('nama_belakang', 'Nama_belakang', 'required|trim');
        $this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        //is_unique akan mengecek table di data base hanya tinggal masukan nama table dan field nya
        //minimal length nya berapa lalau matches untuk harus sama dengan inputan yg mana
        $this->form_validation->set_rules('password1', 'Password',  'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password',  'required|trim|matches[password1]');

        if ($this->form_validation->run() == false)
        {
        $data['judul_halaman'] = 'Registrasi - Opentrip';
        $this->load->view('layout/Front-end/Login/V_Registrasi', $data, FALSE);
        } 
        else {
            $email = $this->input->post('email', true);
            $data = [
                'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
                'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                //enkripsi password menggunakan hash dan algoritma PASSWORD_DEFAULT suapaya dipilihkan yg terbaik oleh php
                'foto_profil' => 'default.jpg',
                'foto_sampul' => 'default.jpg',
                'level_akses' => 1,
                'user_aktif' => 0,
                'tanggal_registrasi' => time()
            ];

            //siapkan token berupa bilangan random untuk link ke email agar bisa aktivasi
            $token = base64_encode(random_bytes(32)); //untuk membuat bilangan random 32 digit dibungkus lagi oleh fungsi base64 agar dapat dikenali oleh sql 2 2 fungsi punya php
            //var_dump($token);
            //die;
            //lalu masukan pada table sementara
            $usertoken = [
                'email' => $email,
                'token' => $token,
                'tanggal_token' => time() //untuk membuat sebuah aturan jika pada 1 hari user tidak di aktivasi maka
            ];

            $this->db->insert('user', $data);
            $this->db->insert('usertoken', $usertoken);

            //setalah datanya di insert maka kirim email keuser yg tadi registrasi
            //parameter $token untuk mengirim token ke email
            //paremeter verify untuk inisialisasi email bahwa email g dikirm untuk veryfikasi email
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation your account has been created. please Actived your account</div>');
            redirect('login');
        }
    }

    //jadi send email memiliki argument untuk membedakan tujuan pengiriman email
    //argument untuk membedakan apakah dia veryfikasi atau forgot password
    private function _sendEmail($token, $type)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'WandaSalon199802@gmail.com',    // Ganti dengan email gmail kamu
            'smtp_pass' => 'Salonwanda199802',      // Password gmail kamu
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];
        $ci = get_instance();
        $ci->email->initialize($config);
        // Email dan nama pengirim
        $ci->email->from('no-reply@WandaSalon.com', 'WandaSalon.com | WandaSalon');
        // Email penerima
        $email = $this->input->post('email');
        $ci->email->to($email); // Ganti dengan email tujuan kamu

        if ($type == 'verify') {
            // Subject email
            $ci->email->subject('Account verification');
            // Isi email
            $ci->email->message('click this link to verify your account :    <a href="' . base_url() . 'login/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>');
            //urlencode adalah fungsi untuk menerjemahkan token yg ada di url, agar token dapat terbaca oleh url
        } else if ($type == 'forgot') {
            // Subject email
            $ci->email->subject('Reset Password');
            // Isi email
            $ci->email->message('click this link to reset your password :    <a href="' . base_url() . 'login/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            //jika gagal tempilkan erornya
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $usertoken = $this->db->get_where('usertoken', ['token' => $token])->row_array();

            if ($usertoken) {
                //cek apakah waktu aktivasi kurang dari 1 hari
                if (time() - $usertoken['tanggal_token'] < (60 * 60 * 24)) {

                    $this->db->set('user_aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user'); //kalo pake query builder

                    $this->db->delete('usertoken', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated!</div>');
                    redirect('login');
                } else {
                    $this->db->detele('user', ['email' => $email]);
                    $this->db->delete('usertoken', ['email' => $usertoken]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Account activation failed! Token Expired! .</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Account activation failed! wrong token .</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activation failed! wrong email.</div>');
            redirect('login');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('akses_level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            you have been logged out!</div>');
        redirect('login');
    }

    public function blocked()
    {
        $this->load->view('login/blocked');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/forgot-password');
            $this->load->view('templates/login_footer');
        } else {
            $email = $this->input->post('email');
            //ambil data email dan activited
            //jadi pengeckkan nya langsung 2
            $user = $this->db->get_where('user', ['email' => $email, 'user_aktif' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $usertoken = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal_registrasi' => time()
                ];

                $this->db->insert('usertoken', $usertoken);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    please check your email to reset your password</div>');
                redirect('login/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email is not registred or activated !</div>');
                redirect('login/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $usertoken = $this->db->get_where('usertoken', ['token' => $token])->row_array();
            if ($usertoken) {
                //bikin sebua session yg ada padasaat user sedang mereset password saja
                //kalo resetnya sudah selesai hapus lagi sessionnya yang isinya email
                $this->session->set_userdata('reset_email', $email);
                // lalu alihkan pada halaman reset password halaman tersebut tidak bisa diakses kecuali menekan link yg telah dikirmkan ke email sehingga tidak bisa langsung diakses atau session nya ga ada maka tidak bisa diakses
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Reset Password failed! Wrong Token!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Reset Password failed! Wrong Email!</div>');
            redirect('login');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/change-password');
            $this->load->view('templates/login_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    password has been changed!</div>');
            redirect('login');
        }
    }
}

/* End of file Login.php */

?>