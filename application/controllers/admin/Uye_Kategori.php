<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uye_Kategori extends CI_Controller {

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
		$data["veri"]=$this->Database_Model->get_data("uyekategori");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/uye_kategori_listesi',$data);
		$this->load->view('admin/_footer');
	}
	public function ekle()
	{
		$this->load->view('admin/uye_kategori_ekle');
	}
	public function eklekaydet()
	{
		$data=array(
			"kategoriadi" => $this -> input -> post('ad'),
			);
		$this->Database_Model->insert_data("uyekategori",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Uye_Kategori");
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("uyekategori",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Uye_Kategori");
	}

	public function edit($id)
	{
		$data["veri"]=$this->Database_Model->get_data_id("uyekategori",$id);
		$this->load->view('admin/uye_kategori_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"kategoriadi" => $this -> input -> post('ad'),
			);
		$this->Database_Model->update_data("uyekategori",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Uye_Kategori");
	}
}
