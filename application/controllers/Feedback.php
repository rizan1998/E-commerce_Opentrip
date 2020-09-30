<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

  public function index()
  {
    $data['judul_halaman'] = 'Kontak';
    $data['navActive'] = "Kontak";
    $data['content'] = 'layout/Front-end/Kontak/V_Kontak';
    $this->load->view('layout/Front-end/Template/wrapper', $data, FALSE);
  }
  
  public function lihatDataFeedback(){
    $data['akun'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['feedback'] = $this->db->get('feedback')->result_array();
    $data['judul_halaman'] = 'Data Feedback';
    $data['content'] = 'layout/Back-end/Admin/DataFeedback/V_DataFeedback';
    $this->load->view('layout/Back-end/Template/wrapper', $data, FALSE); 
  }

  public function kirimFeedback(){
    $data=[
      'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
      'nomer_hp' => htmlspecialchars($this->input->post('nomer_hp')),
      'email' => htmlspecialchars($this->input->post('email')),
      'isi_feedback' => htmlspecialchars($this->input->post('isi_feedback')),
      'status_feedback' => 0
    ];
    $this->db->insert('feedback', $data);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Bukti Pembayaran Berhasil Terkirim Silahkan Tunggu informasi Verifikasi!</span>
                        </div>');
    redirect('Feedback');
    


  }

  public function hapusCalonPendaki(){

    
  }

}

/* End of file Feedback.php */

?>