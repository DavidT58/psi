<?php

namespace App\Models;

use CodeIgniter\Model;

class KategorijaModel extends Model
{
    protected $table      = 'kategorija';
    protected $primaryKey = 'naziv';
    protected $returnType     = 'object';
    
}