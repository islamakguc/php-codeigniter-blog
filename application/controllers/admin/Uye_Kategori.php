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
		$query=$this->db->get("uyekategori");
		$data["veri"]=$query->result();
		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();
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
		$this->db->query("DELETE FROM uyekategori WHERE id=$id");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Uye_Kategori");
	}

	public function edit($id)
	{
		$sorgu=$this->db->query("SELECT * FROM uyekategori WHERE id=$id");
		$data["veri"]=$sorgu->result();
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
