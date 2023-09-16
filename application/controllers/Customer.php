<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		sudah_login();
		// $this->load->model('ModelPansus');
	}
    public function index()
	{
		$data['title']='My Profile';
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['customer']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
	}
}