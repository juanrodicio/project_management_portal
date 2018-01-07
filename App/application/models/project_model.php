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
}