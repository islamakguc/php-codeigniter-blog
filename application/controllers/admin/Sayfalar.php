<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayfalar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('Admin/Database_Model');
		$this -> load -> model('Admin/Admin_Model');
		$this -> load -> model('Admin/Sayfa_Post_model');
		$this -> load -> model('Admin/Sayfa_model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("sayfalar");
		$data["veri"]=$query->result();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/sayfa_listesi',$data);
		$this->load->view('admin/_footer');
	}
	
	
	public function delete($id)
	{
		$this->db->query("DELETE FROM sayfalar WHERE id=$id");
		$this->session->set_flashdata("sonuc","Sayfa Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sayfalar");
	}

	public function ekle()
	{
		
		$this->load->view('admin/sayfa_ekle');
	}
	
	public function eklekaydet()
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"icerik" => $this -> input -> post('icerik'),
			"durum" => $this -> input -> post('durum'),
			
			);
		$this->Database_Model->insert_data("sayfalar",$data);
		$this->session->set_flashdata("sonuc","Sayfa Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sayfalar");
	}
	public function onayla($id)
	{
		$data=array(
			"durum" =>1,
			);
		$this->Database_Model->update_data("sayfalar",$data,$id);
		$this->session->set_flashdata("sonuc","Sayfa Onaylama İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sayfalar");
	}
	public function onaykaldir($id)
	{
		$data=array(
			"durum" =>0,
			);
		$this->Database_Model->update_data("sayfalar",$data,$id);
		$this->session->set_flashdata("sonuc","Sayfa Onay Kaldırma İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sayfalar");
	}

	public function edit($id)
	{

		$data['categories'] = $this->Sayfa_model->get_entries();
		$data['data'] = $this->Sayfa_Post_model->get_entry($id);

		$this->load->view('admin/sayfa_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"icerik" => $this -> input -> post('icerik'),
			"durum" => $this -> input -> post('durum'),
			);
		$this->Database_Model->update_data("sayfalar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Sayfa Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/sayfalar");
	}
}
