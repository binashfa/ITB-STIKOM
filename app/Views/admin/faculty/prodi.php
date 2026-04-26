
  <script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-3xl mx-auto py-10">

  <div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-6">Tambah Program Studi</h2>

    <form action="/admin/prodi/store" method="post" class="space-y-4">

      <select name="fakultas_id" class="border p-2 w-full rounded">
        <?php foreach($fakultas as $f): ?>
          <option value="<?= $f['id'] ?>"><?= $f['nama'] ?></option>
        <?php endforeach; ?>
      </select>

      <input name="nama" placeholder="Nama Prodi"
        class="border p-2 w-full rounded">

      <textarea name="visi" placeholder="Visi"
        class="border p-2 w-full rounded"></textarea>

      <textarea name="misi" placeholder="Misi"
        class="border p-2 w-full rounded"></textarea>

      <textarea name="profil_lulusan" placeholder="Profil Lulusan"
        class="border p-2 w-full rounded"></textarea>

      <textarea name="capaian_pembelajaran" placeholder="Capaian"
        class="border p-2 w-full rounded"></textarea>

      <button class="bg-[#1E459F] text-white px-4 py-2 rounded w-full">
        Simpan
      </button>

    </form>

  </div>

</div>