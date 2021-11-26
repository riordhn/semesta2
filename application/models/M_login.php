<?php 

class M_login extends CI_Model{	
	
	function auth_admin($username,$password){
		$query1=$this->db->query("SELECT * FROM login WHERE NIP='$username' AND password=('$password') LIMIT 1");
		return $query1;
	}

	function auth_user($username){
		$query=$this->db->query("SELECT * FROM login WHERE NIK='$username' LIMIT 1");
		return $query;
		//return $items;
	}	
}