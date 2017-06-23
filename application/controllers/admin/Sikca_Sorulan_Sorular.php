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
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$query=$this->db->get("sorular");
		$data["veri"]=$query->result();
		$this->load->view('admin/_header');
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
		$this->Database_Model->insert_data("sorular",$data);
		$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sikca_Sorulan_Sorular");
	}
	public function delete($id)
	{
		$this->db->query("DELETE FROM sorular WHERE id=$id");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Sikca_Sorulan_Sorular");
	}

	public function edit($id)
	{
		$sorgu=$this->db->query("SELECT * FROM sorular WHERE id=$id");
		$data["veri"]=$sorgu->result();
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
