<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar extends CI_Controller {

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
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/ayarlar');
		$this->load->view('admin/_footer');
	}

	public function guncellekaydet($id)
	{
		$data=array(
			"adsoyad" => $this -> input -> post('adsoyad'),
			"baslik" => $this -> input -> post('baslik'),
			"email" => $this -> input -> post('email'),
			"keywords" => $this -> input -> post('keywords'),
			"description" => $this -> input -> post('icerik'),
			"mail" => $this -> input -> post('mail'),
			"yorum" => $this -> input -> post('yorum'),
			"smtpserver" => $this -> input -> post('smtpserver'),
			"smtpport" => $this -> input -> post('smtpport'),
			"smtpmail" => $this -> input -> post('smtpmail'),
			"sifre" => $this -> input -> post('sifre'),

			);
		$this->Database_Model->update_data("ayarlar",$data,$id);
		$this->session->set_flashdata("sonuc","Site Ayarları Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Ayarlar");
	}
	
}