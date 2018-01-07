<?php

class Task_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_task($taskid)
    {
        $ssql = "select * from project_task where Task_ID='".$taskid."'";
        $query = $this->db->query($ssql);
        return $query->row();
    }

    public function get_tasks($projectid)
    {
        $ssql = "select * from project_task where Task_Project='".$projectid."'";
        $query = $this->db->query($ssql);
        return $query->result();
    }
}