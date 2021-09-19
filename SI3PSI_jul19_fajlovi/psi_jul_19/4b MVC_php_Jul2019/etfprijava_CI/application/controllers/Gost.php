<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gost
 *
 * @author Tasha
 */
class Gost extends CI_Controller{
    public function __construct() {  
        parent::__construct();
        //provera da li je korisnik mozda vec ulogovan
        if ($this->session->has_userdata('nastavnik')) {
            redirect("Nastavnik");   
        }
        if ($this->session->has_userdata('student')) {
            redirect("Student");   
        }
    }
    
    public function index(){  
        $this->load->view("login");
    }
          
    //metoda koja ucitava formu za  logovanje
    public function login($username=NULL, $poruka=NULL,$porukausername=NULL,$porukapassword=NULL)
    {
        $this->load->view("login",['username'=>$username,'poruka'=>$poruka,
                'porukausername'=>$porukausername,'porukapassword'=>$porukapassword]);
    }
    
    //metoda koja se poziva klikom na submit forme za logovanje
    public function ulogujse(){
        $this->load->model("ModelKorisnik");
        
        if ($this->input->post('username') == "") {
            $porukausername = "Polje Username je ostalo prazno.";
        }else
            $porukausername=NULL;
        if ($this->input->post('password') == "") {
            $porukapassword = "Polje Password je ostalo prazno.";
        } else {
            $porukapassword=NULL;
        }
        if($this->input->post('username')!="" && $this->input->post('password')!=""){
            $korisnik=$this->ModelKorisnik->dohvatiKorisnika($this->input->post('username'));
            if ($korisnik==NULL) {
                $this->login($this->input->post('username'),"Neispravnan username!");
            } else if (!$this->ModelKorisnik->ispravanPassword($korisnik,$this->input->post('password'))) {
                $this->login($this->input->post('username'),"Neispravan password!");
            } else if($this->ModelKorisnik->jeNastavnik($korisnik)){
                $this->session->set_userdata("nastavnik",$korisnik);
                redirect("Nastavnik");
            }
            else {
                $this->session->set_userdata("student",$korisnik);
                redirect("Student");
            }
        } else {
            $this->login($this->input->post('username'), NULL,$porukausername,$porukapassword);
        }
    }
    

}
