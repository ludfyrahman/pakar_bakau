<?php
/**
*
*/
class Response_helper
{

	public static function part($file)
	{
		include str_replace("system", "application/views/", BASEPATH) . "part/$file.php";
	}
	public static function toRupiah($string){
		return "Rp ".number_format($string);
	}
	public static function url_base(){
		return base_url();
	}
	public static function code($no, $code){
		return (strlen($no) > 1 ? $code.'0' : $code.'00').$no;
	}
}
