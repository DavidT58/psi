<?php

namespace App\Models;

use CodeIgniter\Model;

class LokacijaModel extends Model
{
    protected $table      = 'lokacija';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    
}