<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaGuide extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Opentrip');
    }

  public function index()
  {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->where('level_akses =', 2);
    $data['user'] = $this->db->get('user')->result_array();
    $data['judul_halaman'] = 'Kelola Data Guide';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataGuide/V_KelolaDataGuide';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function tambahGuide()
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
    $data['judul_halaman'] = 'Kelola Data Guide';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataGuide/VT_KelolaDataGuide';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    } else{
    $email = $this->input->post('email', true);
    $data = [
        'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
        'email' => htmlspecialchars($email),
        'foto_profil' => 'default.jpg',
        'foto_sampul' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'level_akses' => 2,
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
        redirect('kelolaGuide');
    }
  }

  public function ubahGuide(){
  $id =  $this->input->post('id');
  $user_aktif = $this->input->post('user_aktif');
  $data = [
    'id' => $id,
    'user_aktif' => $user_aktif
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
  redirect('kelolaGuide');
  }
  public function hapusGuide(){
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
          redirect('KelolaGuide');
  }
  
}


/* End of file Guide.php */


?>