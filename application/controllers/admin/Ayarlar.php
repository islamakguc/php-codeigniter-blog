<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('Admin/Database_Model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/ayarlar',$data);
		$this->load->view('admin/_footer');
	}
		
	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"icerik" => $this -> input -> post('icerik'),
			"mail" => $this -> input -> post('mail'),
			"yorum" => $this -> input -> post('yorum'),

			);
		$this->Database_Model->update_data("ayarlar",$data,$id);
		$this->session->set_flashdata("sonuc","Site Ayarları Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Ayarlar");
	}
	
}