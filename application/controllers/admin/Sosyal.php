<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosyal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('admin/Database_Model');
		$this -> load -> model('admin/Sosyal_model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$query1=$this->db->get("sosyal");
		$data1["sosyal"]=$query1->result();
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/sosyal_listesi',$data1);
		$this->load->view('admin/_footer');
	}
	public function ekle()
	{

		$this->load->view('admin/sosyal_ekle');
	}
	
	public function sosyal_ekle()
	{
		$data=array(
			"ad" => $this -> input -> post('baslik'),
			"link" => $this -> input -> post('link'),
			"resim" => $this -> input -> post('class'),
			"durum" => 1,		
			);
		$this->Database_Model->insert_data("sosyal",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/sosyal");
	}
	public function guncelle($id)
	{
		$data['data'] = $this->Sosyal_model->guncelle($id);
		$this->load->view('admin/sosyal_duzenle',$data);
	}
	public function guncelle_kaydet($id)
	{
		$data=array(
			"ad" => $this -> input -> post('baslik'),
			"link" => $this -> input -> post('link'),
			"resim" => $this -> input -> post('class'),
			"durum" => 1,		
			);
		$this->Database_Model->update_data("sosyal",$data,$id);
		
		$this->session->set_flashdata("sonuc"," Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."Admin/Sosyal/guncelle/$id");
	}

	public function sil($id)
	{
		$this->db->query("DELETE FROM sosyal WHERE id=$id");
		$this->session->set_flashdata("sonuc","Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sosyal");
	}
}
