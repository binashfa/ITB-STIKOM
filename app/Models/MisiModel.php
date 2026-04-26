<?php

namespace App\Models;
use CodeIgniter\Model;

class MisiModel extends Model
{
    protected $table = 'misi';
    protected $allowedFields = ['isi'];
}