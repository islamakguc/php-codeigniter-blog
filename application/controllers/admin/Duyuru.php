<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Duyuru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('admin/Database_Model');
		if(! $this -> session -> userdata('oturum_data')|| $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/Login');
		}
	}


	public function index()
	{
		$data["veri"]=$this->Database_Model->get_data("duyuru");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/duyuru',$data);
		$this->load->view('admin/_footer');
	}

	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"duyuru" => $this -> input -> post('duyuru')
			);
		$this->Database_Model->update_data("duyuru",$data,$id);
		$this->session->set_flashdata("sonuc","Duyuyu Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Duyuru");
	}
	
}