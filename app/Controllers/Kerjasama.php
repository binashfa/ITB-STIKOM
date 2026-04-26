<?php

namespace App\Controllers;

use App\Models\KerjasamaModel;
use App\Models\VisiMisiModel;
use App\Models\MisiModel;
use App\Models\ProfilModel;

class Kerjasama extends BaseController
{
    public function index()
    {

        $kerjasamaModel = new KerjasamaModel();
        $dataRaw = $kerjasamaModel->findAll();
        $visiModel = new VisiMisiModel();
        $misiModel = new MisiModel();
        $profilModel = new ProfilModel();

        $data['visi'] = $visiModel->first();
        $data['misi'] = $misiModel->findAll();

        $data['profil'] = $profilModel->first();

        $kerjasama = [];

        foreach ($dataRaw as $item) {
            $kerjasama[$item['kategori']][] = $item['nama'];
        }

        $data['kerjasama'] = $kerjasama;

        return view('profil', $data);
    }

    public function createKerjasama()
    {
        return view('admin/kerjasama/create');
    }

    public function storeKerjasama()
    {
        $model = new \App\Models\KerjasamaModel();

        $model->save([
            'kategori' => $this->request->getPost('kategori'),
            'nama' => $this->request->getPost('nama')
        ]);

        return redirect()->to('/admin/news?tab=kerjasama');
    }

    public function deleteKerjasama($id)
    {
        $model = new \App\Models\KerjasamaModel();

        $model->delete($id);

        return redirect()->to('/admin/news?tab=kerjasama');
    }

    public function updateKerjasama($id)
    {
        $model = new \App\Models\KerjasamaModel();

        $data = $this->request->getJSON(true);

        $model->update($id, [
            'nama' => $data['nama']
        ]);

        return $this->response->setJSON(['status' => 'ok']);
    }
}
