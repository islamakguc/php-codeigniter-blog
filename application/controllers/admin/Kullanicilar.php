<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanicilar extends CI_Controller {

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
		$data["veri"]=$this->Database_Model->get_data("kullanicilar");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/kullanicilar_listesi',$data);
		$this->load->view('admin/_footer');
	}

	public function ekle()
	{
		$data1["kategori"]=$this->Database_Model->get_data("uyekategori");
		$this->load->view('admin/kullanici_ekle',$data1);
	}

	public function eklekaydet()
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"sifre" => $this -> input -> post('sifre'),
			"mail" => $this -> input -> post('mail'),
			"yetki" => $this -> input -> post('yetki'),
			);
		$this->Database_Model->insert_data("kullanicilar",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar");
	}

	public function delete($id)
	{
		$this->Database_Model->delete_data("kullanicilar",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar");
	}

	public function edit($id)
	{
		$data["veri"]=$this->Database_Model->get_data_id("kullanicilar",$id);
		$data["kategori"]=$this->Database_Model->get_data("uyekategori");
		$this->load->view('admin/kullanici_duzenle',$data,$id);
	}

	public function guncellekaydet($id)
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"sifre" => $this -> input -> post('sifre'),
			"mail" => $this -> input -> post('mail'),
			"yetki" => $this -> input -> post('yetki'),
			"durum" => $this -> input -> post('durum'),
			);
		$this->Database_Model->update_data("kullanicilar",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar");
	}

	public function goster($id)
	{
		if($this -> session -> oturum_data['yetki'] == "Admin")
		{
			$data["veri"] = $this->Database_Model->get_data_id("kullanicilar",$id);
			$this->load->view('admin/kullanici_goster',$data);

		}
		elseif ($this -> session -> oturum_data['id'] == $id)
		{
			$data["veri"] = $this->Database_Model->get_data_id("kullanicilar",$id);
			$this->load->view('admin/kullanici_goster',$data);
		}
		else
		{
			$this -> session -> set_flashdata("sonuc","Yetkiniz Bulunmamaktadır.");
			redirect(base_url()."admin/kullanicilar");
		}
	}

	public function profiledit()
	{	
		$data["veri"]=$this->Database_Model->get_data_id("kullanicilar",$this->session->oturum_data['id']);
		$data["kategori"]=$this->Database_Model->get_data("uyekategori");
		$this->load->view('admin/profil_duzenle',$data,$this->session->oturum_data['id']);
	}


	public function profilguncelle($id)
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"mail" => $this -> input -> post('mail'),
			);
		$this->Database_Model->update_data("kullanicilar",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar/goster/$id");
	}
}
