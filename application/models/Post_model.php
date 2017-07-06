<?php
class Post_model extends CI_Model {

    public $Content;
    public $PostDate;
    public $Title;
    public $CategoryName;
    public $CategoryId;
    public $UserName;
    public $UserId;
    public $IsDraft;
    public $slug;

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
}
?>
