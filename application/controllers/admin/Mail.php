<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('admin/Mail_model');
		$this -> load -> model('admin/Database_Model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data["veri"]=$this->Mail_model->Mail_getir();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/mail_listesi',$data);
		$this->load->view('admin/_footer');
	}
	public function oku($id)
	{
		$data1["mail"]=$this->Database_Model->get_data_id("bizeulasin",$id);

		$data=array(
			"durum" => 1
			);
		$this->Database_Model->update_data("bizeulasin",$data,$id);
		
		$this->load->view('admin/mail_oku',$data1);
	}
	public function cevap($id)
	{
		$data1["mail"]=$this->Database_Model->get_data_id("bizeulasin",$id);

		$data=array(
			"cevap" => 1
			);
		$this->Database_Model->update_data("bizeulasin",$data,$id);
		$this->session->set_flashdata("sonuc","Mail cevaplama İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Mail");
	}
	public function sil($id)
	{
		$this->Database_Model->delete_data("bizeulasin",$id);
		$this->session->set_flashdata("sonuc","Mail Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Mail");
	}
}
