<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> helper ('url');
		$this -> load -> library ('form_validation');
		$this -> load -> library ('session');
		$this -> load -> Model ("admin/Database_Model");
		$this -> load -> Model ("Uye_Model");
		$this -> load -> database ();
	}
	
	public function index()
	{
		if($this->session->oturum_data['yetki']=="Admin")
		{
			redirect(base_url().'admin');
		}
		elseif($this->session->oturum_data['yetki']=="Üye")
		{
			redirect(base_url().'uye');
		}
		
		$this->load->view('login_form');
	}

	public function kayit()
	{
		$this->load->view('kayit_form');
	}
	
	public function kayit_ol()
	{
		$data=array(
			"ad" => $this -> input -> post('ad'),
			"sifre" => $this -> input -> post('sifre'),
			"mail" =>  $this -> input -> post('mail'),
			"yetki" => "Üye",
			"durum" => "1",
			
			);
		$this->Database_Model->insert_data("kullanicilar",$data);
		$this->session->set_flashdata("login_hata","Kayıt Ekleme İşlemi Başarı İle Gerçekleştirildi");
		redirect(base_url()."Login");
	}

	public function login_ol()
	{
		$email = $this->input->post('email', TRUE);
		$sifre = $this->input->post('sifre', TRUE);
		$result = $this->Uye_Model->login($email,$sifre);
		if($result)
		{
			if($result[0]->yetki =="Üye" )
			{
				$oturum_dizi = array (
					'id' => $result[0]->id,
					'yetki' => $result[0]->yetki,
					'mail' => $result[0]->mail,
					'ad' => $result[0]->ad
					);
				$this->session->set_userdata('oturum_data',$oturum_dizi);
				redirect(base_url().'Home');
			}
			else
			{
				$this ->session->set_flashdata("login_uyehata","Yetkisiz Giriş!");
				$this->load ->view('login_form'); 
			}
			
		}
		else
		{
			$this ->session->set_flashdata("login_uyehata","Geçersiz email ya da şifre!");
			$this->load ->view('login_form'); 

		}
		
	}
	public function log_out()
	{
		$this -> session -> unset_userdata('oturum_data');
		$this -> session -> sess_destroy();
		redirect(base_url().'Home');
	}
}
