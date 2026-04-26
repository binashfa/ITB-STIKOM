
  <script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-2xl mx-auto py-10">

  <div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-6">Tambah Fakultas</h2>

    <form action="/admin/fakultas/store" method="post" class="space-y-4">

      <input name="nama" placeholder="Nama Fakultas"
        class="border p-2 w-full rounded">

      <textarea name="deskripsi" placeholder="Deskripsi"
        class="border p-2 w-full rounded"></textarea>

      <button class="bg-[#1E459F]  text-white px-4 py-2 rounded w-full">
        Simpan
      </button>

    </form>

  </div>

</div>