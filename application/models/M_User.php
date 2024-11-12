<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function getEmailUser($email) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        return $this->db->get();
    }

    public function getPassUser($password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('password', $password);
        return $this->db->get();
    }
}
?>