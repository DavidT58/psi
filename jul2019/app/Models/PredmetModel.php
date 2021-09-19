<?php

namespace App\Models;

use CodeIgniter\Model;

class PredmetModel extends Model
{
    protected $table      = 'predmet';
    protected $primaryKey = 'sifraPredmet';

    protected $returnType     = 'object';
    
}