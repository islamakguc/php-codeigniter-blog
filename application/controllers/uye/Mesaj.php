<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesaj extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('uye/Database_Model');
		$this -> load -> model('uye/Admin_Model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	public function index()
	{
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data["veri"]=$this->Admin_Model->mesajalici($this->session->oturum_data['ad']);

		$this->load->view('uye/_header',$data1);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/mesaj_listesi',$data);
		$this->load->view('uye/_footer');
	}
	
	public function mesajgonder()
	{
		$data["veri"]=$this->Database_Model->get_data("kullanicilar");
		$this->load->view('uye/mesaj_gonder',$data);
	}

	public function mesajkaydet()
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"mesaj" => $this -> input -> post('mesaj'),
			"mesajlar.gonderici_adi" => $this->session->oturum_data['ad'],
			"mesajlar.alici_adi" => $this -> input -> post('alici'),			
			);
		$this->Database_Model->insert_data("mesajlar",$data);
		$this->session->set_flashdata("sonuc","Mesaj Gönderme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."uye/mesaj");
	}
	public function sil($id)
	{
		$this->Database_Model->delete_data("mesajlar",$id);
		$this->session->set_flashdata("sonuc","Mesaj Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."Uye/Mesaj");
	}
}
