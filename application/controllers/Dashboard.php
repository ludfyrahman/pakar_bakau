<?php
class Dashboard extends CI_Controller
{ //mengextends CI_Controller
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $now            = date("Y-m-d");
        $data           = $this->db->get('training')->result();
        $ras            = 0;
        $agama          = 0;
        $netral         = 0;
        foreach ($data as $v) {
            if($v->class == '1'){
                $netral++;
            }else if($v->class == '2'){
                $ras++;
            }else if($v->class == '3'){
                $agama++;
            }
        }
        $data['uji']    = $this->db->get_where('uji')->num_rows();
        $data['ras']    = $ras;
        $data['agama']  = $agama;
        $data['netral'] = $netral;
        $data['content']= "dashboard/index";
        $data['title']  = "Dashboard";
        $this->load->view('backend/index', $data);

    }
}
