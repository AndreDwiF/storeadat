<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');

	}
	public function proseslogin()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$cek=$this->db->get_where('user',['email'=>$email])->row_array();
		if($cek){
		$data=[
			'role_id' => $cek['role_id'],
			'email' => $cek['email'],
			'nama_petugas'=> $cek['nama_petugas']
		];
		$this->session->set_userdata($data);
		if($cek['role_id']==1)
		{
			redirect('petugas');
		}else{
			redirect('customer');
		}
	}else{
		redirect('welcome');
		 }
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
