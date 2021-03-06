<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "pengguna";
		$this->cap = "Pengguna";
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		date_default_timezone_set('Asia/Jakarta');
		// if(!isset($_SESSION['kode_user'])){
		// 	redirect(base_url());
		// }
		if($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->store($this->uri->segment(4));
		}else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->update($this->uri->segment(3));
		}
    }
    public function index(){
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->low/index";
		$data['data'] = $this->db->get("$this->low")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'username' => $this->input->post('username'), 
			];
			$checkUsername = $this->db->get_where('pengguna', ['username' => $arr['username']])->num_rows();
			if($d['password'] != $d['password_konfirmasi']){
				$this->session->set_flashdata("message", ['danger', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
				// return $this->add();
			}else if($checkUsername > 0){
				$this->session->set_flashdata("message", ['danger', 'Username telah terpakai. silahkan gunakan username lain', ' Berhasil']);
			}else{
				$arr['password'] = md5($d['password']);
				$this->db->insert("$this->low",$arr);
				$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
				redirect(base_url("$this->low/"));
			}
			// print_r($checkUsername);
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	public function detail($id){
		$data['title'] = "Detail $this->cap";
		$data['content'] = "$this->low/_detail";
		$data['type'] = 'Detail';
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'username' => $this->input->post('username'), 
			];
			if($d['password'] !=''){
				if($d['password'] != $d['password_konfirmasi']){
					$this->session->set_flashdata("message", ['danger', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
					redirect(base_url("$this->low/edit/".$id));
				}else{
					$arr['password'] = md5($d['password']);
				}
			}
			$latest = $this->db->get_where('pengguna', ['id' => $id])->row_array();
			$checkUsername = $this->db->get_where('pengguna', ['username' => $arr['username']])->num_rows();
			// print_r($arr['nama']);
			if($checkUsername > 0 && $arr['username'] != $latest['username']){
				$this->session->set_flashdata("message", ['danger', "Username ".$arr['username'].' telah dipakai', ' Berhasil']);
			}else{
				$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
				$this->db->update("$this->low",$arr, ['id' => $id]);
				redirect(base_url("$this->low/"));
			}
			
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	public function delete($id){
		try{
			$this->db->delete("$this->low", ['id' => $id]);
			$this->session->set_flashdata("message", ['success', "Berhasil Hapus Data $this->cap", 'Berhasil']);
			redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Hapus Data $this->cap", 'Gagal']);
			redirect(base_url("$this->low/"));
		}
	}
}
