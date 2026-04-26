<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\NewsModel;
use App\Models\ProdiModel;
use App\Models\FakultasModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        $homeModel = new HomeModel();
        $newsModel = new NewsModel();
        $prodiModel = new ProdiModel();
        $fakultasModel = new FakultasModel();

        // HOME
        $data['homes'] = $homeModel
            ->where('status_home', 'published')
            ->findAll();

        // NEWS
        $data['news'] = $newsModel
            ->orderBy('created_at', 'DESC')
            ->findAll(4);

        // PRODI
        $data['prodi'] = $prodiModel
            ->orderBy('id', 'DESC')
            ->findAll(6);

        // 🔥 FAKULTAS + PRODI
        $fakultas = $fakultasModel->findAll();

        foreach ($fakultas as &$f) {
            $f['prodi'] = $prodiModel
                ->where('fakultas_id', $f['id'])
                ->findAll();
        }

        $data['fakultas'] = $fakultas;

        return view('home', $data);
    }

    public function viewHome($slug)
    {
        $homeModel = new HomeModel();

        $data['home'] = $homeModel->where([
            'slug' => $slug,
            'status_home' => 'published'
        ])->first();

        if (!$data['home']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('home_detail', $data);
    }
}
