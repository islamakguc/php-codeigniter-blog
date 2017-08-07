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
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi',$data);
		$this->load->view('admin/_footer');
	}
	
	public function onay()
	{
		$data['data'] = $this->Yorum_model->get_entries_onay();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi_onay',$data);
		$this->load->view('admin/_footer');
	}
	public function onaybekleyen()
	{
		$data['data'] = $this->Yorum_model->get_entries_onaybekleyen();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorum_listesi_onaybekleyen',$data);
		$this->load->view('admin/_footer');
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("yorumlar",$id);
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
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yorumlarim',$data);
		$this->load->view('admin/_footer');
		
	}
		public function edit($id)
	{
		$data['data'] = $this->Database_Model->get_data_id("yorumlar",$id);
		$data["veri"]=$this->Database_Model->get_data("ayarlar");
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
