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
                    return $this->index();
                }
                $a = $a[0];
                if(md5($d['password']) != $a['password']) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Password anda salah', ' Gagal']);
                    return $this->index();
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
    public function persebaran(){
        $data['title'] = "Persebaran Penyakit";
		$data['content'] = "dataset/persebaran";
		$data['type'] = 'Penghitungan';
		$data['data'] = $this->db->get("kecamatan")->result_array();
        $persebaran = $this->db->get_where('detail_dataset', ['id_dataset' => 1])->result_array();
        $persebaran_total = $this->db->select_max("jumlah")->from("detail_dataset")->where(['id_dataset' => 1])->get()->row_array();
        $sebaran = [];
        $total = 0;
        $kategori = 4;
        $tb="kecamatan w  LEFT OUTER JOIN ( SELECT id_kecamatan, id_dataset,jumlah as jum FROM detail_dataset WHERE id_dataset=1 GROUP BY id_kecamatan )md ON md.id_kecamatan = w.id_kecamatan ";
		$fq="w.id_kecamatan, w.nama_kecamatan as nm, w.geojson, CASE WHEN NOT md.jum IS NULL THEN md.jum ELSE 0 END  AS aek, 0 as x1x2, 0 as powx1x2, 0 as s, 0 as z, '' as krit ";
		//init view
		$retVal="";
		$renderZ=$this->datamodel->qRead($tb,$fq,"");
		$jum = 0;
		$rata = 0;
		$banyak = $renderZ->num_rows();
		foreach($renderZ->result() as $row)
		{
			$jum += $row->aek;
		}

		$rata = $jum / $banyak ;
		$jumx1x2 = 0;

		foreach($renderZ->result() as $row)
		{
			$row->x1x2 = $row->aek - $rata;
			$row->powx1x2 = pow($row->x1x2,2);
			$jumx1x2 += $row->powx1x2;
		}

		$s = sqrt($jumx1x2 / $banyak);
		$z = null;
		foreach($renderZ->result() as $row)
		{
			$row->s = $s;
			$row->z = ($row->aek - $rata) / $row->s;
            $z[] = $row->z;
		}

		$zTemp=null;
		for($i=0;$i<count($z);$i++)
			if($z[$i]>0)
				$zTemp[] = $z[$i];


		$maxZ = max($zTemp);
		$minZ = min($zTemp);

		$intv = ($maxZ - $minZ) / 3;
		

		$rg3 = $maxZ;
		$rg2 = $maxZ - $intv;
		$rg1 = $rg2 - $intv;


		foreach($renderZ->result() as $row)
		{
					if($row->z < 0 )
					$row->krit = 4;
				else
				if($row->z <= $rg1)
					$row->krit = 3;
				else	
				if($row->z <= $rg2)
					$row->krit = 2;
				else	
					$row->krit = 1;
			
		}

		$data['sebaran']= [];
		foreach($renderZ->result_array() as $row)
		{
            $data['sebaran'][] = ['kecamatan' => $row['nm'], 'kategori' => $row['krit'], 'jumlah' => $row['aek'], 'geojson' => $row['geojson']];
			
		}
        
        // echo "<pre>";
        // print_r($data);
		$this->load->view('backend/index',$data);
    }
    public function cek($id_produk){
        $cek = $this->db->get_where("produk", ['id' => $id_produk])->row_array();
        echo json_encode($cek);
    }
    public function json(){

		$tb="kecamatan w  LEFT OUTER JOIN ( SELECT id_kecamatan, id_dataset,jumlah as jum FROM detail_dataset WHERE id_dataset=1 GROUP BY id_kecamatan )md ON md.id_kecamatan = w.id_kecamatan ";
		$fq="w.id_kecamatan, w.nama_kecamatan as nm, CASE WHEN NOT md.jum IS NULL THEN md.jum ELSE 0 END  AS aek, 0 as x1x2, 0 as powx1x2, 0 as s, 0 as z, '' as krit ";
		//init view
		$retVal="";
		$renderZ=$this->datamodel->qRead($tb,$fq,"");
		$jum = 0;
		$rata = 0;
		$banyak = $renderZ->num_rows();
		foreach($renderZ->result() as $row)
		{
			$jum += $row->aek;
		}

		$rata = $jum / $banyak ;
		$jumx1x2 = 0;

		foreach($renderZ->result() as $row)
		{
			$row->x1x2 = $row->aek - $rata;
			$row->powx1x2 = pow($row->x1x2,2);
			$jumx1x2 += $row->powx1x2;
		}

		$s = sqrt($jumx1x2 / $banyak);
		$z = null;
		foreach($renderZ->result() as $row)
		{
			$row->s = $s;
			$row->z = ($row->aek - $rata) / $row->s;
            $z[] = $row->z;
		}

		$zTemp=null;
		for($i=0;$i<count($z);$i++)
			if($z[$i]>0)
				$zTemp[] = $z[$i];


		$maxZ = max($zTemp);
		$minZ = min($zTemp);

		$intv = ($maxZ - $minZ) / 3;
		

		$rg3 = $maxZ;
		$rg2 = $maxZ - $intv;
		$rg1 = $rg2 - $intv;


		foreach($renderZ->result() as $row)
		{
					if($row->z < 0 )
					$row->krit = 4;
				else
				if($row->z <= $rg1)
					$row->krit = 3;
				else	
				if($row->z <= $rg2)
					$row->krit = 2;
				else	
					$row->krit = 1;
			
		}

		$data= [];
		foreach($renderZ->result_array() as $row)
		{
            $data[] = ['kecamatan' => $row['nm'], 'kategori' => $row['krit'], 'jumlah' => $row['aek']];
			
		}
        echo "<pre>";
        print_r($data);
		
    }
}
?>