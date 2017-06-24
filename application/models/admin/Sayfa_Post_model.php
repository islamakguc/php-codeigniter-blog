<?php
class Sayfa_Post_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_entry($Id)
    {
        $query = $this->db->query("Select * From sayfalar where id=$Id");
        return $query->result();
    }
}
?>
