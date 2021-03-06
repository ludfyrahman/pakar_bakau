<?php
class Dashboard extends CI_Controller
{ //mengextends CI_Controller
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $now                = date("Y-m-d");
        $data['riwayat']  	= $this->db->get("riwayat")->result_array();
        $data['gejala']   	= $this->db->get("gejala")->result_array();
        $data['pengguna']   = $this->db->get("pengguna")->result_array();
        $data['content']    = "dashboard/index";
        $data['title']      = "Dashboard";
        $kasus              = [];
        $result             = [];
		// $tahun              = $this->db->query("SELECT tahun FROM detail_dataset dd JOIN dataset d ON dd.id_dataset=d.id GROUP BY id_dataset")->result_array();
		$data['penyakit']   = [];
		$dataChart          = [];
		$penyakit			= $this->db->get('penyakit')->result_array();
		foreach ($penyakit as $t) {
			$dataset        = $this->db->get_where('riwayat', ['id_penyakit' => $t['id']])->result_array();
			if($dataset > 0){
				$dataChart[]    = count($dataset);
				$data['penyakit'][] = $t['nama'];
			}
			
		}
		$data['chart']      = $dataChart;
		// foreach ($kasus as $k) {
		// 	$dataset        = $this->db->query("SELECT dd.jumlah, d.tahun FROM detail_dataset dd JOIN dataset d ON dd.id_dataset=d.id WHERE dd.id_kecamatan=".$k['id_kecamatan'])->result_array();
		// 	$dd = [];
		// 	foreach ($dataset as $d) {
		// 		$dd[$d['tahun']] = $d;
		// 	}
		// 	$result[]       = ['nama_kecamatan' => $k['nama_kecamatan'], 'data' => $dd];
		// }
		$data['result']     = $result;
        $this->load->view('backend/index', $data);

    }
}
