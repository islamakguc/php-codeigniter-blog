<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
	}
	
	public function index()
	{
		$query=$this->db->get("yazilar");
		$data["veri"]=$query->result();
		$query2=$this->db->get("kategori");
		$data2["veri"]=$query2->result();
		$this->load->view('_header');
		$this->load->view('_content',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer');
	}
}
