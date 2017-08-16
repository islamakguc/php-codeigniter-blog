<?php
class Mail_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function Mail_getir()
    {
        $this->db->select('*');
        $this->db->from('bizeulasin');
        $this->db->order_by("durum", "asc");
         $this->db->order_by("tarih", "desc");
        $query = $this->db->get();
        return $query->result();
    }
}
?>
