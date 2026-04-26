<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $allowedFields = [
        'judul', 
        'deskripsi', 
        'gambar1', 
        'gambar2', 
        'nama_rektor',
        'jabatan',
        'sambutan',
        'foto_rektor',
        'fasilitas'
    ];
}