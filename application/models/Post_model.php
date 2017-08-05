<?php
class Post_model extends CI_Model {


    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function get_entries_by_yazi()
    {
        $this->db->from('yazilar');
        $this->db->where('durum', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_entries_by_kategori()
    {
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result();
    }
    public function yazarcek()
    {
        $this->db->from('kullanicilar');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_entries_by_category_id($id)
    {
        $this->db->from('yazilar');
        $this->db->where('kategori_id', $id);
        $this->db->where('durum', 1);
        $query = $this->db->get();
        return $query->result();
    }
     public function get_entries_by_yorum($id)
    {
        $this->db->from('yorumlar');
        $this->db->where('yazi_id', $id);
        $this->db->where('durum', 1);
        $query = $this->db->get();
        return $query->result();
    }
     public function kategorisayi($id)
    {
        $this->db->from('yazilar');
        $this->db->where('kategori_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
     public function yazarsayi($id)
    {
        $this->db->from('yazilar');
        $this->db->where('yazar_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function yazicek($per,$segment){
        $result=$this->db->select('*')
        ->from('yazilar')
        ->where('durum',1)
        ->limit($per,$segment)
        ->order_by('tarih','DESC')
        ->get()
        ->result();

        return $result;

    }
    public function kategoricek($id)
    {
        $this->db->from('kategori');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
