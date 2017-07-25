<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> library ('form_validation');
		$this -> load -> library ('session');
		$this -> load -> Model ("Admin/Admin_Model");
		$this -> load -> Model ("Admin/Database_Model");
		$this -> load -> database ();
	}
	
	public function index()
	{
		if( $this -> session -> userdata('oturum_data') || $this->session->oturum_data['yetki']=="Admin")
		{
			redirect(base_url().'admin');
		}
		
		$this->load->view('admin/login_form');
	}
	public function login_ol()
	{
		$email = $this->input->post('email', TRUE);
		$sifre = $this->input->post('sifre', TRUE);
		$result = $this->Admin_Model->login($email,$sifre);
		if($result)
		{
			if($result[0]->yetki=="Admin")
			{
				$oturum_dizi = array (
					'id' => $result[0]->id,
					'yetki' => $result[0]->yetki,
					'mail' => $result[0]->mail,
					'ad' => $result[0]->ad
					);
				$this->session->set_userdata('oturum_data',$oturum_dizi);
				redirect(base_url().'admin/home');
			}
			else
			{
				$this ->session->set_flashdata("login_hata","Bu Alana Giriş Yetkiniz Bulunmamaktadır!");
				$this->load ->view('admin/login_form'); 
			}
			
		}
		else
		{
			$this ->session->set_flashdata("login_hata","Geçersiz email ya da şifre!");
			$this->load ->view('admin/login_form'); 

		}
		
	}
	public function log_out()
	{
		$this -> session -> unset_userdata('oturum_data');
		$this -> session -> sess_destroy();
		redirect(base_url().'home');
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
			redirect(base_url()."admin");
		}
		else
		{
			$this->session->set_flashdata("sonuc","Eksik Veya Yanlış Bilgi Girişi");
			redirect(base_url()."Uye");
		}
		
		
	}
}
