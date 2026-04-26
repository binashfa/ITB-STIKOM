<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\VisiMisiModel;
use App\Models\MisiModel;

class Profil extends BaseController
{

    public function sejarah()
    {
        $model = new ProfilModel();

        $data['profil'] = $model->first();

        return view('sejarah', $data);
    }

    public function sambutan()
    {
        $model = new \App\Models\ProfilModel();
        $data['profil'] = $model->first();

        return view('profil', $data);
    }
}
