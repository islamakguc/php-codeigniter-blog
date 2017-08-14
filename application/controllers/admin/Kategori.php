<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('admin/Database_Model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/Login');
		}
	}


	public function index()
	{
		$data["veri"]=$this->Database_Model->get_data("kategori");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/kategori_listesi',$data);
		$this->load->view('admin/_footer');
	}
	public function ekle()
	{
		$this->load->view('admin/kategori_ekle');
	}
	public function eklekaydet()
	{
		$veri["veri"]=$this->Database_Model->get_data("ayarlar");
		$data=array(
			"kategoriadi" => $this -> input -> post('ad'),
			"baslik" => $this -> input -> post('ad')." "."|"." ".$veri["veri"][0]->baslik,
			"keywords" => $veri["veri"][0]->keywords,
			"description" => $veri["veri"][0]->description,

			);
		$this->Database_Model->insert_data("kategori",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Kategori");
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("kategori",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Kategori");
	}

	public function edit($id)
	{
		$data["veri"]=$this->Database_Model->get_data_id("kategori",$id);
		$this->load->view('admin/kategori_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$veri["veri"]=$this->Database_Model->get_data("ayarlar");
		$data=array(
			"kategoriadi" => $this -> input -> post('ad'),
			"baslik" => $this -> input -> post('ad')." "."|"." ".$veri["veri"][0]->baslik,
			"keywords" => $veri["veri"][0]->keywords,
			"description" => $veri["veri"][0]->description,
			);
		$this->Database_Model->update_data("kategori",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Kategori");
	}
}
