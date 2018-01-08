<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class UserHome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('User_Name'))
        { 
            redirect(base_url().'user');
        }
        $this->load->model('project_model');
        $this->load->model('task_model');
        $this->load->model('issue_model');
    }

    public function index()
    {
        $username = $_SESSION['User_Name'];
        $projects = $this->project_model->get_projects($username);
        $data = array(
            'projects' => $projects
        );
        $this->load->view('userhome_view', $data);
    }

    public function project($projectid)
    {
        $username = $_SESSION['User_Name'];
        $project = $this->project_model->get_project($projectid);
        if($_SESSION['User_Type'] != 'Stakeholder')
            $tasks = $this->task_model->get_tasks($projectid, $username);
        else
            $tasks = $this->task_model->get_project_tasks($projectid);
        $project_progress = $this->project_model->get_project_progress($projectid);


        $data = array(
            'project' => $project,
            'tasks' => $tasks,
            'project_progress' => $project_progress,
            'user_type' => $_SESSION['User_Type']
        );
        $this->load->view('project_view', $data);
    }

    public function task($taskid, $projectid)
    {
        $task = $this->task_model->get_task($taskid);
        $users = $this->task_model->get_users_assigned($taskid);
        $activeissues = $this->issue_model->get_activeissues($taskid);
        $closedissues = $this->issue_model->get_closedissues($taskid);
        $data = array(
            'task' => $task,
            'project_id' => $projectid,
            'user_type' => $_SESSION['User_Type'],
            'users_assigned' => $users,
            'activeissues' => $activeissues,
            'closedissues' => $closedissues
        );
        $this->load->view('task_view', $data);
    }

    public function done_task($taskid, $projectid)
    {
        $result = $this->task_model->done_task($taskid);
        $task = $this->task_model->get_task($taskid);
        $data = array(
            'task' => $task,
            'result' => $result,
            'project_id' => $projectid
        );
        $this->load->view('task_view', $data);
    }

    public function issue($issueid)
    {
        $issue = $this->issue_model->get_issue($issueid);
        $projectid = $this->task_model->get_task($issue->Task_ID)->Task_Project;
        $comments = $this->issue_model->get_commentaries($issueid);

        $data = array(
            'issue' => $issue,
            'projectid' => $projectid,
            'comments' => $comments
        );
        $this->load->view('issue_view',$data);

    }

    public function newIssue($taskid)
    {
        $this->issue_model->add_issue($taskid);
        $projectid = $this->task_model->get_task($taskid)->Task_Project;
        redirect(base_url() . "userhome/task/$taskid/$projectid");
    }

    public function newComment($issueid)
    {
        $this->issue_model->add_commentary($issueid);
        redirect(base_url(). "userhome/issue/$issueid");
    }

    public function close_issue($issueid, $taskid)
    {
        $this->issue_model->close_issue($issueid);
        $projectid = $this->task_model->get_task($taskid)->Task_Project;
        redirect(base_url() . "userhome/task/$taskid/$projectid");
    }
}