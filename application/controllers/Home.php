<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> library ('session');
		$this -> load -> library ('pagination');
		$this -> load -> helper ('url');
		$this -> load -> model ('Post_model');		
		$this -> load -> model ('Database_Model'); 	
		$this -> load -> model ('Admin/Admin_Model'); 
		$this -> load -> model ('Post_Model');
		$this -> load -> database ();
	}
	
	public function index()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();

		$ayar=$this->db->get("ayarlar");
		$ayarlar["ayar"]=$ayar->result();

		$slider["veri"]=$this->Admin_Model->slider();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$data2["yazarcek"]=$this->Post_model->yazarcek();
		

		$sonuc=count($this->db->get("yazilar")->result());
		$config=array(
			"base_url"=>base_url()."Home/index/",
			"per_page"=>3,
			"total_rows"=>$sonuc,
			'full_tag_open' =>' <div class="pagination pagination-centered"> <ul> ',
			'full_tag_close' => ' </ul> </div> ',
			'cur_tag_open' => ' <li> <a href=# style="color:#ffffff; background-color:#258BB5;"> ',
			'cur_tag_close' => ' </a></li> ',
			'num_tag_open' => ' <li> ',  'num_tag_close' => ' </li> ',
			'prev_tag_open'=> ' <li> ', 'prev_tag_close'=> ' <li> ',
			'next_tag_open'=> ' <li> ',  'next_tag_close'=> ' <li> ',  
			'first_tag_open'=> ' <li> ', 'first_tag_close'=> ' <li> ',
			'last_tag_open'=> ' <li> ', 'last_tag_close'=> ' <li> ',  
			);
		$this->pagination->initialize($config);
		$data["linkler"]=$this->pagination->create_links(); 
		$data["veri"]=$this->Post_model->yazicek($config["per_page"],$this->uri->segment(3,0));


		$this->load->view('_header',$ayarlar);
		$this->load->view('_slider',$slider);
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

		$data2["yazarcek"]=$this->Post_model->yazarcek();
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
		$data2["yazarcek"]=$this->Post_model->yazarcek();

		$slider["veri"]=$this->Admin_Model->slider();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();

		$this->load->view('_header',$data1);
		$this->load->view('_slider',$slider);
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
		$data2["yazarcek"]=$this->Post_model->yazarcek();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$slider["veri"]=$this->Admin_Model->slider();

		$query=$this->db->get("ayarlar");
		$data1["ayar"]=$query->result();
		
		$this->load->view('_header',$data1);
		$this->load->view('_slider',$slider);
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
		$data2["yazarcek"]=$this->Post_model->yazarcek();
		$data2["veri"]=$this->Post_model->get_entries_by_kategori();

		$this->load->view('_header',$data);
		$this->load->view('_header2');
		$this->load->view('bize_ulasin',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function mailgonder()
	{
		$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
		if($data["veri"][0]->mail==1)
		{

			$data=array(
				"ad" => $this -> input -> post('ad'),
				"mail" => $this -> input -> post('mail'),
				"icerik" => $this -> input -> post('icerik')		
				);
			$this->Database_Model->insert_data("bizeulasin",$data);

			$isim=$this -> input -> post('ad');
			$mail=$this -> input -> post('mail');

			$query=$this->db->get("ayarlar");
			$data["veri"]=$query->result();
		//E-Mail Ayarlar
			$config=array(
				'protocol'=>'smtp',
				'smtp_host' => $data["veri"][0]->smtpserver,
				'smtp_port' => $data["veri"][0]->smtpport,
				'smtp_user'=>$data["veri"][0]->smtpmail,
				'smtp_pass'=>$data["veri"][0]->sifre,
				'mailtype' =>'html',
				'charset'=>'utf-8',
				'wordwrap'=>TRUE
				);

		//Mail içeriği
			$mesaj="Sayın : ".$isim."<br>Göndermiş olduğunuz mesaj alınmıştır.<br>En kısa sürede sizinle iletişime geçilecektir.<br>Teşekkür ederiz.<br>";
			$mesaj.="=================================================<br/>";
			$mesaj.=$data["veri"][0]->baslik."<br>";
			$mesaj.=$data["veri"][0]->email."<br>";
			$mesaj.="Gönderdiğiniz mesaj aşağıdaki gibidir.<br>=================================================<br/>";

			$mesaj.=$this -> input -> post('icerik');

		//E-Mail gönderme
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from($data["veri"][0]->smtpmail);
			$this->email->to($mail);
			$this->email->subject($data["veri"][0]->baslik." Form mesajı alınmıştır.");
			$this->email->message($mesaj);
			if($this->email->send())
			{

				$this->session->set_flashdata("email_sent","Email başarı ile gönderilmiştir.");

			}
			else
			{
				$this->session->set_flashdata("email_sent","Email gönderme işleminde hata oluşmuştur..");
				show_error($this->email->print_debugger());  //ayrıntılı hata dökümü için gönderiliyor.
			}

			$this->session->set_flashdata("sonuc","Mesajınız bize başarı ile ulaştı, En kısa sürede iletişime geçilecektir. ");
			redirect(base_url()."Home/bize_ulasin");
		}
		else
		{
			$this->session->set_flashdata("sonuc","Mesaj Gönderme Yönetici tarafından engellenmiştir.");
			$this->session->set_flashdata("email_sent","Email gönderme işleminde hata oluşmuştur..");
			redirect(base_url()."Home/bize_ulasin");
		}
	}

	public function sss()
	{
		$sosyal=$this->db->get("sosyal");
		$data5["medya"]=$sosyal->result();

		$data2["veri"]=$this->Post_model->get_entries_by_kategori();
		$data2["yazarcek"]=$this->Post_model->yazarcek();
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
		$data2["yazarcek"]=$this->Post_model->yazarcek();
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
