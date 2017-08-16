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
		$this -> load -> model ('admin/Database_Model'); 	
		$this -> load -> model ('admin/Admin_Model'); 
		$this -> load -> database ();
	}
	
	public function index()
	{
		$data5["medya"]=$this->Database_Model->get_data("sosyal");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
		$slider["veri"]=$this->Admin_Model->slider();
		$data2["veri"]=$this->Database_Model->get_data("kategori");
		$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
		$data2["yazicek"]=$this->Post_model->yazi();
		
		$sonuc=count($this->db->get("yazilar")->result());
		$config=array(
			"base_url"=>base_url()."Home/index/",
			"per_page"=>3,
			"total_rows"=>$sonuc,
			'full_tag_open' =>' <div class="pagination pagination-centered"> <ul> ',
			'full_tag_close' => ' </ul> </div> ',
			'cur_tag_open' => ' <li> <a href=# style="color:#ffffff; background-color:#93B876;"> ',
			'cur_tag_close' => ' </a></li> ',
			'num_tag_open' => ' <li> ',  'num_tag_close' => ' </li> ',
			'prev_tag_open'=> ' <li> ', 'prev_tag_close'=> ' <li> ',
			'next_tag_open'=> ' <li> ',  'next_tag_close'=> ' <li> ',  
			'first_tag_open'=> ' <li> ', 'first_tag_close'=> ' <li> ',
			'next_link'=>'Eski &gt;&gt;',
			'prev_link'=>'&lt;&lt; Yeni',
			'last_link'=>false,
			'first_link'=>false,
			'last_tag_open'=> ' <li> ', 'last_tag_close'=> ' <li> ',  
			);
		$this->pagination->initialize($config);
		$data["linkler"]=$this->pagination->create_links(); 
		$data["veri"]=$this->Post_model->yazicek($config["per_page"],$this->uri->segment(3,0));


		$this->load->view('_header',$data1);
		$this->load->view('_slider',$slider);
		$this->load->view('_header2');
		$this->load->view('_content',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function yazi_goster($id)
	{
		$id=(string)$id;
		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.link='$id'";
		if($this->db->query($sql)->result())
		{
			$data["veri"] =$this->db->query($sql)->result();

			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data["yorum"] =$this->Post_model->get_entries_by_yorum($this->db->query($sql)->result()[0]->id);
			$data2["yazicek"]=$this->Post_model->yazi();
			$data["data"]=$this->Database_Model->get_data_new("yazi_resim","yazi_id",$this->db->query($sql)->result()[0]->id);
			
			$this->load->view('_header',$data);
			$this->load->view('_header2');
			$this->load->view('yazi_goster',$data);		
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
		else
		{
			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data["soru"]=$this->Database_Model->get_data("sorular");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_header2');
			$this->load->view('errors/html/error_404');		
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
		
	}

	public function kategori($id)
	{
		$id=(string)$id;
		
		$idi=$this->db->query("SELECT * FROM kategori where kategoriadi LIKE '%".$id."%'  ")->result()[0]->id;

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.kategori_id=$idi";

		if($this->db->query($sql)->result())
		{
			$data["veri"] =$this->db->query($sql)->result();

			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$slider["veri"]=$this->Admin_Model->slider();
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Post_model->get_data_id("kategori",$idi);
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_slider',$slider);
			$this->load->view('_header2');
			$this->load->view('kategori_goster',$data);
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
		else
		{
			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data["soru"]=$this->Database_Model->get_data("sorular");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_header2');
			$this->load->view('errors/html/error_404');		
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
	}
	public function yazar($id)
	{
		$id=(string)$id;

		$idi= $this->db->query("SELECT * FROM kullanicilar where link LIKE '%".$id."%'  ")->result()[0]->id;

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.durum=1 and yazilar.yazar_id='$idi'";

		if($this->db->query($sql)->result())
		{
			$data["veri"] =$this->db->query($sql)->result();

			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$slider["veri"]=$this->Admin_Model->slider();
			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Post_model->get_data_id("kullanicilar",$idi);
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_slider',$slider);
			$this->load->view('_header2');
			$this->load->view('kategori_goster',$data);
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
		else
		{
			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data["soru"]=$this->Database_Model->get_data("sorular");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_header2');
			$this->load->view('errors/html/error_404');		
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
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
		$data5["medya"]=$this->Database_Model->get_data("sosyal");
		$data["ayar"]=$this->Database_Model->get_data("ayarlar");
		$data["veri"]=$this->Database_Model->get_data("ayarlar");
		$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
		$data2["veri"]=$this->Database_Model->get_data("kategori");
		$data2["yazicek"]=$this->Post_model->yazi();

		$this->load->view('_header',$data);
		$this->load->view('_header2');
		$this->load->view('bize_ulasin',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function mailgonder()
	{
		$data["veri"]=$this->Database_Model->get_data("ayarlar");
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
			$data["veri"]=$this->Database_Model->get_data("ayarlar");
		//E-Mail Ayarlar
			$config=array(
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
		$data5["medya"]=$this->Database_Model->get_data("sosyal");
		$data2["veri"]=$this->Database_Model->get_data("kategori");
		$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
		$data["soru"]=$this->Database_Model->get_data("sorular");
		$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
		$data1["veri"]=$this->Database_Model->get_data("ayarlar");
		$data2["yazicek"]=$this->Post_model->yazi();

		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('sss',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}

	public function benkimim()
	{
		$data5["medya"]=$this->Database_Model->get_data("sosyal");
		$data2["veri"]=$this->Database_Model->get_data("kategori");
		$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
		$data["data"]=$this->Database_Model->get_data_id("sosyal",2);
		$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
		$data1["veri"]=$this->Database_Model->get_data("benkimim");
		$data2["yazicek"]=$this->Post_model->yazi();

		$this->load->view('_header',$data1);
		$this->load->view('_header2');
		$this->load->view('benkimim',$data);		
		$this->load->view('_sidebar',$data2);
		$this->load->view('_footer',$data5);
	}
	public function etiket($id)
	{
		$id=(string)$id;

		$sql="SELECT kategori.kategoriadi as katadi,yazilar.* FROM yazilar
		LEFT JOIN kategori
		ON yazilar.kategori_id=kategori.id
		WHERE yazilar.keywords
		LIKE '%".$id."%' ";
		if($this->db->query($sql)->result())
		{
			$data["veri"] =$this->db->query($sql)->result();

			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$slider["veri"]=$this->Admin_Model->slider();
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_slider',$slider);
			$this->load->view('_header2');
			$this->load->view('kategori_goster',$data);
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}
		else
		{
			$data5["medya"]=$this->Database_Model->get_data("sosyal");
			$data2["veri"]=$this->Database_Model->get_data("kategori");
			$data2["yazarcek"]=$this->Database_Model->get_data("kullanicilar");
			$data["soru"]=$this->Database_Model->get_data("sorular");
			$data1["ayar"]=$this->Database_Model->get_data("ayarlar");
			$data1["veri"]=$this->Database_Model->get_data("ayarlar");
			$data2["yazicek"]=$this->Post_model->yazi();

			$this->load->view('_header',$data1);
			$this->load->view('_header2');
			$this->load->view('errors/html/error_404');		
			$this->load->view('_sidebar',$data2);
			$this->load->view('_footer',$data5);
		}

	}
}
