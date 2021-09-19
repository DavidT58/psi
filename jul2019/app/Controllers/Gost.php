<?php

namespace App\Controllers;

use App\Models\KorisnikModel;

class Gost extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function ulogujse(){

        $korisnikModel = new KorisnikModel();

        $usernameZahtev = $this->request->getVar('username');
        $passwordZahtev = $this->request->getVar('password');

        $korisnik = $korisnikModel->find($usernameZahtev);

        if($korisnik){
            if($korisnik->password != $passwordZahtev){
                return view('login', ['poruka' => 'Pogresna lozinka']);
            }
            else{
                $this->session->set('student', $korisnik);
                return redirect()->to('Student');
            }
        }
        else{
            return view('login', ['poruka' => 'Ne postoji korisnik']);
        }

        return view('login', ['poruka' => 'Hello']);
    }
}
