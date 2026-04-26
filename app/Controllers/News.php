<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = new NewsModel();

        $data['news'] = $model
            ->where('status', 'published') // 🔥 FILTER DI SINI
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('news', $data);
    }


    public function detail($slug)
    {
        $model = new NewsModel();

        $data['news'] = $model
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$data['news']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // 🔥 RELATED (data real juga)
        $data['related'] = $model
            ->where('id !=', $data['news']['id'])
            ->where('status', 'published')
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        return view('news-detail', $data);
    }
}
