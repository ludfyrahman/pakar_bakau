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
		$data_penyakit[] = ['v' => number_format($ncMulti*$pvj, 8), 'penyakit' => $pe['nama'], 'id' => $pe['id'], 'gejala' => $gejalaArray, 'solusi' => $pe['solusi']];
	}
	// echo "<pre>";
	$this->array_sort_by_column($data_penyakit, 'v');
	return $data_penyakit;
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