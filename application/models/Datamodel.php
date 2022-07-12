<?php
class datamodel extends CI_Model { //mengextands CI_Model
  function __construct()
  {
      parent::__construct();
  }
  public function penghitungan($data){
	$gejala 		= [];
	$gejalaResult 	= [];
	$role 			= [];
	$roleResult		= [];
	$gejalaBobot 	= [];
	$cfRule		 	= [];
	$cfRuleMulti 	= [];
	$cfRuleHasil 	= [];
	$bobotRuleHasil	= [];
	/**
	 * mencari nilai gejala pada tiap gejala yang di inputkan
	 */
	foreach ($data as $d) {
		/**
		 * memecah variabel untuk memisah nilai bobot dengan kode gejala
		 */
		$pecah= explode(',',$d);
		$gejala[] = $pecah[1];
		$gejalaBobot[] = $pecah[0];
		$gejalaData = $this->db->get_where('gejala', ['id'=>$pecah[1]])->row_array();
		$gejalaResult[] = ['id' => Response_Helper::code($gejalaData['id'], 'G'), 'nama' => $gejalaData['nama'], 'bobot' => $pecah[0]];
	}
	foreach ($gejala as $g) {
		$pen = $this->db->get_where('role_penyakit', ['id_gejala' => $g])->row_array();
		if(!in_array($pen['id_penyakit'], $role)){
			if(isset($pen['id_penyakit'])){
				$role[] = $pen['id_penyakit'];
			}
			
		}
	}

	foreach ($role as $r) {
		$roleData = $this->db->query("SELECT * FROM `role_penyakit` WHERE id_penyakit='$r'")->result_array();
		$roleCode = "IF ";
		foreach ($roleData as $i=> $rd) {
			$roleCode.=( $i < count($roleData)-1 ? Response_Helper::code($rd['id'], 'G')." AND " : Response_Helper::code($rd['id'], 'G')); 
		}
		$roleCode.=" THEN ".Response_Helper::code($rd['id'], 'P');
		$roleResult[] = ['id' => Response_Helper::code($r, 'R'), 'rules' => $roleCode];
	}
	/**
	 * melooping role untuk mendapatkan bobot tiap role
	 */
	$bobot = [];
	foreach ($role as $r) {
		$roleData = $this->db->query("SELECT * FROM role_penyakit WHERE id_penyakit='$r'")->result_array();
		$b = [];
		$cf = "";
		$cf1 = "";
		$cf2 = "";
		foreach ($roleData as $i => $rd) {
			$nilaiCf = 0;
			if(in_array($rd['id_gejala'], $gejala)){
				$lokasi 	= array_search($rd['id_gejala'], $gejala);
				/**
				 * memasukkan nilai cf user pada variabel
				 */
				$bobotUser 	= $gejalaBobot[$lokasi];
				$nilaiCf  	= $bobotUser; 
				/**
				 * menghitung nilai cf pakar dengan rumus MB - MD
				 */
				$cfPakar 	= ($rd['mb'] - $rd['md']);
				/**
				 * mengalikan untuk memperoleh nilai cf pada masing masing gejala
				 * bobot gejala = CFuser * CFPakar
				 */
				$b[] 		= $bobotUser * $cfPakar;
				
			}
			$cf .= "(".$nilaiCf.")".($i < count($roleData)-1 ? ',' : '');
			$cf1 .= "(".$nilaiCf .($nilaiCf!=0 ? " x ".$cfPakar : '').")".($i < count($roleData)-1 ? ',' : '');
			$cf2 .= "(".($nilaiCf!=0 ? $bobotUser * $cfPakar : $nilaiCf ).")".($i < count($roleData)-1 ? ',' : '');
			
		}
		$cfRule[] = ['id' => Response_Helper::code($rd['id_penyakit'], 'R'), 'rules'=> $cf];
		$cfRuleMulti[] = ['id' => Response_Helper::code($rd['id_penyakit'], 'R'), 'rules'=> $cf1];
		$cfRuleHasil[] = ['id' => Response_Helper::code($rd['id_penyakit'], 'R'), 'rules'=> $cf2];
		$bobot[] = $b;
	}
	/**
	 * menghitung data tiap rules
	 */
	$bobotRule = [];
	foreach ($bobot as $index => $bb) {
		/**
		 * Jika gejala yang terpilih hanya 1, maka : CF [H,E] * 100%
		 * jika gejala lebih dari 1
		 * 𝐶𝐹𝑐𝑏𝑛 = 𝐶𝐹[𝐻, 𝐸]𝑥,𝑦 = 𝐶𝐹[𝐻, 𝐸]𝑥 + 𝐶𝐹[𝐻, 𝐸]𝑦 × (1 − 𝐶𝐹[𝐻, 𝐸]𝑥) 
		 */
		$ruleNilaiResult = '';
		if(count($bb) > 1){
			$ruleNilai = 0;
			for ($i=0; $i < count($bb); $i++) { 
				$nilai = ($i == 0 ? $bb[$i] : $ruleNilai ) + $bb[(($i+1) < count($bb) ?? ($i+1))] *  ( 1 - $bb[$i]);
				$ruleNilai = $nilai;
				$ruleNilaiResult.= ($i == 0 ? $bb[$i] : $ruleNilai ) ." + ". $bb[(($i+1) < count($bb) ?? ($i+1))] ." x ( 1 - ". $bb[$i].") = <b>$nilai%</b><br>";
			}
			$presentase = $ruleNilai * 100;
			$bobotRule[] = $presentase;
			
		}else{
			$nilai = $bb[0] * 100;
			$bobotRule[] = $nilai;
			$ruleNilaiResult.= $bb[0] .' X '. 100 ." = <b>".$nilai."%</b>";
		}
		$bobotRuleHasil[] = ['id' => Response_Helper::code($role[$index], 'R'), 'penghitungan'=>$ruleNilaiResult];

	}

	/**
	 * mencari nilai tertinggi dari masing masing rule
	 */
	$max = max($bobotRule)."%";
	/**
	 * mencari nilai dengan maksimal sesuai dengan variabel $max
	 */
	$index = array_search($max, $bobotRule);
	/**
	 * menampilkan penyakit yang sesuai dengan nilai index
	 */
	$penyakit_id = $role[$index];
	$penyakit = $this->db->get_where("penyakit", ['id'=> $penyakit_id])->row_array();
	// return [$role, $gejala,$gejalaBobot, $bobot, $bobotRule, $penyakit_id];
	/**
	 * $gejalaresult = output gejala yang dipilih oleh pengguna
	 * $roleResult 		= output role yang akan di eksekusi
	 * $cfRule			= output role dengan nilai Cf masing masing gejala
	 * $cfRuleMulti		= output perkalian Cf user dan CF pakar
	 * $cfRuleHasil		= hasil perkalian cf user dan cf pakar
	 * $bobotrulehasil	= output penghitungan bobot
	 * $max 			= nilai tertinggi dari bobot masing masing rule
	 * $penyakit 		= menampilkan kesimpulan penyakit / hama yang diderita
	 */
	
	// return $penyakit;
	
	// insert data to riwayat
	$tanggal = date('Y-m-d H:i:s');
	$ip = $this->get_client_ip();
	$cek = $this->db->get_where("riwayat", ['ip' => $ip])->num_rows();
	if($cek < 1){
		$this->db->insert('riwayat', ['id_penyakit' => $penyakit_id, 'ip' => $ip, 'tanggal' => $tanggal]);
		$id = $this->db->insert_id();
		foreach ($gejala as $d) {
			$this->db->insert('detail_riwayat', ['id_riwayat' => $id, 'id_gejala' => $d]);
		}
	}
	return [$gejalaResult, $roleResult, $cfRule, $cfRuleMulti, $cfRuleHasil, $bobotRuleHasil,$bobotRule,$max, $penyakit];
  }
  public function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
  public function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
	}
}
?>