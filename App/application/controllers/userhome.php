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
        $username = $_SESSION['User_Name'];
        $project = $this->project_model->get_project($projectid);
        $tasks = $this->task_model->get_tasks($projectid, $username);
        $data = array(
            'project' => $project,
            'tasks' => $tasks
        );
        $this->load->view('project_view', $data);
    }

    public function task($taskid, $projectid)
    {
        $task = $this->task_model->get_task($taskid);
        $data = array(
            'task' => $task,
            'project_id' => $projectid
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
}