<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this->load->model('Post_model'); 
		$this -> load -> database ();
	}
	
	public function index()
	{
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
			LEFT JOIN kategori
			ON yazilar.kategori_id=kategori.id
			WHERE yazilar.durum=1";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$query=$this->db->get("sayfalar");
		$data3["veri"]=$query->result();
		$this->load->view('_header',$data3);
		$this->load->view('_content',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer');
	}
	public function yazi_goster($id)
	{
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
			LEFT JOIN kategori
			ON yazilar.kategori_id=kategori.id
			WHERE yazilar.durum=1 and yazilar.id=$id";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$data["yorum"] =$this->Post_model->get_entries_by_yorum($id);
		$query=$this->db->get("sayfalar");
		$data3["veri"]=$query->result();
		$this->load->view('_header',$data3);
		$this->load->view('yazi_goster',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer');
	}

	public function kategori($id)
	{
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
			LEFT JOIN kategori
			ON yazilar.kategori_id=kategori.id
			WHERE yazilar.durum=1 and yazilar.kategori_id=$id";
		$sorgular=$this->db->query($sql);
		$data["veri"] =$sorgular->result();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$query=$this->db->get("sayfalar");
		$data3["veri"]=$query->result();
		$this->load->view('_header',$data3);
		$this->load->view('kategori_goster',$data);
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer');
	}
}
