<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class UserHome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->model('task_model');
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
        $project = $this->project_model->get_project($projectid);
        $tasks = $this->task_model->get_tasks($projectid);
        $data = array(
            'project' => $project,
            'tasks' => $tasks
        );
        $this->load->view('project_view', $data);
    }

    public function task($taskid)
    {
        $task = $this->task_model->get_task($taskid);
        $data = array(
            'task' => $task
        );
        $this->load->view('task_view', $data);
    }
}