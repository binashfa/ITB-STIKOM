<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto py-10">

  <div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-6">Tambah Kerjasama</h2>

    <form action="/admin/kerjasama/store" method="post" class="space-y-4">

      <!-- KATEGORI -->
      <div>
        <label class="text-sm font-medium">Kategori</label>
        <p class="text-xs text-gray-500 mb-1">
          Pilih jenis kerjasama
        </p>

        <select name="kategori" class="border p-2 w-full rounded">
          <option>Internasional</option>
          <option>Perguruan Tinggi Nasional</option>
          <option>Pemerintah & Asosiasi</option>
          <option>BUMN & Industri</option>
          <option>Korporat</option>
          <option>Perbankan</option>
        </select>
      </div>

      <!-- NAMA -->
      <div>
        <label class="text-sm font-medium">Nama Instansi</label>
        <p class="text-xs text-gray-500 mb-1">
          Contoh: Bank Mandiri, Telkomsel, dll
        </p>

        <input name="nama"
          class="border p-2 w-full rounded"
          placeholder="Masukkan nama instansi">
      </div>

      <!-- BUTTON -->
      <button
        class="bg-[#1E459F] text-white px-4 py-2 rounded w-full hover:bg-gray-200 hover:text-[#1E459F] transition">
        Simpan
      </button>

    </form>

  </div>

</div>