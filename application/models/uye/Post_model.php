<?php
class Post_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_entry($Id)
    {
        $query = $this->db->query("Select * From yazilar where id=$Id");
        return $query->result();
    }
    public function get_entries_by_category_id($ad)
    {
        $this->db->from('yazilar');
        $this->db->where('kategori_id', $ad);
        $this->db->where('durum', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_entries_by_category_ad($id)
    {
        $this->db->from('kategori');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
        public function yazicount($ad)
    {
        $this->db->from('yazilar');
        $this->db->where('yazar_ad', $ad);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
