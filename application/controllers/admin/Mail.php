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
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();

		$data["veri"]=$this->Mail_model->Mail_getir();

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/mail_listesi',$data);
		$this->load->view('admin/_footer');
	}
	
	public function sil($id)
	{
		$this->db->query("DELETE FROM bizeulasin WHERE id=$id");
		$this->session->set_flashdata("sonuc","Mail Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Mail");
	}
}
