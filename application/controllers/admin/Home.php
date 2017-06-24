<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}
	
	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_content');
		$this->load->view('admin/_footer');
	}
}
