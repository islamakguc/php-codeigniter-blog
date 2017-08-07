<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yazilar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('uye/Database_Model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}


	public function index()
	{
		$id=$this->session->oturum_data['id'];

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id WHERE yazilar.yazar_id=$id";

		$data["veri"] =$this->db->query($sql)->result();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('uye/_header',$data1);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/yazi_listesi',$data);
		$this->load->view('uye/_footer');
		//echo "Hoşgeldiniz";
	}
	public function ekle()
	{
		$data["veri"]=$this->Database_Model->get_data("kategori");
		$this->load->view('uye/yazi_ekle',$data);
	}
	public function eklekaydet()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 1000000;
		$config['max_width']            = 3872;
		$config['max_height']           = 2592;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("sonuc","Upload Hatası ".$error);
			redirect(base_url()."uye/yazilar/ekle");
		}
		else
		{
			$data=array(
				"baslik" => $this -> input -> post('Title'),
				"metin" => $this -> input -> post('Content'),
				"yazilar.yazar_ad" => $this->session->oturum_data['ad'],
				"yazilar.yazar_id" => $this->session->oturum_data['id'],
				"yazilar.kategori_id" => $this -> input -> post('yetki'),
				"durum" => 0,
				"resim" => $this->upload->data('file_name')				
				);
			$this->Database_Model->insert_data("yazilar",$data);

			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi. Yazınız Onay Beklemede.");
			redirect(base_url()."uye/yazilar");
		}
		
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("yazilar",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."uye/yazilar");
	}

	public function edit($id)
	{

		$data['categories'] = $this->Database_Model->get_data("kategori");
		$data['data'] = $this->Database_Model->get_data_id("yazilar",$id);

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.id=$id";
		$data["veri"] =$this->db->query($sql)->result();
		$this->load->view('uye/yazi_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$data=array(
			"baslik" => $this -> input -> post('Title'),
			"metin" => $this -> input -> post('Content'),
			"yazilar.yazar_ad" => $this->session->oturum_data['ad'],
			"yazilar.yazar_id" => $this->session->oturum_data['id'],
			"yazilar.kategori_id" => $this -> input -> post('yetki'),
			"durum" => 0,
			);
		$this->Database_Model->update_data("yazilar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi. Yazınız Onay Beklemede.");
		redirect(base_url()."uye/yazilar");
	}

	public function resimekle($id)
	{
		$data["resim"]=$this->Database_Model->get_data_id("yazilar",$id);
		$this->load->view('uye/resim_ekle',$data);
	}
	public function resim_upload($id)
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 1000000;
		$config['max_width']            = 3872;
		$config['max_height']           = 2592;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("sonuc","Upload Hatası ".$error);
			redirect(base_url()."uye/yazilar/resimekle/$id");
		}
		else
		{
			$data=array(
				"resim" => $this->upload->data('file_name')			
				);
			$this->Database_Model->update_data("yazilar",$data,$id);

			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata("sonuc","Resim Upload İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."uye/yazilar");
		}
	}
	
}
