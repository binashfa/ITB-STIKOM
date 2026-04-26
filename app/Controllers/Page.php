<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProdiModel;
use App\Models\HomeModel;

class Page extends BaseController
{
	public function prodi($slug)
	{
		$home = new HomeModel();
		$prodiModel = new ProdiModel(); // 🔥 tambah ini

		$data['homes'] = $home->where('status_home', 'published')->findAll();

		// 🔥 TAMBAH INI
		$data['prodi'] = $prodiModel
			->orderBy('id', 'DESC')
			->findAll(6); // ambil 6 aja biar rapi

		return view('home', $data);
	}
	
	public function fakultas()
	{
		$fakultasModel = new FakultasModel();
		$prodiModel = new ProdiModel();

		$fakultas = $fakultasModel->findAll();

		foreach ($fakultas as &$f) {
			$f['prodi'] = $prodiModel
				->where('fakultas_id', $f['id'])
				->findAll();
		}

		$data['fakultas'] = $fakultas;

		return view('faculty', $data);
	}

	public function addProdi()
	{
		$model = new ProdiModel();

		$model->save([
			'fakultas_id' => $this->request->getPost('fakultas_id'),
			'nama' => $this->request->getPost('nama')
		]);

		return redirect()->back();
	}

	public function updateFakultas($id)
	{
		$model = new FakultasModel();

		$model->update($id, [
			'nama' => $this->request->getPost('nama'),
			'deskripsi' => $this->request->getPost('deskripsi')
		]);

		return redirect()->back();
	}
}
