<?php

namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    
}