<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaCalonPendaki extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Opentrip');
    }

  public function index()
  {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->where('level_akses =', 3);
    $data['user'] = $this->db->get('user')->result_array();
    $data['judul_halaman'] = 'Kelola Data Calon Pendaki';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataCalonPendaki/V_KelolaDataCalonPendaki';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function tambahCalonPendaki()
  {
    $this->form_validation->set_rules('nama_depan', 'Nama_depan', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);
    $this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email|is_unique[user.email]', 
    [   'required' => 'Email tidak boleh kosong!',
        'is_unique' => 'Email Telah terdaftar'
    ]);

    $this->form_validation->set_rules('password1', 'Password',  'required|trim|min_length[3]|matches[password2]', 
    [       'required' => 'Password tidak boleh kosong!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
    ]);
    $this->form_validation->set_rules('password2', 'Password',  'required|trim|matches[password1]',
    [       'required' => 'Password tidak boleh kosong!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
    ]);
  

  if ($this->form_validation->run() == false) {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Data Calon Pendaki';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataCalonPendaki/VT_KelolaDataCalonPendaki';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    } else{
    $email = $this->input->post('email', true);
    $data = [
        'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
        'email' => htmlspecialchars($email),
        'foto_profil' => 'default.jpg',
        'foto_sampul' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'level_akses' => 3,
        'user_aktif' => htmlspecialchars($this->input->post('user_aktif')),
        'tanggal_registrasi' => time()
    ];

      $this->M_Opentrip->tambah_data($data, 'user');
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Tambah!</span>
                        </div>');
        redirect('kelolaCalonPendaki');
    }
  }

  public function ubahCalonPendaki(){
  $id =  $this->input->post('id');
  $email = $this->input->post('email');
  $password = $this->input->post('password');
  $nama_depan = $this->input->post('nama_depan');
  $nama_belakang = $this->input->post('nama_belakang');
  $foto_P = $this->input->post('foto_profil');
  $foto_S = $this->input->post('foto_sampul');
  $level = $this->input->post('level_akses');
  $user_aktif = $this->input->post('user_aktif');
  $tanggal_R = $this->input->post('tanggal_registrasi');
  $alamat = $this->input->post('alamat');
  $no_telepon = $this->input->post('no_telepon');
  
  $data = [
    'id' => $id,
    'email' => $email,
    'password' => $password,
    'nama_depan' => $nama_depan,
    'nama_belakang' => $nama_belakang,
    'foto_profil' => $foto_P,
    'foto_sampul' => $foto_S,
    'level_akses' => $level,
    'user_aktif' => $user_aktif,
    'tanggal_registrasi' => $tanggal_R,
    'alamat' => $alamat,
    'no_telepon' => $no_telepon
  ];

  $where = array('id' => $id);
  $this->M_Opentrip->ubah_data($where, $data, 'user');
  $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data Berhasil diubah !</span>
                        </div>');
  redirect('kelolaCalonPendaki');
  }
  public function hapusCalonPendaki(){
    $id = $this->input->post('id');
        $this->M_Opentrip->Hapus_data(['id' => $id], 'user');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show">
													<button type="button" aria-hidden="true" class="close" data-dismiss="alert"
														aria-label="Close">
														<i class="nc-icon nc-simple-remove"></i>
													</button>
													<span>
														<b> Danger - </b> Data telah Terhapus! </span>
                        </div>');
          redirect('KelolaCalonPendaki');
  }
  
}

/* End of file KelolaCalonPendaki.php */


?>