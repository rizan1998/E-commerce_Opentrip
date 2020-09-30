<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PaketPendakian extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Opentrip');
        date_default_timezone_set('Asia/Jakarta');
    }

  public function index()
  {
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user_data = $this->session->userdata('email');
    $this->db->where('email =', $user_data );
    $data['joinPaketPendakian'] = $this->M_Opentrip->joinPaketPendakian();
    $data['paket_pendakian'] = $this->M_Opentrip->paketpendakian();
    $data['paket_pendakian2'] = $this->M_Opentrip->paketpendakian();
    $data['judul_halaman'] = 'Kelola Paket Pendakian';
    $data['content'] = 'layout/Back-end/Guide/PaketPendakian/V_PaketPendakian';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 

  }

  public function tambahPaketPendakian()
  {
    $this->form_validation->set_rules('kodepaket', 'kodepaket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);
    
    $this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email', 
    [   'required' => 'Email tidak boleh kosong!'
    ]);

    $this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('tanggal_berakhir', 'tanggal_berakhir', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('titik_kumpul', 'titik_kumpul', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('kouta_paket', 'kouta_paket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('perlengkapan_pribadi', 'perlengkapan_pribadi', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('harga_paket', 'harga_paket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('no_rekening_admin', 'no_rekening_admin', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('kode_gunung', 'kode_gunung', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

  if ($this->form_validation->run() == false) {
    $dariDB = $this->M_Opentrip->cekkodepaket();
    $nourut = substr($dariDB, 3, 3);
    $kodePaketSekarang = $nourut + 1;
    $data = array('kode_paket' => $kodePaketSekarang);

    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Paket Pendakian';
    $data['gunung'] = $this->db->get('gunung')->result_array();
    $data['content'] = 'layout/Back-end/Guide/PaketPendakian/VT_PaketPendakian';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    } else{
    $email = $this->input->post('email', true);
    $data = [
        'email'=> htmlspecialchars($this->input->post('email')),
        'kodepaket'=> htmlspecialchars($this->input->post('kodepaket')),
        'tanggal_mulai'=> htmlspecialchars($this->input->post('tanggal_mulai')),
        'tanggal_berakhir'=> htmlspecialchars($this->input->post('tanggal_berakhir')),
        'titik_kumpul'=> htmlspecialchars($this->input->post('titik_kumpul')),
        'kouta_paket'=> htmlspecialchars($this->input->post('kouta_paket')),
        'perlengkapan_pribadi'=> htmlspecialchars($this->input->post('perlengkapan_pribadi')),
        'harga_paket'=> htmlspecialchars($this->input->post('harga_paket')),
        'no_rekening_admin'=> htmlspecialchars($this->input->post('no_rekening_admin')),
        'kode_gunung'=> htmlspecialchars($this->input->post('kode_gunung')),
    ];
    $dataFasilitas = [
        'nama_fasilitas' => htmlspecialchars($this->input->post('nama_fasilitas')),
        'keterangan_fasilitas' => htmlspecialchars($this->input->post('keterangan_fasilitas')),
        'kode_paket'=> htmlspecialchars($this->input->post('kodepaket'))
    ];

      $this->M_Opentrip->tambah_data($data, 'paket_pendakian');
      $this->M_Opentrip->tambah_data($dataFasilitas, 'fasilitas');
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Tambah!</span>
                        </div>');
        redirect('paketpendakian');
    }
  }

  public function lihatDetailPaketPendakian($kodepaket){
  $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Paket Pendakian';
    $data['gunung'] = $this->db->get('gunung')->result_array();
    $where = array('kodepaket' => $kodepaket);
    $data['paket_pendakian'] = $this->M_Opentrip->lihat_detail($where, 'paket_pendakian')->result();
    $this->db->where('kode_paket =',  $kodepaket);
    $data['fasilitas'] = $this->db->get('fasilitas')->result();
    $data['content'] = 'layout/Back-end/Guide/PaketPendakian/VU_PaketPendakian';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
  
  }

  public function ubahPaketPendakian(){
  $this->form_validation->set_rules('kodepaket', 'kodepaket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);
    
    $this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email', 
    [   'required' => 'Email tidak boleh kosong!'
    ]);

    $this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('tanggal_berakhir', 'tanggal_berakhir', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('titik_kumpul', 'titik_kumpul', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('kouta_paket', 'kouta_paket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('perlengkapan_pribadi', 'perlengkapan_pribadi', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('harga_paket', 'harga_paket', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('no_rekening_admin', 'no_rekening_admin', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

    $this->form_validation->set_rules('kode_gunung', 'kode_gunung', 'required|trim',
    ['required' => 'nama depan tidak boleh kosong!']);

  if ($this->form_validation->run() == false) {
    $dariDB = $this->M_Opentrip->cekkodepaket();
    $nourut = substr($dariDB, 3, 3);
    $kodePaketSekarang = $nourut + 1;
    $data = array('kode_paket' => $kodePaketSekarang);

    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Paket Pendakian';
    $data['gunung'] = $this->db->get('gunung')->result_array();
    $data['content'] = 'layout/Back-end/Guide/PaketPendakian/VT_PaketPendakian';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    } else{
    $id =  $this->input->post('id');
    
    $data = [
        'id'=> $id,
        'email'=> htmlspecialchars($this->input->post('email')),
        'kodepaket'=> htmlspecialchars($this->input->post('kodepaket')),
        'tanggal_mulai'=> htmlspecialchars($this->input->post('tanggal_mulai')),
        'tanggal_berakhir'=> htmlspecialchars($this->input->post('tanggal_berakhir')),
        'titik_kumpul'=> htmlspecialchars($this->input->post('titik_kumpul')),
        'kouta_paket'=> htmlspecialchars($this->input->post('kouta_paket')),
        'perlengkapan_pribadi'=> htmlspecialchars($this->input->post('perlengkapan_pribadi')),
        'harga_paket'=> htmlspecialchars($this->input->post('harga_paket')),
        'no_rekening_admin'=> htmlspecialchars($this->input->post('no_rekening_admin')),
        'kode_gunung'=> htmlspecialchars($this->input->post('kode_gunung')),
    ];

      $where = array('id' => $id);
      $this->M_Opentrip->ubah_data($where, $data, 'paket_pendakian');
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di ubah!</span>
                        </div>');
        redirect('paketpendakian');
    }
  }
  
  
  public function hapusPaketPendakian(){
    $kodepaket = $this->input->post('kodepaket');
    $this->M_Opentrip->Hapus_data(['kodepaket' => $kodepaket], 'paket_pendakian');
    $this->M_Opentrip->Hapus_data(['kode_paket' => $kodepaket], 'fasilitas');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show">
													<button type="button" aria-hidden="true" class="close" data-dismiss="alert"
														aria-label="Close">
														<i class="nc-icon nc-simple-remove"></i>
													</button>
													<span>
														<b> Danger - </b> Data telah Terhapus! </span>
                        </div>');
          redirect('paketpendakian');
  }
  public function tambahFasilitas(){
  $kode_paket = htmlspecialchars($this->input->post('kode_paket'));
  $nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas'));
  $keterangan_fasilitas = htmlspecialchars($this->input->post('keterangan_fasilitas'));

  $data = [
    'kode_paket' => $kode_paket,
    'nama_fasilitas' => $nama_fasilitas,
    'keterangan_fasilitas' => $keterangan_fasilitas
  ];

  $this->M_Opentrip->tambah_data($data, 'fasilitas');
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di ubah!</span>
                        </div>');
        redirect('paketpendakian/lihatdetailpaketpendakian/'.$kode_paket);
  
  }
  public function hapusFasilitas(){
  $id_fasilitas = $this->input->post('id_fasilitas');
  $kode_paket = $this->input->post('kode_paket');
  $this->M_Opentrip->Hapus_data(['id_fasilitas' => $id_fasilitas], 'fasilitas');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show">
													<button type="button" aria-hidden="true" class="close" data-dismiss="alert"
														aria-label="Close">
														<i class="nc-icon nc-simple-remove"></i>
													</button>
													<span>
														<b> Danger - </b> Data telah Terhapus! </span>
                        </div>');
          redirect('PaketPendakian/lihatdetailpaketpendakian/'. $kode_paket);

  
  }
  public function ubahFasilitas(){
  $id_fasilitas = htmlspecialchars($this->input->post('id_fasilitas'));
  $kode_paket = htmlspecialchars($this->input->post('kode_paket'));
  $nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas'));
  $keterangan_fasilitas = htmlspecialchars($this->input->post('keterangan_fasilitas'));

  $data = [
    'nama_fasilitas' => $nama_fasilitas,
    'keterangan_fasilitas' => $keterangan_fasilitas
  ];

  $where = array('id_fasilitas' => $id_fasilitas);
  $this->M_Opentrip->ubah_data($where, $data, 'fasilitas');

      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di ubah!</span>
                        </div>');
        redirect('paketpendakian/lihatdetailpaketpendakian/'.$kode_paket);
  }
}


/* End of file Guide.php */


?>