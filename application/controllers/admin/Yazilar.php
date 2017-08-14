<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yazilar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> database ();
		$this -> load -> library ("session");
		$this -> load -> model('admin/Database_Model');
		$this -> load -> model('admin/Admin_Model');
		$this -> load -> model('Post_model');
		$this->load->helper(array('form', 'url'));
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'admin/Login');
		}
	}
	public function index()
	{
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id"; 
		$data["veri"] =$this->db->query($sql)->result();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yazi_listesi',$data);
		$this->load->view('admin/_footer');
		//echo "Hoşgeldiniz";
	}
	public function yazilarim()
	{
		$id=$this->session->oturum_data['id'];
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.yazar_id=$id";
		$data["veri"] =$this->db->query($sql)->result();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/yazilarim',$data);
		$this->load->view('admin/_footer');
		//echo "Hoşgeldiniz";
	}
	public function taslakYazi()
	{
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE durum=0";
		$data["veri"] =$this->db->query($sql)->result();
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");

		$this->load->view('admin/_header',$data1);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/taslakyazi',$data);
		$this->load->view('admin/_footer');
	}
	public function ekle()
	{
		$data["veri"]=$this->Database_Model->get_data("kategori");
		$this->load->view('admin/yazi_ekle',$data);
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
			redirect(base_url()."admin/Yazilar/ekle");
		}
		else
		{
			$a=$this -> input -> post('Title');
			$a=str_replace(" ","-",$a);
			$a = trim($a);
			$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ','?');
			$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-','-');
			$a = str_replace($search,$replace,$a);
			$a=strtolower($a);
			$data=array(
				"baslik" => $this -> input -> post('Title'),
				"metin" => $this -> input -> post('Content'),
				"yazilar.yazar_ad" => $this->session->oturum_data['ad'],
				"yazilar.yazar_id" => $this->session->oturum_data['id'],
				"yazilar.kategori_id" => $this -> input -> post('yetki'),
				"keywords" => $this -> input -> post('keywords'),
				"description" => $this -> input -> post('description'),
				"durum" => $this -> input -> post('IsDraft'),
				"resim" => $this->upload->data('file_name'),
				"link" => $a,				
				);
			$this->Database_Model->insert_data("yazilar",$data);

			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata("sonuc","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."admin/Yazilar");
		}
	}
	public function delete($id)
	{
		$this->Database_Model->delete_data("yazilar",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yazilar");
	}

	public function edit($id)
	{
		$data['categories'] = $this->Database_Model->get_data("kategori");
		$data['data'] = $this->Database_Model->get_data_new("yazilar","link",$id);

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.link='$id'";
		$data["veri"] =$this->db->query($sql)->result();
		$this->load->view('admin/yazi_duzenle',$data,$id);
	}
	public function guncellekaydet($id)
	{
		$a=$this -> input -> post('Title');
		$a = trim($a);
		$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ','?');
		$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-','-');
		$a = str_replace($search,$replace,$a);
		$a=strtolower($a);

		$data=array(
			"baslik" => $this -> input -> post('Title'),
			"metin" => $this -> input -> post('Content'),
			"yazilar.kategori_id" => $this -> input -> post('yetki'),
			"keywords" => $this -> input -> post('keywords'),
			"description" => $this -> input -> post('description'),
			"durum" => $this -> input -> post('IsDraft'),
			"link" => $a,
			);
		$this->Database_Model->update_data("yazilar",$data,$id);
		
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yazilar");
	}
	public function resimekle($id)
	{
		$data["resim"]=$this->Database_Model->get_data_id("yazilar",$id);
		$this->load->view('admin/resim_ekle',$data);
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
			redirect(base_url()."admin/Yazilar/resimekle/$id");
		}
		else
		{
			$data=array(
				"resim" => $this->upload->data('file_name')			
				);
			$this->Database_Model->update_data("yazilar",$data,$id);

			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata("sonuc","Resim Upload İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."admin/Yazilar");
		}
	}
	public function resim_galeri_ekle($id)
	{
		$data["resim"]=$this->Database_Model->get_data_id("yazilar",$id);
		$data["data"]=$this->Database_Model->get_data_new("yazi_resim","yazi_id",$id);
		$this->load->view('admin/resim_galeri_ekle',$data);
	}
	public function resim_galeri_upload($id)
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
			redirect(base_url()."admin/Yazilar/resim_galeri_ekle/$id");
		}
		else
		{
			$data=array(
				"yazi_id" => $id,
				"ad" => $this->upload->data('file_name')			
				);
			$this->Database_Model->insert_data("yazi_resim",$data);

			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata("sonuc","Resim Upload İşlemi Başarı İle Gerçekleştirildi");
			redirect(base_url()."admin/Yazilar/resim_galeri_ekle/$id");
		}
	}
	public function deletegaleri($id,$idi)
	{
		$this->Database_Model->delete_data("yazi_resim",$id);
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."admin/Yazilar/resim_galeri_ekle/$idi");
	}
}
