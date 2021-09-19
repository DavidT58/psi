<?php

namespace App\Models;

use CodeIgniter\Model;

class PrijavaModel extends Model
{
    protected $table      = 'prijava';
    protected $primaryKey = 'idPrijava';

    protected $returnType     = 'object';
    
}