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
        $this->load->model('issue_model');
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
        $project = $this->project_model->get_project($projectid);
        $tasks = $this->task_model->get_project_tasks($projectid);
        $project_progress = $this->project_model->get_project_progress($projectid);

        $data = array(
            'project' => $project,
            'tasks' => $tasks,
            'user_type' => $_SESSION['User_Type'],
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
    
    public function new_project_task($projectid)
    {
        $project_members = $this->project_model->get_project_members($projectid);
        
        $data = array(
            'project_id' => $projectid,
            'project_members' => $project_members
        );
        
        $this->load->view('new_task_view', $data);
    }
    
    public function add_task($projectid)
    {
        if ($this->input->post('submit-task'))
        {
            $task_name = $this->input->post('taskname',true);
            $task_description = $this->input->post('taskdesc',true);
            $task_start = $this->input->post('taskstart');
            $task_finish = $this->input->post('taskfinish');
            $task_members['project_members'] = $this->input->post('project_members');

            $this->task_model->add_task($task_name, $task_description, $task_start, $task_finish, $task_members, $projectid);
        }
        
        /*$projects = $this->project_model->get_managed_projects($project_manager);
        $data = array(
            'projects' => $projects
        );
        $this->load->view('pmhome_view', $data);*/
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
        $users = $this->task_model->get_users_assigned($taskid);
        $activeissues = $this->issue_model->get_activeissues($taskid);
        $closedissues = $this->issue_model->get_closedissues($taskid);
        
        $data = array(
            'task' => $task,
            'project_id' => $projectid,
            'user_type' => $_SESSION['User_Type'],
            'users_assigned' => $users,
            'activeissues' => $activeissues,
            'closedissues' => $closedissues,
            'result' => $result
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