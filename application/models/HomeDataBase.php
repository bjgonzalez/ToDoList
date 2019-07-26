<?php
defined('BASEPATH') or exit('No direct script access allowed');
class HomeDataBase extends CI_Model
{
    private $tableTest = "";
    function __construct()
    {
        parent::__construct();
        $this->load->database();     
        $this->tableTest = "todo_list";
    }
    public function insertToDo($data){
        $this->db->insert($this->tableTest,$data);
        return $this->db->insert_id();
    }   
    public  function getToDo($where){
        $this->db->select("*");
        $this->db->from($this->tableTest);
        $this->db->where($where);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function updateToDo($set, $where){
        $this->db->set($set);
        $this->db->where($where);
        $this->db->update($this->tableTest);
        return $this->db->affected_rows();
    }
}
