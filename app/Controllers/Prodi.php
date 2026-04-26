<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProdiModel;

class Prodi extends BaseController
{
    public function prodi()
    {
        $prodiModel = new ProdiModel();
        $fakultasModel = new FakultasModel();

        $data['prodi'] = $prodiModel->findAll();
        $data['fakultas'] = $fakultasModel->findAll();

        return view('admin/prodi', $data);
    }

    public function storeProdi()
    {
        $model = new ProdiModel();

        $nama = $this->request->getPost('nama');

        $model->save([
            'fakultas_id' => $this->request->getPost('fakultas_id'),
            'nama' => $nama,
            'slug' => url_title($nama, '-', true),
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'profil_lulusan' => $this->request->getPost('profil_lulusan'),
            'capaian' => $this->request->getPost('capaian'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/news');
    }

    public function deleteProdi($id)
    {
        (new ProdiModel())->delete($id);
        return redirect()->back();
    }

    public function create()
    {
        $fakultas = new \App\Models\FakultasModel();

        return view('admin/faculty/prodi', [
            'fakultas' => $fakultas->findAll()
        ]);
    }

    public function edit($id)
    {
        $prodiModel = new \App\Models\ProdiModel();
        $fakultasModel = new \App\Models\FakultasModel();

        $data['prodi'] = $prodiModel->find($id);
        $data['fakultas'] = $fakultasModel->findAll();

        return view('admin/faculty/edit-prodi', $data);
    }

    public function update($id)
    {
        $model = new \App\Models\ProdiModel();

        // ambil data array
        $misi = (array) $this->request->getPost('misi');
        $profil = (array) $this->request->getPost('profil_lulusan');
        $capaian = (array) $this->request->getPost('capaian');

        // bersihin data kosong
        $misi = array_filter($misi);
        $profil = array_filter($profil);
        $capaian = array_filter($capaian);

        // siapkan data utama
        $data = [
            'fakultas_id' => $this->request->getPost('fakultas_id'),
            'nama' => $this->request->getPost('nama'),
            'slug' => url_title($this->request->getPost('nama'), '-', true),
            'visi' => $this->request->getPost('visi'),
            'misi' => implode("\n", $misi),
            'profil_lulusan' => implode("\n", $profil),
            'capaian' => implode("\n", $capaian),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // upload image (optional)
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);
            $data['image'] = $newName;
        }

        // update sekali saja 🔥
        $model->update($id, $data);

        return redirect()->to('/admin/news?tab=fakultas');
    }

    
public function detail($slug)
{
    $model = new ProdiModel();

    $data['prodi'] = $model->where('slug', $slug)->first();

    if (!$data['prodi']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('detail', $data);
}
}
