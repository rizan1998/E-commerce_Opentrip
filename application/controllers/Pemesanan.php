<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      // is_logged_in();
      $this->load->library('form_validation');
      $this->load->model('M_Opentrip');
  }

  public function index(){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['datapemesanan'] = $this->M_Opentrip->datapemesananCalonPendaki();
    $data['judul_halaman'] = 'Paket Saya';
    $data['content'] = 'layout/Back-end/Calon_Pendaki/V_PemesananPaket';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
  }

  public function lihatDetailPemesanan($kode_paket){
  $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $data['pemesanan'] = $this->M_Opentrip->paketPemesananCalonPendaki($kode_paket);
  $data['datapesertapaket'] = $this->M_Opentrip->dataPesertaPaket($kode_paket);
  $data['judul_halaman'] = 'Paket Saya';
  $data['content'] = 'layout/Back-end/Calon_Pendaki/VD_PemesananPaket';
  $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
  }

  public function lihatDetailPemesananGuide($kode_paket){
  $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $data['pemesanan'] = $this->M_Opentrip->paketPemesananCalonPendaki($kode_paket);
  $data['datapesertapaket'] = $this->M_Opentrip->dataPesertaPaket($kode_paket);
  $data['judul_halaman'] = 'Kelola Paket Pendakian';
  $data['content'] = 'layout/Back-end/Guide/PaketPendakian/VD_PaketPendakianGuide';
  $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
  }

  public function pesanPaket(){
    
    $id_gambar = htmlspecialchars($this->input->post('id_gambar', true));
    $kode_pemesanan = htmlspecialchars($this->input->post('kode_pemesanan'));
    $email = htmlspecialchars($this->input->post('email'));
    $kode_paket = htmlspecialchars($this->input->post('kode_paket'));
    $nama_gunung = htmlspecialchars($this->input->post('nama_gunung'));
    $harga_paket = htmlspecialchars($this->input->post('harga_paket'));
    $foto_pemesanan = htmlspecialchars($this->input->post('foto_pemesanan'));
    $tanggal_pemesanan = date('Y-m-d');
    // $paketpendakian['paket_pendakian'] = $this->db->get_where('paket_pendakian',['kodepaket' => $kode_paket])->row_array();
    // // kurangi kouta
    // $old_kouta = $paketpendakian['paket_pendakian']['kouta_paket'];
    // $kouta_saatini = $old_kouta - 1;

    $data=[
      'kode_pemesanan' => $kode_pemesanan,
      'email' => $email,
      'kode_paket' => $kode_paket,
      'tanggal_pemesanan' => $tanggal_pemesanan,
      'nama_gunung' => $nama_gunung,
      'harga_paket' => $harga_paket,
      'foto_pemesanan' => $foto_pemesanan,
      'kouta_paket' => 1,
      'sts_kirimPembayaran' => "belum"
    ];

    $this->M_Opentrip->tambah_data($data, 'pemesanan');
    // $this->db->set('kode_gunung', $kouta_saatini);
    // $this->db->where('kodepaket', $kode_paket);
    // $this->db->update('paket_pendakian');
        redirect('pemesanan/pemesananSukses');
  }

  public function pemesananSukses(){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user_data = $this->session->userdata('email');
    $this->db->where('email =', $user_data );
    $data['judul_halaman'] = 'Pemesanan Sukses';
    $this->load->view('layout/Front-end/Beranda/V_pemesananSukses', $data, FALSE); 
  }

  public function pesanPaketlain(){
  $kode_paket =  $this->input->post('kode_paket');
  $id_pemesanan = $this->input->post('id_pemesanan');
  $this->M_Opentrip->Hapus_data(['id_pemesanan' => $id_pemesanan], 'pemesanan');
  redirect('HalUtama');
  }

  public function batalPesan(){
  $id_pemesanan = $this->input->post('id_pemesanan');
  $kode_paket = $this->input->post('kode_paket');
  $data['paket_pendakian'] = $this->db->get_where('paket_pendakian',['kodepaket' => $kode_paket])->row_array();
  $kouta_paket = $data['paket_pendakian']['kouta_paket'];
  $kouta_sekarang = $kouta_paket + 1;
  $this->M_Opentrip->Hapus_data(['id_pemesanan' => $id_pemesanan], 'pemesanan');

  $this->db->set('kouta_paket', $kouta_sekarang);
  $this->db->where('kodepaket', $kode_paket);
  $this->db->update('paket_pendakian');
  redirect('Pembayaran');
  }
}