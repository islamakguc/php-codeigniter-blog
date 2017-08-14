<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hata extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> library ('pagination');
		$this -> load -> helper ('url');
		$this -> load -> model ('Post_model');		
		$this -> load -> model ('admin/Database_Model'); 	
		$this -> load -> model ('admin/Admin_Model'); 
		$this -> load -> database ();
		
	}
	
	public function index()
	{
		$data5["medya"]=$this->Database_Model->get_data("sosyal");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
		$data2["veri"]=$this->Database_Model->get_data("kategori");
		$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
		$data2["yazicek"]=$this->Post_model->yazi();

		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('errors/html/error_404');		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
}
