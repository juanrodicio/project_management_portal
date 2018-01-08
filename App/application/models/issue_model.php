<?php

class Issue_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_activeissues($taskid)
    {
        $ssql = "select * from project_task_issues where Task_ID='" . $taskid . "'
                    and Issue_Status = 'active'";
        $query = $this->db->query($ssql);
        return $query->result();
    }

    public function get_closedissues($taskid)
    {
        $ssql = "select * from project_task_issues where Task_ID='" . $taskid . "'
                    and Issue_Status = 'closed'";
        $query = $this->db->query($ssql);
        return $query->result();
    }

    public function get_issue($issueid)
    {
        $ssql = "select * from project_task_issues where Issue_ID='" . $issueid . "'";
        $query = $this->db->query($ssql);
        return $query->row();
    }

    public function add_issue($taskid)
    {
        $this->db->insert('project_task_issues', array(
            'Task_ID' => $taskid,
            'Issue_ID' => null,
            'Issue_Title' => $this->input->post('title'),
            'Issue_Description' => $this->input->post('commentary'),
            'Issue_Type' => $this->input->post('issueType'),
            'Issue_Status' => 'active',
            'Issue_Author' => $_SESSION['User_Name']
        ));
    }

    public function close_issue($issueid)
    {
        $ssql = "update project_task_issues set Issue_Status = 'closed' where Issue_ID='" . $issueid . "'";
        $query = $this->db->query($ssql);
    }

    public function get_commentaries($issueid)
    {
        $ssql = "select * from issue_commentaries where Issue_ID='". $issueid ."'";
        $query = $this->db->query($ssql);
        return $query->result();
    }

    public function add_commentary($issueid)
    {
        $this->db->insert('issue_commentaries', array(
            
            'Issue_ID' => $issueid,
            'Commentary_ID' => null,
            'Commentary_Title' => $this->input->post('title'),
            'Commentary_Comment' => $this->input->post('commentary'),
            'Commentary_Author' => $_SESSION['User_Name']
        ));
    }
}