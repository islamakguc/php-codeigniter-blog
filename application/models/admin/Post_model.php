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

 
    public function get_entry($Id)
    {
        $query = $this->db->query("Select * From yazilar where id=$Id");
        return $query->result();
    }
   
}
?>
