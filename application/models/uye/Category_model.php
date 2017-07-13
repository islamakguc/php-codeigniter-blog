<?php
class Category_model extends CI_Model {

    public $CategoryName;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_entries()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }
}
?>
