<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benkimim extends CI_Controller {

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
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data["data"]=$this->Database_Model->get_data_id("benkimim",1);
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/benkimim',$data);
		$this->load->view('admin/_footer');
	}

	public function guncellekaydet($id)
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"baslik" => $this -> input -> post('baslik'),
			"mail" => $this -> input -> post('mail'),
			"keywords" => $this -> input -> post('keywords'),
			"description" => $this -> input -> post('description'),
			"icerik" => $this -> input -> post('icerik'),

			);
		$this->Database_Model->update_data("benkimim",$data,$id);
		$this->session->set_flashdata("sonuc","Ben Kimim Sayfası Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Benkimim");
	}
	
}