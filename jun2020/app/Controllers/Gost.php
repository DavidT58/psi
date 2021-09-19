<?php

namespace App\Controllers;

use App\Models\GradModel;
use App\Models\KategorijaModel;
use App\Models\DogadjajModel;
use App\Models\LokacijaModel;

class Gost extends BaseController{
    public function index(){
        $gradModel = new GradModel();
        $kategorijaModel = new KategorijaModel();
        $dogadjajModel = new DogadjajModel();
        $lokacijaModel = new LokacijaModel();

        $gradovi = $gradModel->findAll();
        $kategorije = $kategorijaModel->findAll();
        $dogadjaji = $dogadjajModel->findAll();

        $akcija = $this->request->getVar('akcija');
        $grad = $this->request->getVar('grad');
        $kategorija = $this->request->getVar('kategorija');
        $naslov = $this->request->getVar('naslov');
        $otkazan = $this->request->getVar('otkazan');

        if($akcija == 'pretraga'){
            // if($grad == 'Beograd'){
            //     // $dogadjaji = $dogadjajModel->where('')
                
            // }
            if($grad == '' && !isset($kategorija) && $naslov == '' && !isset($otkazan)){
                return view('index', ['gradovi' => $gradovi, 'kategorije' => $kategorije, 'poruka' => 'Morate uneti bar jedan kriterijum']);
            }
            $lokacije = $lokacijaModel->where('grad', $grad)->findAll();
            $dogadjaji = [];
            if($grad != ''){
                foreach($lokacije as $lokacija){
                
                    if($kategorija != ''){
                        $dogadjajiNaLokaciji = $dogadjajModel->where('id_lokacije', $lokacija->id)->where('id_kategorije', $kategorija)->findAll();
                        foreach($dogadjajiNaLokaciji as $dogadjaj){
                            array_push($dogadjaji, $dogadjaj);
                        }
                    }
                    else{
                        $dogadjajiNaLokaciji = $dogadjajModel->where('id_lokacije', $lokacija->id)->findAll();
                        foreach($dogadjajiNaLokaciji as $dogadjaj){
                            array_push($dogadjaji, $dogadjaj);
                        }
                    }
                    
                    
                    // log_message('error', print_r($lokacija, true));
                }
            }
            else if($kategorija != ''){
                $dogadjaji = $dogadjajModel->where('id_kategorije', $kategorija)->findAll();
            }
            else if($naslov != ''){
                $dogadjaji = $dogadjajModel->like('naziv', $naslov)->findAll();
            }
            
        }
        
        
        return view('index', ['gradovi' => $gradovi, 'kategorije' => $kategorije, 'dogadjaji' => $dogadjaji]);
    }


}
