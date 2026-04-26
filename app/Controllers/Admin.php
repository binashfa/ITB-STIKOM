<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\FakultasModel;
use App\Models\ProdiModel;
use App\Models\KerjasamaModel;
use App\Models\ProfilModel;
use App\Models\VisiMisiModel;
use App\Models\MisiModel;

class Admin extends BaseController
{
    public function index()
    {
        $newsModel = new \App\Models\NewsModel();
        $fakultasModel = new \App\Models\FakultasModel();
        $prodiModel = new \App\Models\ProdiModel();
        $kerjasamaModel = new KerjasamaModel();
        $profilModel = new \App\Models\ProfilModel(); // 🔥 tambah ini

        $data['news'] = $newsModel->findAll();

        $fakultas = $fakultasModel->findAll();
        $data['prodi'] = $prodiModel->findAll();
        $data['kerjasama'] = $kerjasamaModel->findAll();

        foreach ($fakultas as &$f) {
            $f['prodi'] = $prodiModel
                ->where('fakultas_id', $f['id'])
                ->findAll();
        }

        $data['fakultas'] = $fakultas;

        // 🔥 INI YANG KAMU KURANGIN
        $data['sejarah'] = $profilModel->first();

        $data['visi'] = (new VisiMisiModel())->first();
        $data['misi'] = (new MisiModel())->findAll();

        return view('admin/index', $data);
    }

    public function create()
    {
        return view('admin/news/create');
    }

    public function store()
    {
        $model = new NewsModel();

        $file = $this->request->getFile('image');
        $imageName = $file->getRandomName();
        $file->move('uploads/', $imageName);

        $title = $this->request->getPost('title');

        $model->save([
            'title' => $title,
            'slug' => url_title($title, '-', true),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'author' => $this->request->getPost('author'),
            'status' => 'draft',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $model = new NewsModel();
        $data['news'] = $model->find($id);

        return view('admin/news/edit', $data);
    }

    public function update($id)
    {
        $model = new NewsModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'content' => $this->request->getPost('content'),
            'author' => $this->request->getPost('author'),
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
            $data['image'] = $imageName;
        }

        $model->update($id, $data);

        return redirect()->to('/admin/news');
    }

    public function delete($id)
    {
        $model = new NewsModel();
        $model->delete($id);

        return redirect()->back();
    }

    public function publish($id)
    {
        $model = new NewsModel();

        $model->update($id, [
            'status' => 'published'
        ]);

        return redirect()->to('/admin/news');
    }

    public function unpublish($id)
    {
        $model = new NewsModel();

        $model->update($id, [
            'status' => 'draft'
        ]);

        return redirect()->to('/admin/news');
    }

    public function storeFakultas()
    {
        $model = new FakultasModel();

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->back();
    }

    public function updateFakultas($id)
    {
        $model = new \App\Models\FakultasModel();

        $data = $this->request->getJSON(true);

        $model->update($id, [
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi']
        ]);

        return $this->response->setJSON(['status' => 'ok']);
    }

    public function storeProdi()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'profil_lulusan' => 'required',
            'capaian' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        $model = new ProdiModel();

        $model->save([
            'fakultas_id' => $this->request->getPost('fakultas_id'),
            'nama' => $this->request->getPost('nama'),
            'slug' => url_title($this->request->getPost('nama'), '-', true),
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'profil_lulusan' => $this->request->getPost('profil_lulusan'),
            'capaian' => $this->request->getPost('capaian'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/admin/news');
    }

    public function deleteProdi($id)
    {
        $model = new ProdiModel();
        $model->delete($id);

        return redirect()->back();
    }

    public function updateProdi($id)
    {
        $model = new ProdiModel();

        $model->update($id, [
            'nama' => $this->request->getPost('nama')
        ]);

        return redirect()->back();
    }

    public function profil()
    {
        $model = new \App\Models\ProfilModel();
        $data['profil'] = $model->first();

        return view('admin/profil', $data);
    }

    public function updateSejarah()
    {
        $profilModel = new \App\Models\ProfilModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // karena biasanya cuma 1 data → pakai ID 1
        $profilModel->update(1, $data);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function updateVisi()
    {
        $model = new \App\Models\VisiMisiModel();

        $model->update(1, [
            'visi' => $this->request->getPost('visi')
        ]);

        return redirect()->back();
    }

    public function addMisi()
    {
        (new MisiModel())->save([
            'isi' => $this->request->getPost('isi')
        ]);

        return redirect()->back();
    }

    public function deleteMisi($id)
    {
        (new MisiModel())->delete($id);
        return redirect()->back();
    }

    public function updateMisi($id)
    {
        $model = new \App\Models\MisiModel();

        $data = $this->request->getJSON(true); // 🔥 ini kuncinya

        $model->update($id, [
            'isi' => $data['isi']
        ]);

        return $this->response->setJSON(['status' => 'ok']);
    }

    public function updateSambutan()
    {
        $model = new \App\Models\ProfilModel();

        $data = [
            'nama_rektor' => $this->request->getPost('nama_rektor'),
            'jabatan' => $this->request->getPost('jabatan'),
            'sambutan' => $this->request->getPost('sambutan'),
        ];

        $file = $this->request->getFile('foto_rektor');

        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/', $namaFile);
            $data['foto_rektor'] = $namaFile;
        }

        $model->update(1, $data);

        return redirect()->to('/admin/news')->with('success', 'Sambutan berhasil diupdate');
    }

    public function updateFasilitas()
    {
        $model = new \App\Models\ProfilModel();

        $model->update(1, [
            'fasilitas' => $this->request->getPost('fasilitas')
        ]);

        return redirect()->to('/admin/news')->with('success', 'Fasilitas berhasil diupdate');
    }
}
