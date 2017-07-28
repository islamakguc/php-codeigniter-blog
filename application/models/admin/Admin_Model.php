<?php
class Admin_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function login($email,$sifre)
	{
		$this->db->select('*');
		$this->db->from('kullanicilar');
		$this->db->where('mail',$email);
		$this->db->where('sifre',$sifre);
		$this->db->where('durum',1);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}	
	public function mesajaliciadi()
	{
		$this->db->select('*');
		$this->db->from('kullanicilar');
		$query = $this->db->get();
		return $query->result();
	}
		public function mesajalici($ad)
	{
		$this->db->select('*');
		$this->db->from('mesajlar');
		$this->db->order_by("tarih", "desc");
		$this->db->where('alici_adi',$ad);
		$query = $this->db->get();
		return $query->result();
	}
	   public function mesajcount($ad)
    {
        $this->db->from('mesajlar');
        $this->db->where('alici_adi', $ad);
        $query = $this->db->get();
        return $query->result();
    }
    public function kontrol($id,$sifre)
    {
    	$this->db->select('*');
		$this->db->from('kullanicilar');
		$this->db->where('id',$id);
		$this->db->where('sifre',$sifre);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
    }
    public function slider()
    {
    	$this->db->select('*');
		$this->db->from('yazilar');
		$this->db->order_by("tarih","desc");
		$this->db->where('durum',1);
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
}