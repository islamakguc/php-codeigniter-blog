<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> model('uye/Yorum_model');
		$this -> load -> model('uye/Post_model');
		$this -> load -> model('uye/Admin_model');
		if(! $this -> session -> userdata('oturum_data'))
		{
			redirect(base_url().'login');
		}
		elseif($this->session->oturum_data['yetki']!="Üye")
		{
			redirect(base_url().'admin/login');
		}
	}
	
	public function index()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		$data2["yorum"] = $this->Yorum_model->yorumcount($this->session->oturum_data['ad']);
		$data2["yazi"] = $this->Post_model->yazicount($this->session->oturum_data['ad']);
		$data2["mesaj"] = $this->Admin_model->mesajcount($this->session->oturum_data['ad']);

		$query1=$this->db->get("duyuru");
		$data2["duyuru"]=$query1->result();

		$id=$this->session->oturum_data['id'];
		$sorgu = $this -> db -> query ("SELECT * FROM kullanicilar WHERE id=$id");
		$data2["kisi"] = $sorgu -> result();
		$this->load->view('uye/_header',$data);
		$this->load->view('uye/_sidebar');
		$this->load->view('uye/_content',$data2);
		$this->load->view('uye/_footer');
	}
}
