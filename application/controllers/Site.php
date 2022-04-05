<?php
class Site extends CI_Controller { //mengextends CI_Controller 
    public function __construct(){
        parent::__construct();
        $this->load->model('Datamodel', 'datamodel');
        // error_reporting(0);
    }
    public function index () {
		if(isset($_SESSION['userlevel'])){
			redirect(base_url('dashboard'));
		}
        $data['title'] = "Sistem Pakar penyakit ayam ";
        $data['content'] = "home/index";
		$this->load->view('frontend/index',$data);
    }
	public function diagnosa(){
		$data['title'] = "Diagnosa - Sistem Pakar";
        $data['content'] = "home/diagnosa";
		$data['data']		= $this->db->get("gejala")->result_array();
		$this->load->view('frontend/index',$data);
	}
	public function konsultasi(){
		$data['title'] = "Diagnosa - Sistem Pakar";
        $data['content'] = "home/konsultasi";
		$data['data']		= $this->db->get("gejala")->result_array();
		$this->load->view('frontend/index',$data);
	}
	public function informasi(){
		$data['title'] = "Informasi - Sistem Pakar";
        $data['content'] = "home/informasi";
		$this->load->view('frontend/index',$data);
	}
	public function hasil(){
		$d = $_POST;
		// print_r($d);
		$data['data']		= $this->datamodel->naive($d['gejala']);
		// echo "<pre>";
		// print_r($d['gejala']);
		// print_r($data);
		$data['title'] 		= "hasil - Sistem Pakar";
        $data['content'] 	= "home/hasil";
		$data['gejala'] 	= $this->db->select('gejala.nama,gejala.id')->join('gejala', 'gejala.id = role_penyakit.id_gejala')->where(['role_penyakit.id_penyakit' => $data['data'][0]['id']])->get('role_penyakit')->result_array();
		$data['input']		= $d['gejala'];
		$this->load->view('frontend/index',$data);
	}
	public function kasus(){
		$data['title'] = "Kasus - WebGis";
        $data['content'] = "home/kasus";
		$kasus = $this->db->get("kecamatan")->result_array();
		$result = [];
		$tahun = $this->db->query("SELECT tahun FROM detail_dataset dd JOIN dataset d ON dd.id_dataset=d.id GROUP BY id_dataset")->result_array();
		$data['tahun'] = [];
		$dataChart = [];
		foreach ($tahun as $t) {
			$dataset = $this->db->get_where('dataset', ['tahun' => $t['tahun']])->row_array();
			$dataChart[] = $dataset['jumlah'];
			$data['tahun'][] = $t['tahun'];
		}
		$data['chart'] = $dataChart;
		foreach ($kasus as $k) {
			$dataset = $this->db->query("SELECT dd.jumlah, d.tahun FROM detail_dataset dd JOIN dataset d ON dd.id_dataset=d.id WHERE dd.id_kecamatan=".$k['id_kecamatan'])->result_array();
			$dd = [];
			foreach ($dataset as $d) {
				$dd[$d['tahun']] = $d;
			}
			$result[] = ['nama_kecamatan' => $k['nama_kecamatan'], 'data' => $dd];
		}
		$data['result'] = $result;
		$this->load->view('frontend/index',$data);
	}
	public function login () {
		if(isset($_SESSION['userlevel'])){
			redirect(base_url('dashboard'));
		}
        $data['title'] = "Login";
        $data['content'] = "login/index";
		$this->load->view('frontend/index',$data);
    }
    public function doLogin(){
        $d = $_POST;
        if(!$d){
            redirect(base_url(""));
        }
        try {
            if($d){
                $a = $this->db->get_where("pengguna", ['username' => $d['username']])->result_array();
                // print_r($a);
                if(count($a) < 1) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, silahkan cek username anda kembali', ' Gagal']);
                    return $this->login();
                }
                $a = $a[0];
                if(md5($d['password']) != $a['password']) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Password anda salah', ' Gagal']);
                    return $this->login();
                }

                $_SESSION['userid'] = $a['id'];
                $_SESSION['userlevel'] = $a['level'];
                redirect(base_url("dashboard"));
            }
        }
        catch(Exception $e) {
            echo "gagal";
        }
    }
    public function logout(){
        session_destroy();
        redirect(base_url());
    }
    public function cek($id_produk){
        $cek = $this->db->get_where("produk", ['id' => $id_produk])->row_array();
        echo json_encode($cek);
    }
}
?>