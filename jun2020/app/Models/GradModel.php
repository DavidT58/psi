<?php

namespace App\Models;

use CodeIgniter\Model;

class GradModel extends Model
{
    protected $table      = 'grad';
    protected $primaryKey = 'ime_grada';
    protected $returnType     = 'object';
    
}