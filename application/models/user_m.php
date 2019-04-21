<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model{

	public function showAllUser(){

		$this->db->order_by('created_at', 'desc');
		 $query = $this->db->get( 'tbl_users');
		//   echo "<pre>";
		//   print_r($query);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

 
}