<?php
namespace App\Models;

use CodeIgniter\Model;

class KerjasamaModel extends Model
{
    protected $table = 'kerjasama';
    protected $allowedFields = ['kategori', 'nama'];
}
