<?php
class datamodel extends CI_Model { //mengextands CI_Model
  function __construct()
  {
      parent::__construct();
  }
  public function naive($data){
	//   print_r($data);
	/**
	 * mencari jumlah penyakit di database
	 */
	$jumlah_penyakit 	= $this->db->get('penyakit')->num_rows();
	$jumlah_gejala 		= $this->db->get('gejala')->num_rows();
	/**
	 * mencari nilai p pada penyakit dengan rumus 1 / n
	 */
	$p 					= 1 / $jumlah_penyakit;

	/**
	 * menampilkan data penyakit beserta gejala
	 */
	$penyakit 			= $this->db->get('penyakit')->result_array();

	$data_penyakit = [];
	foreach ($penyakit as $pe) {
		$gejala 		= $this->db->query("SELECT g.nama,g.id FROM role_penyakit rp JOIN gejala g ON rp.id_gejala=g.id where id_penyakit = $pe[id]")->result_array();
		$gejalaArray	= [];
		$jumlah			= 0;
		$rata_rata		= 0;
		$klasifikasi	= 1;
		foreach ($gejala as $index => $g) {
			$gejalaArray[] = $g['id'];
		}
		// echo $multiplication;
		$pvj = 1 / $jumlah_gejala;
		$ncArray = [];
		$gejala = [];
		foreach ($data as $index => $d) {
			$nc = 0;
			$tf = 0;
			if(in_array($d, $gejalaArray)){
				$tf = 1;
			}else{
				$tf = 0;
			}
			$nc = ($tf +$jumlah_gejala*$p ) / ( 1 + $jumlah_gejala);
			$ncArray[] = $nc;
		}
		$ncMulti = 1;
		foreach ($ncArray as $na) {
			$ncMulti*=$na;
		}
		$data_penyakit[] = ['v' => number_format($ncMulti*$pvj, 20), 'penyakit' => $pe['nama'], 'id' => $pe['id'], 'gejala' => $gejalaArray, 'solusi' => $pe['solusi']];
	}
	
	$this->array_sort_by_column($data_penyakit, 'v');


	// insert data to riwayat
	$tanggal = date('Y-m-d H:i:s');
	$ip = $this->get_client_ip();
	$cek = $this->db->get_where("riwayat", ['ip' => $ip])->num_rows();
	if($cek < 1){
		$this->db->insert('riwayat', ['id_penyakit' => $data_penyakit[0]['id'], 'ip' => $ip, 'tanggal' => $tanggal]);
		$id = $this->db->insert_id();
		foreach ($data as $d) {
			$this->db->insert('detail_riwayat', ['id_riwayat' => $id, 'id_gejala' => $d]);
		}
	}
	return $data_penyakit;
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