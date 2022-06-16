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
	public function penyakit(){
		$data['title'] 		= "Penyakit - Sistem Pakar";
        $data['content'] 	= "home/penyakit";
		$data['data']		= $this->db->get("penyakit")->result_array();
		$this->load->view('frontend/index',$data);
	}
	public function informasi(){
		$data['title'] = "Informasi - Sistem Pakar";
        $data['content'] = "home/informasi";
		$this->load->view('frontend/index',$data);
	}
    public function pakar(){
		$data['title'] = "Pakar - Sistem Pakar";
        $data['content'] = "home/pakar";
		$this->load->view('frontend/index',$data);
	}
	public function hasil(){
		$d = $_POST;
		if(count($d['gejala']) < 4){
			echo "<script>alert('Silahkan pilih gejala minimal 4');window.history.go(-1);</script>";
			// header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else if(count($d['gejala']) > 14){
            echo "<script>alert('Silahkan pilih gejala maksimal 14');window.history.go(-1);</script>";
        }else{
			$data['data']		= $this->datamodel->naive($d['gejala']);
			$data['title'] 		= "hasil - Sistem Pakar";
			$data['content'] 	= "home/hasil";
			$data['gejala'] 	= $this->db->select('gejala.nama,gejala.id')->join('gejala', 'gejala.id = role_penyakit.id_gejala')->where(['role_penyakit.id_penyakit' => $data['data'][0]['id']])->get('role_penyakit')->result_array();
			$data['input']		= $d['gejala'];
            
			$this->load->view('frontend/index',$data);
		}
	}
    public function apiGejala(){
        $data['data']		= $this->db->get("gejala")->result_array();
        echo json_encode($data);
    }
    public function apiPenyakit(){
        $data['data']		= $this->db->get("penyakit")->result_array();
        echo json_encode($data);
    }
    public function apiDiagnosa(){
        $d = $_POST;
        // echo count($d['gejala']);
		if(count($d['gejala']) < 4){
			// echo "<script>alert('Silahkan pilih gejala minimal 4');window.history.go(-1);</script>";
			$data['message'] = 'Silahkan pilih gejala minimal 4';
            $data['status'] = false;
            $data['data'] = null;
		}else if(count($d['gejala']) > 14){
            $data['message'] = 'Silahkan pilih gejala minimal 4 dan maksimal 14 gejala';
            $data['status'] = false;
            $data['data'] = null;
        }else{
			
            $data['input']		= $d['gejala'];
            $data['status']     = true;
            
            $prob               = 0;
            $data['data']       = $this->datamodel->naive($d['gejala']);
            $data['gejala'] 	= $this->db->select('gejala.nama,gejala.id')->join('gejala', 'gejala.id = role_penyakit.id_gejala')->where(['role_penyakit.id_penyakit' => $data['data'][0]['id']])->get('role_penyakit')->result_array();
            $total              = count($data['gejala']);
            $data['gejalaPenyakit'] = "";
            foreach ($data['gejala'] as $nomor => $g) {
                // echo ($nomor+1).". ".(in_array($g['id'], $data['input']) ? '<b>' : '').$g['nama'].(in_array($g['id'], $data['input']) ? '</b>' : '')."<br>";
                $data['gejalaPenyakit'].=($nomor+1).". ".(in_array($g['id'], $data['input']) ? '' : '').$g['nama'].(in_array($g['id'], $data['input']) ? '' : '')." \n";
                if(in_array($g['id'], $data['input'])){
                    $prob++;
                }
            }
            $data['presentase'] = number_format(($prob > 0 ? $prob / $total * 100 : 0), 2);
            $data['probabilitas'] = $data['data'][0]['v'];
            $data['penyakit'] = $data['data'][0]['penyakit'];
            $data['solusi'] = str_replace(PHP_EOL, " \n", $data['data'][0]['solusi']);
            $data['message'] = $data['data'][0]['penyakit'];
		}
        echo json_encode($data);
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