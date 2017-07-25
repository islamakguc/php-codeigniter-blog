<?php
class Yorum_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

         public function get_entries_yorumm()
    {
        $this->db->from('yorumlar');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_entries_onay()
    {
        $this->db->from('yorumlar');
        $this->db->where('durum', 1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_entries_onaybekleyen()
    {
        $this->db->from('yorumlar');
        $this->db->where('durum', 0);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
      public function get_entries_yorum_edit($ad)
    {
        $this->db->from('yorumlar');
        $this->db->where('id', $ad);
        $query = $this->db->get();
        return $query->result();
    }
     public function get_entries_yorum($ad)
    {
        $this->db->from('yorumlar');
        $this->db->where('yazar_ad', $ad);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
      public function yorumcount($ad)
    {
        $this->db->from('yorumlar');
        $this->db->where('yazar_ad', $ad);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>
