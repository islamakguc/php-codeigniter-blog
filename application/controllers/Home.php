<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this->load->model('Post_model');		
		$this->load->model('Database_Model'); 
		$this -> load -> database ();
	}
	
	public function index()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();

		$ayar=$this->db->get("ayarlar");
		$ayarlar["ayar"]=$ayar->result();

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 
		ORDER BY tarih DESC";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$this->load->view('_header',$ayarlar);
		$this->load->view('_slider',$data);
		$this->load->view('_header2');
		$this->load->view('_content',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function yazi_goster($id)
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.id=$id";

		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();

		$query1=$this->db->get("ayarlar");
		$data1["ayar"]=$query1->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$data["yorum"] =$this->Post_model->get_entries_by_yorum($id);

		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('yazi_goster',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}

	public function kategori($id)
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.kategori_id=$id";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();
		$this->load->view('_header',$data1);
		$this->load->view('_slider');
		$this->load->view('_header2');
		$this->load->view('kategori_goster',$data);
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function yazar($ad)
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.yazar_id=$ad";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();
		
		$this->load->view('_header',$data1);
		$this->load->view('_slider');
		$this->load->view('_header2');
		$this->load->view('kategori_goster',$data);
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}

	public function yorumekle($id)
	{
		$data=array(
			"yorum" => $this -> input -> post('yorum'),
			"yorumlar.yazar_ad" => $this->session->oturum_data['ad'],
			"yorumlar.yazar_mail" => $this->session->oturum_data['mail'],
			"yorumlar.yazi_id" => $id,
			"durum" => 0,
			);
		$this->Database_Model->insert_data("yorumlar",$data);
		$this->session->set_flashdata("sonuc","Yorum Ekleme İşlemi Başarı İle Gerçekleştirildi, Yorumunuz Onay Beklemede");
		redirect(base_url()."Home/yazi_goster/$id");
	}

	public function bize_ulasin()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();
		$query1=$this->db->get("ayarlar");
		$data["ayar"]=$query1->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$this->load->view('_header',$data);
		$this->load->view('_header2');
		$this->load->view('bize_ulasin',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function mailgonder()
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"mail" => $this -> input -> post('mail'),
			"icerik" => $this -> input -> post('icerik')		
			);
		$this->Database_Model->insert_data("bizeulasin",$data);
		$this->session->set_flashdata("sonuc","Mesajınız bize Başarı İle Ulaştı");
		redirect(base_url()."Home/bize_ulasin");
	}

	public function sss()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$query1=$this->db->get("sorular");
		$data["soru"]=$query1->result();

		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();
		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('sss',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}

	public function benkimim()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$query1=$this->db->get("sorular");
		$data["soru"]=$query1->result();
		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();
		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('benkimim',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
}
