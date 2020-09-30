<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
  {
    $data['judul_halaman'] = 'Home';
    $data['content'] = 'home/home';
    $this->load->view('layout/Front-end/wrapper', $data, FALSE);
    

  }

}

/* End of file Controllername.php */

?>