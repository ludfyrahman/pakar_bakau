<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dataset extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "dataset";
		$this->cap = "Dataset";
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
		$detail = $this->db->query("SELECT SUM(jumlah) jumlah, id_dataset FROM `detail_dataset` GROUP BY id_dataset")->result_array();
		foreach ($detail as $d) {
			$this->db->update("dataset", ['jumlah' => $d['jumlah']],  ['id' => $d['id_dataset']]);
		}
		$dd = $this->db->get("$this->low")->result_array();
		$median = 0 -(count($dd) - (round(count($dd)/2)));
		foreach ($dd as $x) {
			$this->db->update('dataset', ['x' => $median++], ['id' => $x['id']]);
		}
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
				'tahun' 	=> $this->input->post('tahun'), 
				// 'jumlah' 	=> $this->input->post('jumlah'),
				// 'x' 		=> $this->input->post('x'), 
 
			];
			$cekdb = $this->db->get_where('dataset', ['tahun', $d['tahun']])->num_rows();
			if($cekdb > 0){
				$this->session->set_flashdata("message", ['danger', 'Tahun dataset sudah digunakan', ' Berhasil']);
				// return $this->add();
			}else{
				$this->db->insert("$this->low",$arr);
				$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
				redirect(base_url("$this->low/"));
			}
			
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
				'tahun' 	=> $this->input->post('tahun'), 
				// 'jumlah' 	=> $this->input->post('jumlah'), 
				// 'x' 		=> $this->input->post('x'), 
			];
			$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
			$this->db->update("$this->low",$arr, ['id' => $id]);
			redirect(base_url("$this->low/"));
			
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
	public function penghitungan(){
		$data['title'] = "Penghitungan $this->cap";
		$data['content'] = "$this->low/_detail";
		$data['type'] = 'Penghitungan';
		$data['data'] = $this->db->get("$this->low")->result_array();		
		$this->load->view('backend/index',$data);
	}
}
