<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gunung extends CI_Controller {

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
    $data['gunung'] = $this->db->get('gunung')->result_array();
    $data['joinDataGunung1'] = $this->M_Opentrip->joinDataGunung1();
    $data['judul_halaman'] = 'Kelola Data Gunung';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataGunung/V_KelolaDataGunung';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function tambahDataGunung()
  {
    $this->form_validation->set_rules('kode_gunung', 'Kode_gunung', 'required|trim',
    ['required' => 'Kode Gunung tidak boleh kosong!']);

    $this->form_validation->set_rules('nama_gunung', 'Nama_gunung', 'required|trim',
    ['required' => 'Nama Gunung tidak boleh kosong!']);

    $this->form_validation->set_rules('ketinggian', 'Ketinggian', 'required|trim',
    ['required' => 'Ketinggian tidak boleh kosong!']);

    $this->form_validation->set_rules('rata_rata_suhu', 'Rata_rata_suhu', 'required|trim',
    ['required' => 'rata-rata suhu tidak boleh kosong!']);

    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',
    ['required' => 'Keterangan tidak boleh kosong!']);

    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
    ['required' => 'Alamat tidak boleh kosong!']);
    
    $this->form_validation->set_rules('nama_jalur', 'Nama_jalur', 'required|trim',
    ['required' => 'nama_jalur tidak boleh kosong!']);

    $this->form_validation->set_rules('jumlah_pos', 'Jumlah_pos', 'required|trim',
    ['required' => 'jumlah_pos tidak boleh kosong!']);

    $this->form_validation->set_rules('jarak_jalur', 'Jarak_jalur', 'required|trim',
    ['required' => 'jarak_jalur tidak boleh kosong!']);



  if ($this->form_validation->run() == false) {
    
    $dariDB = $this->M_Opentrip->cekkodegunung();
    // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
    $nourut = substr($dariDB, 3, 3);
    $kodeGunungSekarang = $nourut + 1;
    $data = array('kode_gunung' => $kodeGunungSekarang);

    $data['jalurpendakian'] = $this->db->get('jalurpendakian');
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Data Gunung';
    $data['content'] = 'layout/Back-end/Admin/KelolaDataGunung/VT_KelolaDataGunung';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
    } else{
    
    $data = [
        'kode_gunung' => htmlspecialchars($this->input->post('kode_gunung', true)),
        'nama_gunung' => htmlspecialchars($this->input->post('nama_gunung', true)),
        'ketinggian' => htmlspecialchars($this->input->post('ketinggian', true)),
        'rata_rata_suhu' => htmlspecialchars($this->input->post('rata_rata_suhu', true)),
        'keterangan' => htmlspecialchars($this->input->post('keterangan')),
        'alamat' => htmlspecialchars($this->input->post('alamat', true))
    ];
            
    $dataJalur=[
    'nama_jalur' => htmlspecialchars($this->input->post('nama_jalur', true)),
    'jumlah_pos' => htmlspecialchars($this->input->post('jumlah_pos', true)),
    'jarak_jalur' => htmlspecialchars($this->input->post('jarak_jalur', true)),
    'kode_gunung' =>  htmlspecialchars($this->input->post('kode_gunung', true))
    ];

    $dataGallery = [
      'kode_gunung' => htmlspecialchars($this->input->post('kode_gunung', true))
    ];

    $image_Jalur = $_FILES['foto_jalur']['name'];
    if ($image_Jalur) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '5048';
    $config['encrypt_name'] = TRUE;
    $config['upload_path'] = './assets/images/gunung';
    $this->load->library('upload', $config);
    $this->upload->do_upload('foto_jalur');
    $new_image = $this->upload->data('file_name');
    $this->db->set('foto_jalur', $new_image);
    } else {
      echo $this->upload->display_errors();
    }

    $image_Jalur = $_FILES['gambar_basecamp']['name'];
    if ($image_Jalur) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '5048';
    $config['encrypt_name'] = TRUE;
    $config['upload_path'] = './assets/images/gunung';
    $this->load->library('upload', $config);
    $this->upload->do_upload('gambar_basecamp');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_basecamp', $new_image);
    } else {
      echo $this->upload->display_errors();
    }

    $this->db->insert('jalurpendakian', $dataJalur);
    $this->db->insert('gunung', $data);

    $Galley_Img1 = $_FILES['gambar_satu']['name'];
    if ($Galley_Img1) {
    $this->upload->do_upload('gambar_satu');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_satu', $new_image);
    } else {
      echo $this->upload->display_errors();
    }

    $Galley_Img2 = $_FILES['gambar_dua']['name'];
    if ($Galley_Img2) {
    $this->upload->do_upload('gambar_dua');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_dua', $new_image);
    } else {
      echo $this->upload->display_errors();
    }
    
    $Galley_Img3 = $_FILES['gambar_tiga']['name'];
    if ($Galley_Img3) {
    $this->upload->do_upload('gambar_tiga');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_tiga', $new_image);
    } else {
      echo $this->upload->display_errors();
    }
    
    $Galley_Img4 = $_FILES['gambar_empat']['name'];
    if ($Galley_Img4) {
    $this->upload->do_upload('gambar_empat');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_empat', $new_image);
    } else {
      echo $this->upload->display_errors();
    }
    
    $Galley_Img5 = $_FILES['gambar_lima']['name'];
    if ($Galley_Img5) {
    $this->upload->do_upload('gambar_lima');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_lima', $new_image);
    } else {
      echo $this->upload->display_errors();
    }
    $this->db->insert('gallerygunung', $dataGallery);

      // $this->M_Opentrip->tambah_data($dataJalur, 'jalurpendakian');
      // $this->M_Opentrip->tambah_data($data, 'gallerygunung');

      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data berhasil di Tambah!</span>
                        </div>');
        redirect('Gunung');
    }
  }

  public function lihatDetailDataGunung($kode_gunung){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul_halaman'] = 'Kelola Data Gunung';
    $data['kode_gunung'] = $kode_gunung;
    // $aktif = ['kode_gunung' => $kode_gunung ];
    // $data['detailDataGunung'] = $this->M_Opentrip->joinDataGunung($kode_gunung);
    $this->db->where('kode_gunung =', $kode_gunung );
    $data['gunung'] = $this->db->get('gunung')->result();
    $this->db->where('kode_gunung =', $kode_gunung );
    $data['jalurpendakian'] = $this->db->get('jalurpendakian')->result();
    $this->db->where('kode_gunung =', $kode_gunung );
    $data['gallerygunung'] = $this->db->get('gallerygunung')->result();
    $data['content'] = 'layout/Back-end/Admin/KelolaDataGunung/VU_KelolaDataGunung';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE);
  }

  public function ubahDataGunung(){
  $kode_gunung = htmlspecialchars($this->input->post('kode_gunung'));
  $id_gunung = htmlspecialchars($this->input->post('id_gunung'));
  $dataGunung = [
        'nama_gunung' => htmlspecialchars($this->input->post('nama_gunung', true)),
        'ketinggian' => htmlspecialchars($this->input->post('ketinggian', true)),
        'rata_rata_suhu' => htmlspecialchars($this->input->post('rata_rata_suhu', true)),
        'keterangan' => htmlspecialchars($this->input->post('keterangan')),
        'alamat' => htmlspecialchars($this->input->post('alamat', true))
    ];
  $where = array('id_gunung' => $id_gunung);
  $this->M_Opentrip->ubah_data($where, $dataGunung, 'gunung');
  
  $data['gallerygunung'] = $this->db->get_where('gallerygunung',['kode_gunung' => $kode_gunung])->row_array();
  $id_gambar = htmlspecialchars($this->input->post('id_gambar', true));

  $upload_image1 = $_FILES['gambar_satu']['name'];
  if ($upload_image1) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '5048';
      $config['upload_path'] = './assets/images/gunung';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar_satu')) {
          $old_image = $data['gallerygunung']['gambar_satu'];
            if ($old_image != 'default.jpg')
            {
              unlink(FCPATH . 'assets/images/gunung/' . $old_image);
            }
          $new_image1 = $this->upload->data('file_name');
          $dataimg = ['gambar_satu' => $new_image1];
          $this->db->set($dataimg);
      }else {
        echo $this->upload->display_errors();
      }
    }
  
  $upload_image2 = $_FILES['gambar_dua']['name'];
    if ($upload_image2) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/gunung';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_dua')) {
            $old_image = $data['gallerygunung']['gambar_dua'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/gunung/' . $old_image);
              }
          $new_image2 = $this->upload->data('file_name');
          $dataimg = ['gambar_dua' => $new_image2];
          $this->db->set($dataimg);
        }else {
        echo $this->upload->display_errors();
      }
    }
  
  $upload_image3 = $_FILES['gambar_tiga']['name'];
    if ($upload_image3) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/gunung';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_tiga')) {
            $old_image = $data['gallerygunung']['gambar_tiga'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/gunung/' . $old_image);
              }
          $new_image3 = $this->upload->data('file_name');
          $dataimg = ['gambar_tiga' => $new_image3];
          $this->db->set($dataimg);
        }else {
        echo $this->upload->display_errors();
      }
    }
  $upload_image4 = $_FILES['gambar_empat']['name'];
    if ($upload_image4) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/gunung';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_empat')) {
            $old_image = $data['gallerygunung']['gambar_empat'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/gunung/' . $old_image);
              }
          $new_image4 = $this->upload->data('file_name');
          $dataimg = ['gambar_empat' => $new_image4];
          $this->db->set($dataimg);
        }else {
        echo $this->upload->display_errors();
      }
    }
    $upload_image5 = $_FILES['gambar_lima']['name'];
    if ($upload_image5) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5048';
        $config['upload_path'] = './assets/images/gunung';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar_lima')) {
            $old_image = $data['gallerygunung']['gambar_lima'];
              if ($old_image != 'default.jpg')
              {
                unlink(FCPATH . 'assets/images/gunung/' . $old_image);
              }
          $new_image5 = $this->upload->data('file_name');
          $dataimg = ['gambar_lima' => $new_image5];
          $this->db->set($dataimg);

        }else {
        echo $this->upload->display_errors();
      }
    }
    $this->db->set('kode_gunung', $kode_gunung);
    $this->db->where('id_gambar', $id_gambar);
    $this->db->update('gallerygunung');

  $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data Berhasil diubah !</span>
                        </div>');
  redirect('gunung');
  }

  public function hapusDataGunung(){
    $id_gunung = $this->input->post('id_gunung');
    $id_jalur = $this->input->post('id_jalur');
    $id_gambar = $this->input->post('id_gambar');
    $kode_gunung = $this->input->post('kode_gunung');
        $this->M_Opentrip->Hapus_data(['id_gunung' => $id_gunung], 'gunung');
      $this->M_Opentrip->Hapus_data(['kode_gunung' => $kode_gunung], 'jalurpendakian');
      $this->M_Opentrip->Hapus_data(['id_gambar' => $id_gambar
      ], 'gallerygunung');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show">
													<button type="button" aria-hidden="true" class="close" data-dismiss="alert"
														aria-label="Close">
														<i class="nc-icon nc-simple-remove"></i>
													</button>
													<span>
														<b> Danger - </b> Data telah Terhapus! </span>
                        </div>');
          redirect('gunung');
  }

  public function tambahJalurPendakian(){

    $id_jalur = htmlspecialchars($this->input->post('id_jalur'));
    $nama_jalur = htmlspecialchars($this->input->post('nama_jalur'));
    $jumlah_pos = htmlspecialchars($this->input->post('jumlah_pos'));
    $jarak_jalur = htmlspecialchars($this->input->post('jarak_jalur'));
    $kode_gunung = htmlspecialchars($this->input->post('kode_gunung'));

    $image_Jalur = $_FILES['foto_jalur']['name'];
    if ($image_Jalur) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '5048';
    $config['encrypt_name'] = TRUE;
    $config['upload_path'] = './assets/images/gunung';
    $this->load->library('upload', $config);
    $this->upload->do_upload('foto_jalur');
    $new_image = $this->upload->data('file_name');
    $this->db->set('foto_jalur', $new_image);
    } else {
      echo $this->upload->display_errors();
    }

    $image_Jalur = $_FILES['gambar_basecamp']['name'];
    if ($image_Jalur) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '5048';
    $config['encrypt_name'] = TRUE;
    $config['upload_path'] = './assets/images/gunung';
    $this->load->library('upload', $config);
    $this->upload->do_upload('gambar_basecamp');
    $new_image = $this->upload->data('file_name');
    $this->db->set('gambar_basecamp', $new_image);
    } else {
      echo $this->upload->display_errors();
    }

  $data=[
      'id_jalur' => $id_jalur,
      'nama_jalur' => $nama_jalur,
      'jumlah_pos' => $jumlah_pos,
      'jarak_jalur' => $jarak_jalur,
      'kode_gunung' => $kode_gunung
    ];

  $this->db->set($data);
  $this->db->insert('jalurpendakian');
  $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data Berhasil diubah !</span>
                        </div>');
  redirect('gunung/lihatDetailDataGunung/'.$kode_gunung);
  }
  public function hapusJalurPendakian(){
    $id = $this->input->post('id_jalur');
    $kode_gunung = $this->input->post('kode_gunung');
    
        $this->M_Opentrip->Hapus_data(['id_jalur' => $id], 'jalurpendakian');
        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show">
													<button type="button" aria-hidden="true" class="close" data-dismiss="alert"
														aria-label="Close">
														<i class="nc-icon nc-simple-remove"></i>
													</button>
													<span>
														<b> Danger - </b> Data telah Terhapus! </span>
                        </div>');
          redirect('gunung/lihatDetailDataGunung/'.$kode_gunung);
  }
  public function ubahJalurPendakian(){
  $id_jalur = htmlspecialchars($this->input->post('id_jalur'));
  $nama_jalur = htmlspecialchars($this->input->post('nama_jalur'));
  $jumlah_pos = htmlspecialchars($this->input->post('jumlah_pos'));
  $jarak_jalur = htmlspecialchars($this->input->post('jarak_jalur'));
  $kode_gunung = htmlspecialchars($this->input->post('kode_gunung'));

  $data=[
    'id_jalur' => $id_jalur,
      'nama_jalur' => $nama_jalur,
      'jumlah_pos' => $jumlah_pos,
      'jarak_jalur' => $jarak_jalur,
      'kode_gunung' => $kode_gunung
  ];
  $upload_image1 = $_FILES['foto_jalur']['name'];
  if ($upload_image1) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '5048';
      $config['upload_path'] = './assets/images/gunung';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto_jalur')) {
          $old_image = $data['gallerygunung']['foto_jalur'];
            if ($old_image != 'default.jpg')
            {
              unlink(FCPATH . 'assets/images/gunung/' . $old_image);
            }
        $new_image1 = $this->upload->data('file_name');
        $this->db->set('foto_jalur', $new_image1);
      }else {
        echo $this->upload->display_errors();
      }
    }
  $upload_image2 = $_FILES['gambar_basecamp']['name'];
  if ($upload_image2) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '5048';
      $config['upload_path'] = './assets/images/gunung';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar_basecamp')) {
          $old_image = $data['gallerygunung']['gambar_basecamp'];
            if ($old_image != 'default.jpg')
            {
              unlink(FCPATH . 'assets/images/gunung/' . $old_image);
            }
        $new_image2 = $this->upload->data('file_name');
        $this->db->set('gambar_basecamp', $new_image2);
      }else {
        echo $this->upload->display_errors();
      }
    }
    $this->db->set($data);
    $this->db->where('id_jalur', $id_jalur);
    $this->db->update('jalurpendakian');

    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Data Berhasil diubah !</span>
                        </div>');
  redirect('gunung/lihatDetailDataGunung/'.$kode_gunung);
  }
  

  
}

/* End of file Gunung.php */


?>