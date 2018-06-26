<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getdata extends CI_Model{
	
	public function params($column='*',$table='cms_user',$options=null){
		$sql = "select $column from $table $options";
		$query = $this->db->query($sql);
		return $query;
	}
}