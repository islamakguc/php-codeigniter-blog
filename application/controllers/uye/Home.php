<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		if(! $this -> session -> userdata('oturum_data')|| $this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	
	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$this->load->view('uye/_header',$data);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/_content');
		$this->load->view('uye/_footer');
	}
}
