<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> helper ('url');
		$this -> load -> database ();
		$this -> load -> model('Admin/Yorum_model');
		$this -> load -> model('Admin/Post_model');
		$this -> load -> model('Admin/Admin_model');
		if(! $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']!="Admin")
		{
			$this ->session->set_flashdata("login_hata","Login Olmanız Gerekmektedir.");
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

		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_content',$data2);
		$this->load->view('admin/_footer');
	}
}
