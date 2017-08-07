<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sikca_Sorulan_Sorular extends CI_Controller {

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
		$data["veri"]=$this->Database_Model->get_data("sorular");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/SSS_listesi',$data);
		$this->load->view('admin/_footer');
	}
	public function ekle()
	{
		$this->load->view('admin/SSS_ekle');
	}
	public function eklekaydet()
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"icerik" => $this -> input -> post('icerik'),
			);
		//$this->Database_Model->insert_data("sorular",$data);
		$this -> db -> insert("sorular", $data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sikca_Sorulan_Sorular");
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("sorular",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sikca_Sorulan_Sorular");
	}

	public function edit($id)
	{
		$data["veri"]=$this->Database_Model->get_data_id("sorular",$id);
		$this->load->view('admin/SSS_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('baslik'),
			"icerik" => $this -> input -> post('icerik'),
			);
		$this->Database_Model->update_data("sorular",$data,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sikca_Sorulan_Sorular");
	}
}
