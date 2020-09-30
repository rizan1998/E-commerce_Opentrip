<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HalUtama extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      // is_logged_in();
      $this->load->library('form_validation');
      $this->load->model('M_Opentrip');
  }

  public function index()
  {
    
    $data['pemesanan'] = $this->M_Opentrip->datapemesanan();
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['totalpaket'] = $this->M_Opentrip->totalPaket();
    $data['totalguide'] = $this->M_Opentrip->totalGuide();
    $data['totalgunung'] = $this->M_Opentrip->totalGunung();
    $data['paket_pendakian'] = $this->M_Opentrip->paketpendakianscroll1();
    $data['paket_pendakian2'] = $this->M_Opentrip->paketpendakianscroll2();
    $this->db->where('level_akses =', 2);
    $data['guide'] = $this->db->get('user')->result();
    $data['judul_halaman'] = 'Beranda';
    $data['navActive'] = "Beranda";
    $data['content'] = 'layout/Front-end/Beranda/V_Beranda';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
    
  }

  public function kategori()
  {
    $data['judul_halaman'] = 'Kategori';
    $data['navActive'] = "Kategori";
    $data['content'] = 'layout/Front-end/Kategori/V_Kategori';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }

  public function detailKategori(){
    $kategori = $this->input->post('kategori');
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kateogri'] = $kategori;
    $data['kategori'] = $this->M_Opentrip->paketpendakianscroll3();
    $data['judul_halaman'] = 'Kategori';
    $data['navActive'] = "Kategori";
    $data['content'] = 'layout/Front-end/Kategori/V_DetailKategori';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }
  
  public function daftar_Gunung()
  { $data['akun'] = $this->db->get_where('user', ['email' =>    $this->session->userdata('email')])->row_array();
    // $data['gunung'] = $this->db->get('gunung')->result();
    $data['gunung'] = $this->M_Opentrip->paketpendakianscroll4();
    $data['judul_halaman'] = 'Daftar Gunung';
    $data['navActive'] = "Gunung";
    $data['content'] = 'layout/Front-end/Daftar_gunung/V_Gunung';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }

    public function lihatDetialDataGunung($kode_gunung)
  {
    // $data['akun'] = $this->db->get_where('user', ['email' =>    $this->session->userdata('email')])->row_array();
    // $data['detailPaket'] = $this->M_Opentrip->getDataGunung($kode_gunung);
    // $data['judul_halaman'] = 'Gunung - Detail Gunung';
    // $data['navActive'] = "Gunung";
    // $data['content'] = 'layout/Front-end/Gunung/V_DetailGunung';
    // $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detailPaket'] = $this->M_Opentrip->detailPaket2($kode_gunung);
    $data['judul_halaman'] = 'Daftar Gunung';
    $data['navActive'] = "Daftar Gunung";
    $data['content'] = 'layout/Front-end/Daftar_gunung/V_DetailGunung';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }

  public function daftar_Guide()
  {
    $data['judul_halaman'] = 'Guide';
    $data['navActive'] = "Guide";
    $data['content'] = 'layout/Front-end/Guide/V_Guide';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }



  public function lihatDetailDataGuide()
  {
    $data['judul_halaman'] = 'Guide - Detail Guide';
    $data['navActive'] = "Guidei";
    $data['content'] = 'layout/Front-end/beranda/VU_Paket';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }

  public function lihatDetailPaket($kodepaket)
  { 
    $dariDB = $this->M_Opentrip->cekkodepemesanan();
    $nourut = substr($dariDB, 3, 3);
    $kodePemesananSekarang = $nourut + 1;
    $data = array('kode_pemesanan' => $kodePemesananSekarang);
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['detailPaket'] = $this->M_Opentrip->detailPaket($kodepaket);
    $email = $data['detailPaket']['email'];
    $this->db->where('email =', $email);
    $data['user'] = $this->db->get('user')->row_array();
    $this->db->where('kode_paket', $kodepaket);
    $data['fasilitas'] = $this->db->get('fasilitas')->result();
    $data['judul_halaman'] = 'Beranda - Detail Paket';
    $data['navActive'] = "Beranda";
    $data['content'] = 'layout/Front-end/beranda/VD_Paket';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }

  
}

/* End of file HalUtama.php */
