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
		$multiplication	= 1;
		foreach ($gejala as $index => $g) {

			if(in_array($g['id'], $data)){
				$jumlah+=((1 + $jumlah_gejala * $jumlah_penyakit) / (1 + $jumlah_gejala));
				
				$multiplication *= ((1 + $jumlah_gejala * $jumlah_penyakit) / (1 + $jumlah_gejala));
			}else{
				$jumlah+=((0 + $jumlah_gejala * $jumlah_penyakit) / (0 + $jumlah_gejala));
				$multiplication *= ((0 + $jumlah_gejala * $jumlah_penyakit) / (0 + $jumlah_gejala));
				// echo ((1 + $jumlah_gejala * $jumlah_penyakit) / (1 + $jumlah_gejala));
				// echo "<br>";
			}
		}
		// echo $multiplication;
		$rata_rata = $jumlah / count($gejala);

		$data_penyakit[] = ['v' => $multiplication, 'penyakit' => $pe['nama'], 'id' => $pe['id']];
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