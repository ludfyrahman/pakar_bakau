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
        $data['title'] = "Sistem Prediksi Tuberkulosis paru Kabupaten Banyuwangi Berbasis WebGis";
        $data['content'] = "home/index";
		$this->load->view('frontend/index',$data);
    }
	public function informasi(){
		$data['title'] = "Informasi - WebGis";
        $data['content'] = "home/informasi";
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
	public function prediksi(){
		$data['title'] = "Prediksi - WebGis";
        $data['content'] = "home/prediksi";

		/**
		 * penghitungan dataset
		 */
		$dataset = $this->db->get("dataset")->result_array();
		$jumlah = 0;
		$x = 0;
		$xy = 0;
		$x2 = 0;
		$linear = [];
		foreach ($dataset as $d) {
			$jumlah +=$d['jumlah'];
			$x      +=$d['x'];
			$xy     +=$d['x'] * $d['jumlah'];
			$x2     +=pow($d['x'], 2);
			$linear[] = ['tahun' => $d['tahun'], 'jumlah' => $d['jumlah'], 'x' => $d['x'], 'xy' => $d['x'] * $d['jumlah'], 'x2' => pow($d['x'], 2)];
		}
		$a = $jumlah / count($dataset);
		$b = $xy / $x2;
		$trend_linear = $a .($b < 0 ? $b : '+'.$b) ."X";

		$jumlahk = 0;
		$xk = 0;
		$xyk = 0;
		$x2k = 0;
		$x2y = 0;
		$x4 = 0;
		$kuadratis = [];
		foreach ($linear as $d) {
			$jumlahk +=$d['jumlah'];
			$xk      +=$d['x'];
			$xyk     +=$d['x'] * $d['jumlah'];
			$x2k     +=pow($d['x'], 2);
			$x2y     +=$d['x2'] * $d['jumlah'];
			$x4      +=pow($d['x'], 4);
			$kuadratis[] = ['tahun' => $d['tahun'], 'jumlah' => $d['jumlah'], 'x' => $d['x'], 'xy' => $d['x'] * $d['jumlah'], 'x2' => pow($d['x'], 2), 'x2y' => $d['x2'] * $d['jumlah'], 'x4' => pow($d['x'], 4)];
		}


		$ck = (count($dataset) * $x2y - $x2k * $jumlahk) / (count($dataset) * $x4 - pow($x2k, 2));
		$ak = ($jumlahk - ($ck * $x2k)) / count($dataset);
		$bk = $xyk / $x2k;
		$trend_kuadratis = $ak . ($bk < 0 ? $bk : '+'.$bk) ."X".($ck < 0 ? $ck : '+'.$ck."X2");


		$jumlah = 0;
		$xe = 0;
		$x2e = 0;
		$logye = 0;
		$xlogy = 0;
		// $linear = [];
		foreach ($kuadratis as $d) {
			$jumlah +=$d['jumlah'];
			$xe      +=$d['x'];
			$x2e     +=pow($d['x'], 2);
			$logye   +=LOG($d['jumlah'], 10);
			$xlogy   +=$d['x'] * LOG($d['jumlah'], 10);
		}
		$loga = $logye / count($dataset);
		$logb = $xlogy / 10;
		$antilog_a = pow(10, $loga);
		$antilog_b = pow(10, $logb);
		$trend_eksponensial = $antilog_a  ."*". $antilog_b."ˣ";


		$ramalanJumlah  = $yJumlah = 0;
		foreach ($dataset as $d) {
			$trend = str_replace('X', '', $trend_linear);
			$st = '';
			if(strpos($trend_linear,"-") !== false){
				$trend = explode('-', $trend_linear);
				$st = 'min';
			}else if(strpos($trend_linear,"+") !== false){
				$trend = explode('+', $trend_linear);
				$st = 'plus';
			}
			
			if($st == 'min'){
				$ramalan = (double)$trend[0] - ((double)$trend[1] * $d['x']);
			}else{
				$ramalan = (double)$trend[0] + ((double)$trend[1] * $d['x']);
			}
			$ramalanJumlah +=$ramalan;
			$yJumlah +=($d['jumlah'] - $ramalan) / $d['jumlah'];
		}

		$ramalankuadratis  = $yjumlahkuadratis = 0;
                          
		foreach ($dataset as $d) {
			$trend = str_replace('X', '', $trend_kuadratis);
			$st = '';
			if(strpos($trend_kuadratis,"-") !== false){
				$trend = explode('-', $trend_kuadratis);
				$st = 'min';
			}else if(strpos($trend_kuadratis,"+") !== false){
				$trend = explode('+', $trend_kuadratis);
				$st = 'plus';
			}
			
			if($st == 'min'){
				$ramalan = (double)$trend[0] - ((double)$trend[1] * $d['x']) - ((double)$trend[2] * pow($d['x'], 2));
			}else{
				$ramalan = (double)$trend[0] + ((double)$trend[1] * $d['x'])+ ((double)$trend[2] * pow($d['x'], 2));
			}
			$ramalankuadratis +=$ramalan;
			$yjumlahkuadratis +=($d['jumlah'] - $ramalan) / $d['jumlah'];
		}


		$ramalaneksponensial  = $yjumlaheksponensial = 0;
		foreach ($dataset as $d) {
			$trend = str_replace('ˣ', '', $trend_eksponensial);
			$trend = explode('*', $trend_eksponensial);
			$ramalan = (double)$trend[0] * ( pow((double)$trend[1], $d['x']));
			$ramalaneksponensial +=$ramalan;
			$yjumlaheksponensial +=($d['jumlah'] - $ramalan) / $d['jumlah'];
		}
		$metode_linear = abs($yJumlah/ count($dataset));
		$metode_kuadratis = abs($yjumlahkuadratis / count($dataset));
		$metode_eksponential = abs($yjumlaheksponensial / count($dataset));
		$metode = "";
		$metode_id = 1;
		if($metode_linear < $metode_kuadratis && $metode_linear < $metode_eksponential){
			$metode = "Metode Linear";
			$metode_id =1;
		}else if($metode_kuadratis < $metode_linear && $metode_kuadratis < $metode_eksponential){
			$metode = "Metode Kuadratis";
			$metode_id =2;
		}else{
			$metode = "Metode Eksponential";
			$metode_id =3;
		}
		$prediksi = [];
		if($metode_id == 1){
			$hasil = max($dataset);
			$tahun = 5;
			$hasilLX = $hasilLPrediksi = $hasilLPembulatan = 0;
			$median = 0 -($tahun - (round($tahun/2)));
			for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
				$trend = str_replace('X', '', $trend_linear);
				$st = '';
				if(strpos($trend_linear,"-") !== false){
					$trend = explode('-', $trend_linear);
					$st = 'min';
				}else if(strpos($trend_linear,"+") !== false){
					$trend = explode('+', $trend_linear);
					$st = 'plus';
				}
				
				if($st == 'min'){
					$ramalan = (double)$trend[0] - ((double)$trend[1] * $median);
				}else{
					$ramalan = (double)$trend[0] + ((double)$trend[1] * $median);
				}
				$hasilLX +=$median;
				$hasilLPrediksi +=$ramalan;
				$hasilLPembulatan +=round($ramalan);
				$prediksi[] = ['tahun' => $i, 'prediksi' => round($ramalan)];
				$median++;
			}
		}else if($metode_id == 2){
			$hasil = max($dataset);
			$tahun = 5;
			$hasilX = $hasilX2 = $hasilPrediksi = $hasilPembulatan = 0;
			$median = 0 -($tahun - (round($tahun/2)));
			for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
			  $trend = str_replace('X', '', $trend_kuadratis);
			  $st = '';
			  if(strpos($trend_kuadratis,"-") !== false){
				$trend = explode('-', $trend_kuadratis);
				$st = 'min';
			  }else if(strpos($trend_kuadratis,"+") !== false){
				$trend = explode('+', $trend_kuadratis);
				$st = 'plus';
			  }
			  
			  if($st == 'min'){
				$ramalan = (double)$trend[0] - ((double)$trend[1] * $median) - ((double)$trend[2] * pow($median, 2));
			  }else{
				$ramalan = (double)$trend[0] + ((double)$trend[1] * $median)+ ((double)$trend[2] * pow($median, 2));
			  }
			  $hasilX +=$median;
			  $hasilX2 +=pow($median, 2);
			  $hasilPrediksi +=$ramalan;
			  $hasilPembulatan +=round($ramalan);
			  $prediksi[] = ['tahun' => $i, 'prediksi' => round($ramalan)];
			  $median++;
			}
		}else{
			$hasil = max($dataset);
			$tahun = 5;
			$hasilEX = $hasilEX2 = $hasilEPrediksi = $hasilEPembulatan = 0;
			$median = 0 -($tahun - (round($tahun/2)));
			for ($i = $hasil['tahun']+1; $i < $hasil['tahun']+($tahun +1);$i++) {
				$trend = str_replace('ˣ', '', $trend_eksponensial);
				$trend = explode('*', $trend_eksponensial);
				
				$ramalan = (double)$trend[0] * ( pow((double)$trend[1], $median));
				$hasilEX +=$median;
				$hasilEX2 +=pow($median, 2);
				$hasilEPrediksi +=$ramalan;
				$hasilEPembulatan +=round($ramalan);
				$prediksi[] = ['tahun' => $i, 'prediksi' => round($ramalan)];
				$median++;
			}
		}
		$data['data'] = $prediksi;
		$data['tahun'] = [];
		$data['chart'] = [];
		foreach ($prediksi as $p) {
			$data['tahun'][] = $p['tahun'];
			$data['chart'][] = $p['prediksi'];
		}
		$this->load->view('frontend/index',$data);
	}
	public function peta(){
		$data['title'] = "Persebaran - WebGis";
        $data['content'] = "home/peta";
		$data['data'] = $this->db->get("kecamatan")->result_array();
        $persebaran = $this->db->get_where('detail_dataset', ['id_dataset' => 1])->result_array();
        $persebaran_total = $this->db->select_max("jumlah")->from("detail_dataset")->where(['id_dataset' => 1])->get()->row_array();
        $sebaran = [];
        $total = 0;
        $kategori = 4;
        $tb="kecamatan w  LEFT OUTER JOIN ( SELECT id_kecamatan, id_dataset,jumlah as jum FROM detail_dataset WHERE id_dataset=1 GROUP BY id_kecamatan )md ON md.id_kecamatan = w.id_kecamatan ";
		$fq="w.id_kecamatan, w.nama_kecamatan as nm, w.geojson,w.latitude,w.longitude, CASE WHEN NOT md.jum IS NULL THEN md.jum ELSE 0 END  AS aek, 0 as x1x2, 0 as powx1x2, 0 as s, 0 as z, '' as krit ";
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
            $data['sebaran'][] = ['kecamatan' => $row['nm'], 'kategori' => $row['krit'], 'jumlah' => $row['aek'], 'geojson' => $row['geojson'], 'latitude' => $row['latitude'], 'longitude' => $row['longitude']];
			
		}
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
		$fq="w.id_kecamatan, w.nama_kecamatan as nm, w.geojson,w.latitude,w.longitude, CASE WHEN NOT md.jum IS NULL THEN md.jum ELSE 0 END  AS aek, 0 as x1x2, 0 as powx1x2, 0 as s, 0 as z, '' as krit ";
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
            $data['sebaran'][] = ['kecamatan' => $row['nm'], 'kategori' => $row['krit'], 'jumlah' => $row['aek'], 'geojson' => $row['geojson'], 'latitude' => $row['latitude'], 'longitude' => $row['longitude']];
			
		}
        
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