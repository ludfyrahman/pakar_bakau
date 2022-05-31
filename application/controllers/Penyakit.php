<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penyakit extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "penyakit";
		$this->cap = "Penyakit";
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

	public function import(){
		if(isset($_FILES["file"]["name"])){
			// upload
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_type=$_FILES['file']['type'];
			// move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
			
			$object = PHPExcel_IOFactory::load($file_tmp);
	
			foreach($object->getWorksheetIterator() as $worksheet){
	
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
	
				for($row=2; $row<=$highestRow; $row++){
	
					$nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$solusi = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					// $ge = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					// $g = str_replace('G', '', $ge);
					// $gejala = array_map('intval', explode(', ', $g));;
					$data[] = array(
						'nama'          => $nama,
						'solusi'          =>$solusi,
						// 'gejala' => $gejala
					);
					// foreach ($gejala as $gg) {
					// 	$dataRole = [
					// 		'id_penyakit' => $row-1,
					// 		'id_gejala' => $gg
					// 	];
					// 	$this->db->insert('role_penyakit', $dataRole);
					// }
	
				} 
	
			}
			// echo "<pre>";
			// print_r($data);
			$this->db->insert_batch($this->low, $data);
			$this->session->set_flashdata("message", ['success', "Import file excel berhasil disimpan di database", ' Berhasil']);
			redirect(base_url($this->low));
		}
		else
		{
			$this->session->set_flashdata("message", ['success', "Import file excel gagal disimpan di database", ' Berhasil']);
			redirect(base_url($this->low));
		}
	}
	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'solusi' => $this->input->post('solusi'), 
			];
			$checkNama = $this->db->get_where('penyakit', ['nama' => $arr['nama']])->num_rows();
			if($checkNama>0){
				$this->session->set_flashdata("message", ['danger', "penyakit ".$arr['nama']." sudah dipakai ", ' Berhasil']);
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
		$data['id'] = $id;
		$data['data'] = $this->db->get('gejala')->result_array();
		$gejala = $this->db->query("SELECT g.id FROM role_penyakit rp JOIN penyakit p ON rp.id_penyakit=p.id JOIN gejala g ON rp.id_gejala=g.id WHERE rp.id_penyakit='$id'")->result_array();		
		$data['gejala'] = [];
		foreach ($gejala as $g) {
			$data['gejala'][] = $g['id'];
		}
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'solusi' => $this->input->post('solusi'), 
			];
			$latest = $this->db->get_where('penyakit', ['id' => $id])->row_array();
			$checkNama = $this->db->get_where('penyakit', ['nama' => $arr['nama']])->num_rows();
			// print_r($arr['nama']);
			if($checkNama > 0 && $arr['nama'] != $latest['nama']){
				$this->session->set_flashdata("message", ['danger', "Nama Penyakit ".$arr['nama'].' telah dipakai', ' Berhasil']);
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
	public function update_gejala($id){
		$d = $_POST;
		foreach ($d['gejala'] as $g) {
			$cek = $this->db->get_where('role_penyakit', ['id_penyakit' => $id, 'id_gejala' => $g])->num_rows();
			if($cek < 1){
				$this->db->insert('role_penyakit', ['id_penyakit' => $id, 'id_gejala' => $g]);
			}
		}
		$this->session->set_flashdata("message", ['success', "Berhasil Update Gejala Data $this->cap", 'Berhasil']);
		redirect(base_url("$this->low/detail/$id"));
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
