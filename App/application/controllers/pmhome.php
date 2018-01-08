<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class PMHome extends CI_Controller
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
        $this->load->model('user_model');
        // modelo grupos
    }

    public function index()
    {
        $username = $_SESSION['User_Name'];
        $projects = $this->project_model->get_managed_projects($username);
        $data = array(
            'projects' => $projects,
            'user_type' => 'Project Manager'
        );
        $this->load->view('pmhome_view', $data);
    }
    
    public function project($projectid)
    {
        $username = $_SESSION['User_Name'];
        //$usertype = $_SESSION['User_Type'];
        
        $project = $this->project_model->get_project($projectid);
        $tasks = $this->task_model->get_tasks($projectid, $username);
        $project_progress = $this->project_model->get_project_progress($projectid);
        $data = array(
            'project' => $project,
            'tasks' => $tasks,
            'project_progress' => $project_progress,
            'user_type' => 'Project Manager'
        );
        $this->load->view('project_view', $data);
    }
    
    public function new_project()
    {
        $this->load->view('new_project_view');
    }
    
    public function add_project()
    {
        $project_manager = $_SESSION['User_Name'];
        
        if ($this->input->post('submit-project'))
        {
            $project_name = $this->input->post('projectname');
            $project_description = $this->input->post('projectdesc');
            $project_start = $this->input->post('projectstart');
            $project_finish = $this->input->post('projectfinish');
            $project_budget = $this->input->post('projectbudget');
        }
        
        $this->project_model->add_project($project_name, $project_description, $project_start, $project_finish, $project_budget, $project_manager);
        
        $projects = $this->project_model->get_managed_projects($project_manager);
        $data = array(
            'projects' => $projects
        );
        $this->load->view('pmhome_view', $data);
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