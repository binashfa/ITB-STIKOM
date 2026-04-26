<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
  protected $table = 'program_studi';
protected $allowedFields = [
    'fakultas_id',
    'nama',
    'slug',
    'visi',
    'misi',
    'profil_lulusan',
    'capaian',
    'deskripsi',
    'image'
];
}
