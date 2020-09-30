<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('M_Opentrip');
    }

  public function index()
  {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $email = $this->session->userdata('email');
    $data['jumlahPemesanan'] = $this->M_Opentrip->hitungJumlahPaket($email);
    $data['judul_halaman'] = 'Profil Saya';
    $data['content'] = 'layout/Back-end/Calon_Pendaki/V_Profil_saya';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
    
  }

  public function dashboardAdmin()
  {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Admin Dashboard';
    $data['content'] = 'layout/Back-end/Admin/V_Dashboard';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
    
  }
  public function ubahProfil()
  {
    $this->form_validation->set_rules('nama_depan', 'Nama_depan', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);
    $this->form_validation->set_rules('nama_belakang', 'Nama_belakang', 'required|trim',
    ['required' => 'nama belakang tidak boleh kosong!']);
    $this->form_validation->set_rules('no_telepon', 'No_telepon', 'required|trim',
    ['required' => 'no telepon tidak boleh kosong!']);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
    ['required' => 'Alamat tidak boleh kosong!']);


  if ($this->form_validation->run() == false) {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Profil Saya';
    $data['content'] = 'layout/Back-end/Calon_Pendaki/V_ubahProfil';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    
    }else{
    $data['user'] = $this->db->get_where('user',['email' => $email])->row_array();
    $email = $this->input->post('email', true);
    $id= $this->input->post('id');
    
    $data = [
        'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
        'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true))
    ];
    $this->db->set($data);
    $upload_image2 = $_FILES['foto_profil']['name'];
    if ($upload_image2) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/foto_profil';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_profil')) {
            $old_image = $data['user']['foto_profil'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/foto_profil/' . $old_image);
              }
          $new_image2 = $this->upload->data('file_name');
          $dataimg = ['foto_profil' => $new_image2];
          $this->db->set($dataimg);
        }else {
        echo $this->upload->display_errors();
      }
    }

      $upload_image1 = $_FILES['foto_sampul']['name'];
    if ($upload_image1) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/foto_profil';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_sampul')) {
            $old_image = $data['user']['foto_sampul'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/foto_profil/' . $old_image);
              }
          $new_image1 = $this->upload->data('file_name');
          $dataimg = ['foto_sampul' => $new_image1];
          $this->db->set($dataimg);
        }else {
        echo $this->upload->display_errors();
      }
    }
    
    
    $this->db->where('id', $id);
    $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Ubah!</span>
                        </div>');
        redirect('User');
    }
  }

  public function ubahPassword()
    {
        $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
        $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul_halaman'] = 'Profil Saya';
        $data['content'] = 'layout/Back-end/Calon_Pendaki/V_ubahPassword';
        $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
        } else {
          $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $curren_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($curren_password, $data['akun']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong current password!</div>');
                redirect('User/ubahPassword');
            } else {
                if ($curren_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!</div>');
                    redirect('User/ubahPassword');
                } else {
                    //password sudah oke
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email')); //emal didapat dari user data
                    $this->db->update('user');

                   $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Ubah!</span>
                        </div>');
                    redirect('user');
                }
            }
        }
    }
}





/* End of file User.php */
