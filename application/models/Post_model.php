<?php
class Post_model extends CI_Model {


    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
     public function get_entries_by_yorum($id)
    {
        $this->db->from('yorumlar');
        $this->db->where('yazi_id', $id);
        $this->db->where('durum', 1);
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
    public function yazi()
    {
        $this->db->select('*');
        $this->db->from('yazilar');
        $this->db->order_by("tarih","desc");
        $this->db->where('durum',1);
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
