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
        // modelo usuarios
        // modelo grupos
    }

    public function index()
    {
        $username = $_SESSION['User_Name'];
        $projects = $this->project_model->get_projects($username);
        $data = array(
            'projects' => $projects
        );
        $this->load->view('pmhome_view', $data);
    }
}