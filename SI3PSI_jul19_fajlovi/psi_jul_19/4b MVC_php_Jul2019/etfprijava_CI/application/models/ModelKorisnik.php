<?php
/**
 * Description of ModelKorisnik
 *
 * @author Korisnik
 */
class ModelKorisnik extends CI_Model{

    
    
    public function dohvatiKorisnika($username){
        $this->db->where('username',$username);
        $query=$this->db->get('korisnik');    
        $korisnik = $query->row();
       
        if ($korisnik!=NULL) {
            return $korisnik;
        } else {
            return FALSE;
        }
    }
    
    public function ispravanPassword($korisnik, $password){
        if ($korisnik->password == $password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }   
    
    public function jeNastavnik($korisnik){
        $this->db->where('idNastavnik',$korisnik->username);
        $query=$this->db->get('nastavnik');    
        $nastavnik = $query->row();
        if ($nastavnik!=NULL) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}