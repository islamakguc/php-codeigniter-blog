<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> model('uye/Admin_Model');
		$this -> load -> model('uye/Database_Model');
		if(! $this -> session -> userdata('oturum_data')|| $this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	
	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$this->load->view('uye/_header',$data);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/_content');
		$this->load->view('uye/_footer');
	}
	public function goster()
	{
		$id=$this -> session -> oturum_data['id'];
		$sorgu = $this -> db -> query ("SELECT * FROM kullanicilar WHERE id=$id");
		$data["veri"] = $sorgu -> result();
		$this->load->view('uye/kullanici_goster',$data);
	}
	public function password()
	{
		$sifre=$this -> input -> post('eski');
		$id=$this->session->oturum_data['id'];
		$result = $this->Admin_Model->kontrol($id,$sifre);
		if($result && ($this -> input -> post('yeni')==$this -> input -> post('yenitekrar')))
		{
			$data=array(
				"sifre" => $this -> input -> post('yeni')
				);
			$this->Database_Model->update_data("kullanicilar",$data,$id);
			
			$this->session->set_flashdata("sonuc","şifre Güncelleme İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."Uye");
		}
		else
		{
			$this->session->set_flashdata("sonuc","Eksik Veya Yanlış Bilgi Girişi");
			redirect(base_url()."Uye");
		}
		
	}
	public function profiledit()
	{
		if($this -> session -> oturum_data['yetki'] == "Üye")
		{
			$id=$this -> session -> oturum_data['id'];
			$sorgu=$this->db->query("SELECT * FROM kullanicilar WHERE id=$id");
			$data["veri"]=$sorgu->result();
			$query1=$this->db->get("uyekategori");
			$data["kategori"]=$query1->result();
			$this->load->view('uye/profil_duzenle',$data,$id);
		}
		else {
			$this -> session -> set_flashdata("sonuc","Yetkiniz Bulunmamaktadır.");
			redirect(base_url()."uye/profil_duzenle");
		}
	}
	public function profilguncelle($id)
	{
		if($this -> session -> oturum_data['yetki'] == "Üye")
		{
			$data=array(
				"ad" => $this -> input -> post('ad'),
				"mail" => $this -> input -> post('mail'),
				);
			$this->Database_Model->update_data("kullanicilar",$data,$id);
			$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."uye/profil/goster/$id");
		}
		else {
			$this -> session -> set_flashdata("sonuc","Yetkiniz Bulunmamaktadır.");
			redirect(base_url()."uye/profil/goster/$id");
		}

	}
}
