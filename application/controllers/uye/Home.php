<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> model('uye/Database_Model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'login');
		}
		elseif($this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	
	public function index()
	{		
		$data["veri"]=$this->Database_Model->get_data("ayarlar");
		$data2["yorum"] = $this->Database_Model->get_data_new("yorumlar","yazar_ad",$this->session->oturum_data['ad']);
		$data2["yazi"] = $this->Database_Model->get_data_new("yazilar","yazar_ad",$this->session->oturum_data['ad']);
		$data2["mesaj"] = $this->Database_Model->get_data_new("mesajlar","alici_adi",$this->session->oturum_data['ad']);
		$data2["duyuru"]=$this->Database_Model->get_data("duyuru");
		$data2["kisi"] = $this->Database_Model->get_data_id("kullanicilar",$this->session->oturum_data['id']);

		$this->load->view('uye/_header',$data);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/_content',$data2);
		$this->load->view('uye/_footer');
	}
}
