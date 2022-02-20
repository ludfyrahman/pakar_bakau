<?php
class datamodel extends CI_Model { //mengextands CI_Model
  function __construct()
  {
      parent::__construct();
  }
  function qRead($tbq,$sel,$valflag)
	{
		if($sel=="")
			$sel="*";
		if(strlen($valflag)>0)		
			$valflag="where ".$valflag;		
	
			$sqlq=sprintf("select %s from %s %s",$sel,$tbq,$valflag);
			
			$query=$this->db->query($sqlq);
				return $query;
		
	}
}
?>