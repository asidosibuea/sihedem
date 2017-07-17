<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function cek_admin($data) {
			$query = $this->db->get_where('admin', $data);
			return $query;
	}
	public function cek_sekolah($data) {
			$query = $this->db->get_where('sekolah', $data);
			return $query;
	}
	public function cek_konsultan($data) {
			$query = $this->db->get_where('konsultan', $data);
			return $query;
	}
	public function cek_surveyor($data) {
			$query = $this->db->get_where('surveyor', $data);
			return $query;
	}
	
}
