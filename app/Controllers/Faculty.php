<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProdiModel;

class Faculty extends BaseController
{
    public function fakultas()
    {
        $model = new FakultasModel();
        $data['fakultas'] = $model->findAll();

        return view('admin/fakultas', $data);
    }

    public function storeFakultas()
    {
        $model = new FakultasModel();

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

         return redirect()->to('/admin/news');
    }

    public function deleteFakultas($id)
    {
        (new FakultasModel())->delete($id);
        return redirect()->back();
    }

    public function create()
    {
        return view('admin/faculty/fakultas');
    }
}
