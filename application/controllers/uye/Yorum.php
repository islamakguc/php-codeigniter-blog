<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yorum extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('uye/Database_Model');		
		$this -> load -> model('uye/Yorum_model');
		if(! $this -> session -> userdata('oturum_data')|| $this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}

	public function index()
	{
		$data['veri'] = $this->Yorum_model->get_entries_yorum($this->session->oturum_data['ad']);
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('uye/_header',$data1);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/yorum_listesi',$data);
		$this->load->view('uye/_footer');
	}
	
	public function delete($id)
	{
		$this->db->query("DELETE FROM yorumlar WHERE id=$id");
		$this->session->set_flashdata("sonuc","Yorum Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."uye/Yorum");
	}
	public function edit($id)
	{
		$data['data'] = $this->Yorum_model->get_entries_yorum_edit($id);
		$this->load->view('uye/yorum_duzenle',$data);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"yorum" => $this -> input -> post('yorum'),
			"durum" => 0,
			);
		$this->Database_Model->update_data("yorumlar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Yorum Güncelleme İşlemi Başarı İle Gerçekleştirildi. Yorumunuz Onay Beklemede.");
		redirect(base_url()."uye/yorum");
	}
}
