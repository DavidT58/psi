<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vinarija
 *
 * @author Tasha
 */
class Student extends CI_Controller{
    
    public function __construct() {  
        parent::__construct();
        //provera da li je korisnik mozda vec ulogovan
        if (!$this->session->has_userdata('student')) {
            redirect("Gost");   
        }
    }
    
    public function index(){
        $this->load->view("student_pocetna");
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect("Gost");
    }
    
    
}
