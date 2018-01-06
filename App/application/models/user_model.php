<?php
class User_model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
    }
    
    public function verify_user($user)
    {
        $ssql = "select * from user where User_Name='" . $user . "'";
        $query = $this->db->query($ssql);
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function verify_group($idGroup)
    {
        $ssql = "select * from project_group where Group_ID='" . $idGroup . "'";
        $query = $this->db->query($ssql);

        if ($query->num_rows() == 0)
            return false;
        else
            return true;
    }
    
    public function add_user()
    {
        $this->db->insert('user', array(
            //el true es para que limpie este campo de inyecciones xss
            'User_Name' => $this->input->post('username', true),
            'User_Email' => $this->input->post('email', true),
            'User_FullName' => $this->input->post('fullName', true),
            'User_Password' => $this->input->post('password', true),
            'User_Group' => $this->input->post('groupID', true),
            'User_Type' => $this->input->post('userTypes',true)
        ));
    }

    public function verify_session()
    {
        $query = $this->db->get_where('user', array(
            'User_Name' => $this->input->post('username', TRUE),
            'User_Password' => $this->input->post('password', TRUE)
        ));

        if($query->num_rows() == 1)
            return true;
        else
            return false;
    }
}
