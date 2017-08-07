<?php
class Post_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function get_entries_by_category_id($ad)
    {
        $this->db->from('yazilar');
        $this->db->where('kategori_id', $ad);
        $this->db->where('durum', 1);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
