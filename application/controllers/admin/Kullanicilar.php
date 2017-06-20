<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanicilar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('Database_Model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("kullanicilar");
		$data["veri"]=$query->result();
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/kullanicilar_listesi',$data);
		$this->load->view('admin/_footer');
		//echo "Hoşgeldiniz";
	}
	public function ekle()
	{
		$this->load->view('admin/kullanici_ekle');
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
		$this->db->query("DELETE FROM kullanicilar WHERE id=$id");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar");
	}

	public function edit($id)
	{
		$sorgu=$this->db->query("SELECT * FROM kullanicilar WHERE id=$id");
		$data["veri"]=$sorgu->result();
		$this->load->view('admin/kullanici_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"sifre" => $this -> input -> post('sifre'),
			"mail" => $this -> input -> post('mail'),
			"yetki" => $this -> input -> post('yetki'),
			);
		$this->Database_Model->update_data("kullanicilar",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar");
	}
	public function goster($id)
	{
		if($this -> session -> oturum_data['id'] != $id)
		{
			$this -> session -> set_flashdata("sonuc","Yanlış bir istemde bulundunuz.");
			redirect(base_url().'admin/kullanicilar/goster/'.$this -> session -> oturum_data['id']);
		}
		$sorgu = $this -> db -> query ("SELECT * FROM kullanicilar WHERE id=$id");
		$data["veri"] = $sorgu -> result();
		$this->load->view('admin/kullanici_goster',$data);
	}
	
}
