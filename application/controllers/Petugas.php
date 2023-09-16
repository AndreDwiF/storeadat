<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		sudah_login();
		// $this->load->model('ModelPansus');
	}
    public function index()
	{
		$data['title']='Dashboard';
		$data['totalp']=$this->db->get_where('user',['role_id'=>1])->num_rows();
		$data['totalc']=$this->db->get_where('user',['role_id'=>2])->num_rows();
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/home',$data);
		$this->load->view('templates/footer');
	}
	public function datapetugas()
	{
		$this->load->library('pagination');
		$config['base_url']='http://localhost/storeadat/petugas/datapetugas';
		$config['total_rows']=$this->db->get_where('user',['role_id'=>1])->num_rows();
		$config['per_page']=5;
		$config['full_tag_open']='<ul class="pagination pagination-info justify-content-center">';
		$config['full_tag_close']='</ul>';
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="javascript:;">';
		$config['cur_tag_close']='</a></li>';
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';
		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);
		
		$data['start']=$this->uri->segment(3);
		$data['title']='Data Petugas';
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['petugas']=$this->db->get_where('user',['role_id'=>1],$config['per_page'],$data['start'])->result_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/datapetugas',$data);
		$this->load->view('templates/footer');
	}
	public function datacustomer()
	{
		$this->load->library('pagination');
		$config['base_url']='http://localhost/storeadat/petugas/datacustomer';
		$config['total_rows']=$this->db->get_where('user',['role_id'=>2])->num_rows();
		$config['per_page']=5;
		$config['full_tag_open']='<ul class="pagination pagination-info justify-content-center">';
		$config['full_tag_close']='</ul>';
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="javascript:;">';
		$config['cur_tag_close']='</a></li>';
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';
		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);
		
		$data['start']=$this->uri->segment(3);
		$data['title']='Data Customer';
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['customer']=$this->db->get_where('user',['role_id'=>2],$config['per_page'],$data['start'])->result_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/datacustomer',$data);
		$this->load->view('templates/footer');
	}
	public function datapakaian()
	{
		$this->load->library('pagination');
		$config['base_url']='http://localhost/storeadat/petugas/datapakaian';
		$config['total_rows']=$this->db->get('pakaian')->num_rows();
		$config['per_page']=5;
		$config['full_tag_open']='<ul class="pagination pagination-info justify-content-center">';
		$config['full_tag_close']='</ul>';
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="javascript:;">';
		$config['cur_tag_close']='</a></li>';
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';
		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);
		
		$data['start']=$this->uri->segment(3);
		$data['title']='Data Baju/ Pakaian Adat';
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['pakaian']=$this->db->get('pakaian',$config['per_page'],$data['start'])->result_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/datapakaian',$data);
		$this->load->view('templates/footer');
	}
	public function transaksi()
	{
		$this->load->library('pagination');
		$config['base_url']='http://localhost/storeadat/petugas/transaksi';
		$config['total_rows']=$this->db->get('transaksi')->num_rows();
		$config['per_page']=5;
		$config['full_tag_open']='<ul class="pagination pagination-info justify-content-center">';
		$config['full_tag_close']='</ul>';
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="javascript:;">';
		$config['cur_tag_close']='</a></li>';
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';
		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);
		
		$data['start']=$this->uri->segment(3);
		$keyword=$this->input->post('keyword');
		$data['title']='Data Transaksi';
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['transaksi']=$this->PetugasModel->search($config['per_page'],$data['start'],$keyword);
		// $data['transaksi']=$this->db->get('transaksi',$config['per_page'],$data['start'])->result_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/transaksi',$data);
		$this->load->view('templates/footer');
	}
	public function rekap()
	{
		$this->load->library('pagination');
		$config['base_url']='http://localhost/storeadat/petugas/rekap';
		$config['total_rows']=$this->db->get('transaksi')->num_rows();
		$config['per_page']=5;
		$config['full_tag_open']='<ul class="pagination pagination-info justify-content-center">';
		$config['full_tag_close']='</ul>';
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="javascript:;">';
		$config['cur_tag_close']='</a></li>';
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';
		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);
		
		$data['start']=$this->uri->segment(3);
		$keyword=$this->input->post('keyword');
		$data['title']='Rekapitulasi';
		$this->db->select('MIN(tanggal_input) AS tanggal_awal, MAX(tanggal_input) AS tanggal_akhir');
        $data['daterange']=$this->db->get('transaksi')->row();
		$data['mennav']=$this->db->get_where('submenu',['title'=>$data['title']])->row_array();
		$data['rekap']=$this->PetugasModel->rekap($config['per_page'],$data['start'],$keyword);
		// $data['transaksi']=$this->db->get('transaksi',$config['per_page'],$data['start'])->result_array();
		$data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('petugas/rekap',$data);
		$this->load->view('templates/footer');
	}
	public function hapustransaksi()
	{
		$id=$this->input->post('id');
		$this->PetugasModel->hapustr($id);
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/transaksi');
	}
	public function edittransaksi()
	{
		$id=$this->input->post('id');
		$jumlah=$this->input->post('jumlah');
		$tanggal_input=$this->input->post('tanggal_input');
		$data = array(
			'jumlah'=> $jumlah,
			'tanggal_input'=>$tanggal_input
		  );
		$where = array(
			'id' => $id
		);
		$this->PetugasModel->editpak($where,$data,'transaksi');
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/transaksi');
	}
	public function tambahtransaksi()
	{
		$role_id = 2;
		$namacustomer=$this->input->post('namacustomer');
		$nohp=$this->input->post('nohp');
		$date_created=$this->input->post('date_created');
		$data = array(
			'role_id'=> $role_id,
			'nama_petugas'=> $namacustomer,
			'date_created'=> $date_created,
			'nohp'=> $nohp
		  );
		  
		  $this->PetugasModel->tambahc($data);
		  $this->session->set_flashdata('success','berhasil');
		  redirect('petugas/datacustomer');
	}
	public function hapuspakaian()
	{
		$id=$this->input->post('id');
		$this->PetugasModel->hapuspak($id);
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datapakaian');
	}
	public function editpakaian()
	{
		$id=$this->input->post('id');
		$namapakaian=$this->input->post('namapakaian');
		$harga=$this->input->post('harga');
		$data = array(
			'nama_pakaian'=> $namapakaian,
			'harga'=>$harga
		  );
		$where = array(
			'id' => $id
		);
		$this->PetugasModel->editpak($where,$data,'pakaian');
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datapakaian');
	}
	public function tambahpakaian()
	{
		$namapakaian=$this->input->post('namapakaian');
		$harga=$this->input->post('harga');
		$stok=$this->input->post('stok');
		$date_created=$this->input->post('tanggal_input');
		$data = array(
			'nama_pakaian'=> $namapakaian,
			'harga'=> $harga,
			'stok'=> $stok,
			'tanggal_input'=> $date_created
		  );
		  
		  $this->PetugasModel->tambahpak($data);
		  $this->session->set_flashdata('success','berhasil');
		  redirect('petugas/datapakaian');
	}
	public function hapuscustomer()
	{
		$id=$this->input->post('id_user');
		$this->PetugasModel->hapusc($id);
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datacustomer');
	}
	public function tambahcustomer()
	{
		$role_id = 2;
		$namacustomer=$this->input->post('namacustomer');
		$nohp=$this->input->post('nohp');
		$date_created=$this->input->post('date_created');
		$data = array(
			'role_id'=> $role_id,
			'nama_petugas'=> $namacustomer,
			'date_created'=> $date_created,
			'nohp'=> $nohp
		  );
		  
		  $this->PetugasModel->tambahc($data);
		  $this->session->set_flashdata('success','berhasil');
		  redirect('petugas/datacustomer');
	}
	public function editcustomer()
	{
		$id=$this->input->post('id_user');
		$namacustomer=$this->input->post('namacustomer');
		$nohp=$this->input->post('nohp');
		$data = array(
			'nama_petugas'=> $namacustomer,
			'nohp'=>$nohp
		  );
		$where = array(
			'id_user' => $id
		);
		$this->PetugasModel->editc($where,$data,'user');
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datacustomer');
	}
	public function hapuspetugas()
	{
		$id=$this->input->post('id_user');
		$this->PetugasModel->hapusp($id);
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datapetugas');
	}
	public function tambahpetugas()
	{
		$role_id = 1;
		$namapetugas=$this->input->post('namapetugas');
		$nohp=$this->input->post('nohp');
		$date_created=$this->input->post('date_created');
		$data = array(
			'role_id'=> $role_id,
			'nama_petugas'=> $namapetugas,
			'date_created'=> $date_created,
			'nohp'=> $nohp
		  );
		  
		  $this->PetugasModel->tambahp($data);
		  $this->session->set_flashdata('success','berhasil');
		  redirect('petugas/datapetugas');
	}
	public function editpetugas()
	{
		$id=$this->input->post('id_user');
		$namapetugas=$this->input->post('namapetugas');
		$nohp=$this->input->post('nohp');
		$data = array(
			'nama_petugas'=> $namapetugas,
			'nohp'=>$nohp
		  );
		$where = array(
			'id_user' => $id
		);
		$this->PetugasModel->editp($where,$data,'user');
		$this->session->set_flashdata('success','berhasil');
		redirect('petugas/datapetugas');
	}
}