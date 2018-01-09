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

    public function get_user($username)
    {
        $ssql = "select * from user u,project_group pg where u.User_Name='" . $username ."'
                    and pg.Group_ID = u.User_Group";
        $query = $this->db->query($ssql);
        
        return $query->row();
    }

    public function update_user_all($email, $fullName, $password)
    {
        $ssql = "update user set User_Email='".$email."', User_FullName='".$fullName."', User_Password='".$password."'
                    where User_Name='".$_SESSION['User_Name']."'";
        $this->db->query($ssql);
        return $this->db->affected_rows() > 0;
    }

    public function update_user($email, $fullName)
    {
        $ssql = "update user set User_Email='".$email."', User_FullName='".$fullName."'
                    where User_Name='".$_SESSION['User_Name']."'";
        $this->db->query($ssql);
        return $this->db->affected_rows() > 0;
    }
    
    public function get_pigs()
    {
        $ssql = "select * from user where user_type = 'Pig'";
        $query = $this->db->query($ssql);
        return $query->result();
    }
}
