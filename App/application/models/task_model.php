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

    public function get_tasks($projectid, $username)
    {
        $ssql = "select * from project_task pt, user_tasks ut where pt.Task_ID = ut.Task_ID 
                    and pt.Task_Project='".$projectid."'
                        and ut.User_Name ='".$username."'";
        $query = $this->db->query($ssql);
        return $query->result();
    }

    public function done_task($taskid)
    {
        $ssql = "update project_task set Task_Status='Done' where Task_ID='".$taskid."'";
        $this->db->query($ssql);
        return $this->db->affected_rows() > 0;
    }

    public function get_users_assigned($taskid)
    {
        $ssql = "select * from user_tasks where Task_ID='" . $taskid . "'";
        $query = $this->db->query($ssql);
        return $query->result();
    }
}