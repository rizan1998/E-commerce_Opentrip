<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Opentrip');
    }

  public function index()
  {
    $email = $this->session->userdata('email');
     $data['datapemesanan'] = $this->M_Opentrip->datapemesanan($email);
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Keranjang';
    $data['content'] = 'layout/Back-end/Calon_Pendaki/V_Pembayaran';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function lihatStatusPembayaran()
  { 
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->db->where('status_pembayaran !=', 1);
    $this->db->where('status_pembayaran !=', 2);
    $data['pembayaran'] = $this->db->get('pembayaran')->result();
    $data['judul_halaman'] = 'Kelola Pembayaran Paket Pendakian';
    $data['content'] = 'layout/Back-end/Admin/KelolaPembayaranPaketPendakian/V_KelolaPembayaranPaketPendakian';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function lihatDetailStatusPembayaran($id_pembayaran){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
    $kode_pemesanan = $data['pembayaran']['kode_pemesanan'];
    $data['pemesanan'] = $this->db->get_where('pemesanan', ['kode_pemesanan' => $kode_pemesanan])->row_array();
    $kode_paket = $data['pemesanan']['kode_paket'];
    $data['paket_pendakian'] = $this->db->get_where('paket_pendakian', ['kodepaket' => $kode_paket])->row_array();
    $kode_gunung = $data['paket_pendakian']['kode_gunung'];
    $data['gunung'] = $this->db->get_where('gunung', ['kode_gunung' => $kode_gunung])->row_array();
    

  $data['judul_halaman'] = 'Kelola Pembayaran Paket Pendakian';
  $data['content'] = 'layout/Back-end/Admin/KelolaPembayaranPaketPendakian/VD_pembayaran';
  $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function halamanPembayaran(){
    $dariDB = $this->M_Opentrip->cekkodepembayaran();
    $nourut = substr($dariDB, 3, 3);
    $kodePembayaranSekarang = $nourut + 1;
    $data = array('kode_Pembayaran' => $kodePembayaranSekarang);

    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $email = $this->input->post('email');
    $kode_pemesanan = $this->input->post('kode_pemesanan');
    $harga_paket = $this->input->post('harga_paket');

    $data['nama_pengirim'] = $this->db->get_where('user',['email' => $email])->row_array();
    $bank = $this->input->post('bank');
    $id_pemesanan = $this->input->post('id_pemesanan');
    $data['bank'] = [
      'kode_pemesanan' => $kode_pemesanan,
      'id_pemesanan' => $id_pemesanan,
      'bank' => $bank,
      'email' => $email,
      'harga_paket' => $harga_paket
    ];

    $data['judul_halaman'] = 'Keranjang';
    $data['content'] = 'layout/Back-end/Calon_Pendaki/V_FormPembayaran';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }
  
  public function kirimPembayaran(){
    $kode_pemesanan = $this->input->post('kode_pemesanan');
    $bank = $this->input->post('bank');
    $nama_pengirim = $this->input->post('nama_pengirim');
    $no_rek = $this->input->post('no_rek_pengirim');
    $jumlah_nominal = $this->input->post('jumlah_nominal');
    $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
    $kode_pembayaran = $this->input->post('kode_pembayaran');
    $status_pembayaran = 0;
    $email = $this->input->post('email');
    $sts_kirimPembayaran = 'terkirim';

    $data = [
      'kode_pemesanan' => $kode_pemesanan,
      'kode_pembayaran' => $kode_pembayaran,
      'nama_pengirim' => $nama_pengirim,
      'no_rek_pengirim' => $no_rek,
      'bank' => $bank,
      'jumlah_nominal' => $jumlah_nominal,
      'tanggal_pembayaran' => $tanggal_pembayaran,
      'email' => $email,
      'status_pembayaran' => $status_pembayaran,

    ];
    $image_bukti = $_FILES['gambar_bukti_pembayaran']['name'];
    if ($image_bukti) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '5048';
    $config['encrypt_name'] = TRUE;
    $config['upload_path'] = './assets/images/bukti_pembayaran';
    $this->load->library('upload', $config);
    $this->upload->do_upload('gambar_bukti_pembayaran');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_bukti_pembayaran', $new_image);
    } else {
      echo $this->upload->display_errors();
    }
    
    $this->db->insert('pembayaran', $data);
    $this->db->set('sts_kirimPembayaran', $sts_kirimPembayaran);
    $this->db->where('kode_pemesanan', $kode_pemesanan);
    $this->db->update('pemesanan');
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Bukti Pembayaran Berhasil Terkirim Silahkan Tunggu informasi Verifikasi!</span>
                        </div>');
    redirect('Pembayaran');
  }

  public function simpanUbahStatusPembayaran(){
    $id_pembayaran = $this->input->post('id_pembayaran');
    $kode_pemesanan = $this->input->post('kode_pemesanan');
    $status_pembayaran = $this->input->post('status_pembayaran');
    $kode_pembayaran = $this->input->post('kode_pembayaran');
    $terverifikasi = 'terverifikasi';
    $verfikasiFailed = 'verifikasiFailed';


    
    if ($status_pembayaran == 1) {
      $this->db->set('sts_kirimPembayaran', $terverifikasi);
      $this->db->where('kode_pemesanan', $kode_pemesanan);
      $this->db->update('pemesanan');
    }elseif ($status_pembayaran == 2) {
      $this->db->set('sts_kirimPembayaran', $verfikasiFailed);
      $this->db->where('kode_pemesanan', $kode_pemesanan);
      $this->db->update('pemesanan');
    }
    
      $this->db->set('status_pembayaran', $status_pembayaran);
      $this->db->where('id_pembayaran', $id_pembayaran);
      $this->db->update('pembayaran');
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Ubah!</span>
                        </div>');
      redirect('Pembayaran/lihatStatusPembayaran');
  }

  public function lihatStatusPembayaranGuide(){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pembayaran'] = $this->M_Opentrip->lihatDetailPembayaranGuide();
    $data['judul_halaman'] = 'Lihat Status Pembayaran';
    $data['content'] = 'layout/Back-end/Guide/LihatStatusPembayaran/V_Lihat_StatusPembayaran';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

    public function lihatDetailStatusPembayaranGuide($id_pembayaran){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
    $kode_pemesanan = $data['pembayaran']['kode_pemesanan'];
    $data['pemesanan'] = $this->db->get_where('pemesanan', ['kode_pemesanan' => $kode_pemesanan])->row_array();
    $kode_paket = $data['pemesanan']['kode_paket'];
    $data['paket_pendakian'] = $this->db->get_where('paket_pendakian', ['kodepaket' => $kode_paket])->row_array();
    $kode_gunung = $data['paket_pendakian']['kode_gunung'];
    $data['gunung'] = $this->db->get_where('gunung', ['kode_gunung' => $kode_gunung])->row_array();
    

  $data['judul_halaman'] = 'Lihat Status Pembayaran';
  $data['content'] = 'layout/Back-end/Admin/KelolaPembayaranPaketPendakian/VD_pembayaran';
  $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  
}

/* End of file Guide.php */


?>
