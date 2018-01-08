<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('users_view');
    }

    public function register()
    {
        $this->load->view('register_view');
    }

    public function verify_register()
    {
        if ($this->input->post('submit_reg')) {
            //validamos usando la libreria form_validation
            //asignamos un rol (set_rules, uso(name,title,required[|...])
            //trim = limpia los espacios en blanco
            //callback_ = para llamar un método
            $this->form_validation->set_rules('username', 'Username', 'required|callback_verify_user');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('fullName', 'Full Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('password2', 'Password confirmation', 'required|trim|matches[password]');
            $this->form_validation->set_rules('groupID', 'Group ID', 'required|trim|callback_verify_group');

            $this->form_validation->set_message('required', 'Field %s is required.');
            $this->form_validation->set_message('valid_email', 'Field %s is invalid.');
            $this->form_validation->set_message('verify_user', '%s name already exists.');
            $this->form_validation->set_message('verify_group', '%s doesn\'t exists');
            $this->form_validation->set_message('matches', 'Field %s is not equal to %s.');

            if ($this->form_validation->run() == false) {
                $this->register();
            } else {
                $this->user_model->add_user();
                $data = array('message' => 'User registered correctly');
                $this->load->view('users_view', $data);
            }
        }
    }

    public function verify_user($user)
    {
        $var = $this->user_model->verify_user($user);
        if ($var == true) {
            return false;
        } else {
            return true;
        }
    }

    public function verify_group($idGroup)
    {
        $var = $this->user_model->verify_group($idGroup);
        return $var;
    }

    public function verify_session()
    {
        if ($this->input->post('submit')) {
            $var = $this->user_model->verify_session();

            if ($var == true) {
                $vars = array(
                    'User_Name' => $this->input->post('username')
                );
                $this->session->set_userdata($vars);
                redirect(base_url() . 'userhome/');
            } else {
                $message = array('message' => 'Username/Password is not correct');
                $this->load->view('users_view', $message);
            }
        } else {
            redirect(base_url() . 'user/');
        }

    }
    
    public function profile()
    {
        $user = $this->user_model->get_user($_SESSION['User_Name']);
        $data = array(
            'user' => $user 
        );
        $this->load->view('profile_view', $data);
    }

    public function update_user()
    {
        if ($this->input->post('submit-profile'))
        {
            $email = $this->input->post('email');
            $fullName = $this->input->post('fullName');
            $password = $this->input->post('password');

            if($password == '')
                $result = $this->user_model->update_user($email, $fullName);
            else
                $result = $this->user_model->update_user_all($email, $fullName, $password);
        }

        $user = $this->user_model->get_user($_SESSION['User_Name']);
        $data = array(
            'user' => $user,
            'result' => $result 
        );
        $this->load->view('profile_view', $data);
    }

    public function log_out(){
        $this->session->unset_userdata('User_Name');
        $this->session->sess_destroy();
        redirect(base_url() . 'user','refresh');
    }
}
