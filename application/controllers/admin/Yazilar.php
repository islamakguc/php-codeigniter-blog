<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yazilar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('Admin/Database_Model');
		$this -> load -> model('Admin/Admin_Model');
		$this -> load -> model('Admin/post_model');
		$this -> load -> model('Post_model');
		$this -> load -> model('Admin/Category_model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("yazilar");
		$data["veri"]=$query->result();

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
			LEFT JOIN kategori
			ON yazilar.kategori_id=kategori.id";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();

		$query1=$this->db->get("ayarlar");
		$data1["veri"]=$query1->result();

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yazi_listesi',$data);
		$this->load->view('admin/_footer');
		//echo "Hoşgeldiniz";
	}
	public function ekle()
	{
		$query=$this->db->get("kategori");
		$data["veri"]=$query->result();
		$this->load->view('admin/yazi_ekle',$data);
	}
	public function eklekaydet()
	{
		$data=array(
			"baslik" => $this -> input -> post('Title'),
			"metin" => $this -> input -> post('Content'),
			"yazilar.yazar_ad" => $this->session->oturum_data['ad'],
			"yazilar.yazar_id" => $this->session->oturum_data['id'],
			"yazilar.kategori_id" => $this -> input -> post('yetki'),
			"durum" => $this -> input -> post('IsDraft'),
			
			);
		$this->Database_Model->insert_data("yazilar",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/yazilar");
	}
	public function delete($id)
	{
		$this->db->query("DELETE FROM yazilar WHERE id=$id");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/yazilar");
	}

	public function edit($id)
	{

		$data['categories'] = $this->Category_model->get_entries();
		$data['data'] = $this->post_model->get_entry($id);

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
			LEFT JOIN kategori
			ON yazilar.kategori_id=kategori.id
			WHERE yazilar.id=$id";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();
		$this->load->view('admin/yazi_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('Title'),
			"metin" => $this -> input -> post('Content'),
			"yazilar.yazar_ad" => $this->session->oturum_data['ad'],
			"yazilar.yazar_id" => $this->session->oturum_data['id'],
			"yazilar.kategori_id" => $this -> input -> post('yetki'),
			"durum" => $this -> input -> post('IsDraft'),
			);
		$this->Database_Model->update_data("yazilar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/yazilar");
	}
	
}
