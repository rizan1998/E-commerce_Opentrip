<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Opentrip extends CI_Model {

    public function cekkodegunung()
    {
        $query = $this->db->query("SELECT MAX(kode_gunung) as kodegunung from gunung");
        $hasil = $query->row();
        return $hasil->kodegunung;
    }
    public function cekkodepaket()
    {
        $query = $this->db->query("SELECT MAX(kodepaket) as kode_paket from paket_pendakian");
        $hasil = $query->row();
        return $hasil->kode_paket;
    }
    public function cekkodepemesanan()
    {
        $query = $this->db->query("SELECT MAX(kode_pemesanan) as kodepemesanan from pemesanan");
        $hasil = $query->row();
        return $hasil->kodepemesanan;
    }

    public function cekkodepembayaran()
    {
        $query = $this->db->query("SELECT MAX(kode_pembayaran) as kodepembayaran from pembayaran");
        $hasil = $query->row();
        return $hasil->kodepembayaran;
    }

    //  <======== NORMAL READ ======>
    // public function index()
    // {
    // $data['title'] = "Join CodeIgniter"; 

    //     // query memanggil function duatable di model
    //     $data['join2'] = $this->mjoin->duatable(); 
    // $this->load->view('nong',$data);    
    
    // }
    public function hitungJumlahPaket($email)
    {   
        $this->db->where('email =', $email);
        $query = $this->db->get('pemesanan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
     //<<<<<<<<<<<<<DATA PEMESANAN>>>>>>>>>>>>>>>>>>>
    public function datapemesanan() {
    $email = $this->session->userdata('email');
    $terverifikasi = 'terverifikasi';
    $this->db->select('*');
    $this->db->from('pemesanan','paket_pendakian.kode_gunung','gunung','user');
    $this->db->join('paket_pendakian','paket_pendakian.kodepaket=pemesanan.kode_paket');
    $this->db->join('user','user.email=pemesanan.email');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $this->db->order_by('tanggal_pemesanan', 'DESC');

    $this->db->where('pemesanan.email=', $email);
    $this->db->where('sts_kirimPembayaran !=', $terverifikasi);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function datapemesananCalonPendaki() {
    $email = $this->session->userdata('email');
    $terverifikasi = 'terverifikasi';
    $this->db->select('*');
    $this->db->from('pemesanan','paket_pendakian','gunung','user');
    $this->db->join('paket_pendakian','paket_pendakian.kodepaket=pemesanan.kode_paket');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('user','user.email=paket_pendakian.email');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    //$this->db->order_by('tanggal_pemesanan', 'ASC');
    $this->db->where('pemesanan.email =', $email);
    $this->db->where('sts_kirimPembayaran =', $terverifikasi);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function paketPemesananCalonPendaki($kode_paket) {
    $this->db->select('*');
    $this->db->from('paket_pendakian','gunung','user','gallerygunung');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('user','user.email=paket_pendakian.email');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    //$this->db->order_by('tanggal_pemesanan', 'ASC');
    $this->db->where('paket_pendakian.kodepaket =', $kode_paket);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->row_array();
    }

    public function dataPesertaPaket($kode_paket) {
    $terverifikasi = 'terverifikasi';
    $this->db->select('*');
    $this->db->from('pemesanan','paket_pendakian','gunung','user','gallerygunung');
    $this->db->join('paket_pendakian','paket_pendakian.kodepaket=pemesanan.kode_paket');
    $this->db->join('user','user.email=pemesanan.email');
    //$this->db->order_by('tanggal_pemesanan', 'ASC');
    $this->db->where('pemesanan.kode_paket =', $kode_paket);
    $this->db->where('sts_kirimPembayaran =', $terverifikasi);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

     //<<<<<<<<<<<<<LIHAT STATUS PEMBAYARAN>>>>>>>>>>>>>>>>>>>
    public function lihatDetailPembayaranGuide() {
    $email = $this->session->userdata('email');
    $terverifikasi = 'terverifikasi';
    $this->db->select('*');
    $this->db->from('pemesanan','paket_pendakian','gunung','user','pembayaran');
    
    $this->db->join('pembayaran', 'pembayaran.kode_pemesanan = pemesanan.kode_pemesanan');
    $this->db->join('paket_pendakian','paket_pendakian.kodepaket=pemesanan.kode_paket');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('user','user.email=paket_pendakian.email');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    //$this->db->order_by('tanggal_pemesanan', 'ASC');
    $this->db->where('paket_pendakian.email =', $email);
    $this->db->where('sts_kirimPembayaran =', $terverifikasi);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    //<<<<<<<<<<<<<HALAMAN BERANDA>>>>>>>>>>>>>>>>>>>


    public function totalPaket()
    {   
    $query = $this->db->get('paket_pendakian');
        if($query->num_rows()>0){       
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function totalGuide()
    {   $level_akses = 2;
        $this->db->where('level_akses =', $level_akses );
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function totalGunung()
    {   
    $query = $this->db->get('gunung');
        if($query->num_rows()>0){       
            return $query->num_rows();
        }else{
            return 0;
        }
    }
 
    public function paketpendakianscroll1() {
    $this->db->select('*');
    $this->db->from('paket_pendakian');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->order_by('kodepaket', 'RANDOM');
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function paketpendakianscroll2() {
    $this->db->select('*');
    $this->db->from('paket_pendakian');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->order_by('tanggal_mulai', 'RANDOM');
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function paketpendakianscroll3() {
    $this->db->select('*');
    $this->db->from('paket_pendakian');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->order_by('kodepaket', 'RANDOM');
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function paketpendakianscroll4() {
    $this->db->select('*');
    $this->db->from('Gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $this->db->order_by('kodepaket', 'RANDOM');
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    public function getDataGunung($kode_gunung) {
    $this->db->select('*');
    $this->db->from('Gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $this->db->where('gunung.kode_gunung =', $kode_gunung);
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }

    //<<<<<<<<<<<<<HALAMAN KELOLA PAKET>>>>>>>>>>>>>>>>>>>
    public function paketpendakian() {
     $email = $this->session->userdata('email');
    $this->db->select('*');
    $this->db->from('paket_pendakian');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->where('paket_pendakian.email =', $email);
    $this->db->order_by('tanggal_mulai', 'ASC');
    $query = $this->db->get();//disini bisa pakai tanggal != < tanggal sekarang
    return $query->result();
    }
    
    public function joinPaketPendakian(){
    $this->db->select('*');
    $this->db->from('paket_pendakian','user','fasilitas');
    $this->db->join('fasilitas','fasilitas.kode_paket=paket_pendakian.kodepaket');
   
    $query = $this->db->get();
    return $query->result();
    }
    
    public function detailPaket($kodepaket) {
    $this->db->select('*');
    $this->db->from('paket_pendakian');
    $this->db->join('gunung','gunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=paket_pendakian.kode_gunung');
    $this->db->where('kodepaket =', $kodepaket);
    $query = $this->db->get();
    return $query->row_array();
    }

    public function detailPaket2($kode_gunung) {
    $this->db->select('*');
    $this->db->from('gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $this->db->where('gunung.kode_gunung =', $kode_gunung);
    $query = $this->db->get();
    return $query->row_array();
    }

    public function joinDataGunung1() {
    $this->db->select('*');
    $this->db->from('gunung');
    $this->db->join('jalurpendakian','jalurpendakian.kode_gunung=gunung.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $query = $this->db->get();
    return $query->result();
    }

    public function joinDataGunung($kode_gunung){
    $this->db->select('*');
    $this->db->from('gunung');
    $this->db->join('jalurpendakian','jalurpendakian.kode_gunung=gunung.kode_gunung');
    $this->db->join('gallerygunung','gallerygunung.kode_gunung=gunung.kode_gunung');
    $this->db->where('gunung.kode_gunung', $kode_gunung);
    $query = $this->db->get();
    return $query->result();
    }

    // <=========== PASSING READ ==========>
    //      public function index()
    //  {
    //     //passing data controller ke view
    //     $data['nama'] = "Edi";
    //   $data['title'] = "Join CodeIgniter"; 

    //     //active record dengan nama edi
    //     $aktif = array('nama'=>'Edi');

    //     // query memanggil function tigatable di model
    //     $data['join3'] = $this->mjoin->tigatable($aktif); 
    //   $this->load->view('nong',$data);    
    
    //  } 
    // public function tigatable($aktif) {
    // $this->db->select('*');
    // $this->db->from('tbrakyat');
    // $this->db->join('tbsekolah','tbsekolah.id=tbrakyat.id');
    // $this->db->join('tbstatus','tbstatus.idpendidikan=tbsekolah.idpendidikan');
    // $this->db->where($aktif);
    // $query = $this->db->get();
    // return $query->result();
    // }

    //Ubah data
    function ubah_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //hapus data
    function Hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //lihat data
    function lihat_data($table)
    {
        return $this->db->get($table);
    }
    //lihat detail data
    function lihat_detail($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    //tambah data
    function tambah_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }


}

/* End of file OpenTrip.php */


?>