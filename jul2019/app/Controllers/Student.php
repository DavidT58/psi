<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\PredmetModel;
use App\Models\PrijavaModel;

class Student extends BaseController
{
    public function index()
    {
        $predmetModel = new PredmetModel();

        $niz_predmeta = $predmetModel->findAll();

        return view('student_pocetna', ['niz_predmeta' => $niz_predmeta]);
    }

    public function prijava_predmet(){
        
    }

}
