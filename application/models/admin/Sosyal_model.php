<?php
class Sosyal_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function guncelle($id)
    {
        $this->db->from('sosyal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
?>
