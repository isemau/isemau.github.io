
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashborad';
		$data['user'] = $this->db->get_where('makmur_pulsa_user', ['no_hp' => $this->session->userdata('no_hp')])->row_array();
		//Menampilkan Nama User yg Login, Data diambil dari ession kemudian cari nama user di dbase
//		echo 'Selamat Datang ' . $data['user']['nama'];			
		
		$this->load->view('user/index', $data);
	}
}
