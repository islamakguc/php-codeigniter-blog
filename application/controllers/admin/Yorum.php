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
		$this -> load -> model('Admin/Yorum_model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$data['veri'] = $this->Yorum_model->get_entries_yorumm();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi',$data);
		$this->load->view('admin/_footer');
	}
	
	public function onay()
	{
		$data['data'] = $this->Yorum_model->get_entries_onay();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi_onay',$data);
		$this->load->view('admin/_footer');
	}
	public function onaybekleyen()
	{
		$data['data'] = $this->Yorum_model->get_entries_onaybekleyen();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi_onaybekleyen',$data);
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
		redirect(base_url()."admin/Yorum/onaybekleyen");
	}
	public function onaykaldir($id)
	{
		$data=array(
			"durum" =>0,
			);
		$this->Database_Model->update_data("yorumlar",$data,$id);
		$this->session->set_flashdata("sonuc","Yorum Onay Kaldırma İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yorum/onay");
	}
	public function yorumlarim()
	{
		$data['data'] = $this->Yorum_model->get_entries_yorum($this->session->oturum_data['ad']);
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorumlarim',$data);
		$this->load->view('admin/_footer');
		
	}
		public function edit($id)
	{
		$data['data'] = $this->Yorum_model->get_entries_yorum_edit($id);
		$this->load->view('admin/yorum_duzenle',$data);
	}
		public function guncellekaydet($id)
	{
		$data=array(
			"yorum" => $this -> input -> post('yorum'),
			);
		$this->Database_Model->update_data("yorumlar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Yorum Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/yorum/yorumlarim");
	}
}
