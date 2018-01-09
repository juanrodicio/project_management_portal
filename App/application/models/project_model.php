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
    
    public function get_managed_projects($project_manager)
    {
        $ssql = "select * from project p where p.project_manager ='". $project_manager ."'";
        $query = $this->db->query($ssql);
        return $query->result();
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
    
    public function add_project($name, $desc, $start, $finish, $budget, $projectmang)
    {
        $sql = "insert into project (Project_ID, Project_Name, Project_Description, Project_StartDate, Project_FinishDate, Project_Budget, Project_Manager) values (null, '".$name."', '".$desc."', '".$start."', '".$finish."', ".$budget.", '".$projectmang."')";
        
        $this->db->query($sql);
    }
    
    public function get_project_members($projectid)
    {
        $ssql = "select * from project_members pmm where pmm.project_id ='". $projectid ."'";
        $query = $this->db->query($ssql);
        return $query->result();
    }
    
    public function add_pigs($projectid, $pigs)
    {
        foreach($pigs["project_pigs"] as $pig)
        {
            $sql = "insert into project_members (project_id, user_name) values (".$projectid.", '".$pig."')";
            $query = $this->db->query($sql);
        }
    }
}



