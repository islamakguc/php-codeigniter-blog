<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yorum extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('Admin/Database_Model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("yorumlar");
		$data["veri"]=$query->result();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi',$data);
		$this->load->view('admin/_footer');
	}
	
	
	public function delete($id)
	{
		$this->db->query("DELETE FROM yorumlar WHERE id=$id");
		$this->session->set_flashdata("sonuc","Yorum Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yorum");
	}

	
	public function onayla($id)
	{
		$data=array(
			"durum" =>1,
			);
		$this->Database_Model->update_data("yorumlar",$data,$id);
		$this->session->set_flashdata("sonuc","Yorum Onaylama İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yorum");
	}
	public function onaykaldir($id)
	{
		$data=array(
			"durum" =>0,
			);
		$this->Database_Model->update_data("yorumlar",$data,$id);
		$this->session->set_flashdata("sonuc","Yorum Onay Kaldırma İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yorum");
	}
}
