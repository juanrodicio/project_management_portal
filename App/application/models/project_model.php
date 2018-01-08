<?php

class Project_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_projects($username)
    {
        $ssql = "select * from project_members pm, project p where User_Name ='". $username ."' and pm.Project_ID = p.Project_ID";
        $query = $this->db->query($ssql);
        return $query->result();
    }

    public function get_project($projectid)
    {
        $ssql = "select * from project where Project_ID='". $projectid ."'";
        $query = $this->db->query($ssql);
        return $query->row();
    }

    public function get_project_progress($projectid)
    {
        $ssql = "select count(Task_ID) 'totalTasks' from project_task where Task_Project='".$projectid."'";
        $ssql2 = "select count(Task_ID) 'doneTasks' from project_task where Task_Project='".$projectid."' and Task_Status='Done'";
        $query1 = $this->db->query($ssql);
        $query2 = $this->db->query($ssql2);

        if($query1->row()->totalTasks > 0)
            return ($query2->row()->doneTasks / $query1->row()->totalTasks)*100;
        else
            return 1;
    }
}