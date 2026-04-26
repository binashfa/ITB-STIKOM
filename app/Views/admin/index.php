<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">

</head>

<body class="bg-gray-100">

  <div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen bg-white border-r flex flex-col justify-between p-4">

      <!-- TOP -->
      <div>

        <!-- LOGO -->
        <div class="flex items-center gap-3 mb-8">

          <!-- LOGO -->
          <img src="https://www.stikom-bali.ac.id/id/wp-content/uploads/2020/07/ITB-RESMI-300x300.png"
            class="w-12 h-12 object-contain rounded-lg shadow-sm">

          <!-- TEXT -->
          <div class="leading-tight">
            <p class="text-[10px] text-gray-500 font-medium">
              ITB STIKOM BALI
            </p>
            <p class="text-sm font-bold text-[#1E459F]">
              Admin Panel
            </p>
          </div>

        </div>

        <!-- MENU -->
        <nav class="space-y-2 text-sm">

          <!-- ACTIVE -->
          <button onclick="showTab('news')"
            class="flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-envelope text-lg"></i>
            <span>News</span>
          </button>

          <button onclick="showTab('fakultas')"
            class="flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-graduation-cap text-lg"></i>
            <span>Fakultas</span>
          </button>

          <button onclick="showTab('kerjasama')"
            class="flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-handshake text-lg"></i>
            <span>Kerjasama</span>
          </button>

          <button onclick="showTab('sejarah')"
            class="flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-time-past text-lg"></i>
            <span>Sejarah</span>
          </button>

          <button onclick="showTab('visimisi')"
            class="flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-bullseye text-lg"></i>
            <span>Visi Misi</span>
          </button>

          <button onclick="showTab('sambutan', this)"
            class="nav-btn flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-user text-lg"></i>
            <span>Sambutan</span>
          </button>

          <button onclick="showTab('fasilitas', this)"
            class="nav-btn flex items-center gap-3 p-3 rounded-xl w-full text-left transition hover:bg-gray-100">
            <i class="fi fi-rr-computer text-lg"></i>
            <span>Fasilitas</span>
          </button>

        </nav>

      </div>

      <!-- BOTTOM -->
      <div class="space-y-4">


        <!-- LOGOUT -->
        <a href="/logout"
          class="flex items-center gap-3 p-3 rounded-xl text-red-500 hover:bg-red-50 transition">
          <i class="fi fi-rr-exit text-xl"></i>
          <span>Logout</span>
        </a>

      </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 overflow-y-auto">

      <!-- ================= NEWS ================= -->
      <div id="newsTab">

        <div class="bg-white p-4 flex justify-between items-center border-b">
          <h1 class="font-semibold text-lg">News Management</h1>

          <a href="/admin/news/create"
            class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm">
            + Add News
          </a>
        </div>

        <div class="p-6">

          <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full text-sm">

              <thead class="bg-gray-50 text-gray-500">
                <tr>
                  <th class="p-3 text-left">Image</th>
                  <th class="p-3 text-left">Title</th>
                  <th class="p-3 text-left">Author</th>
                  <th class="p-3 text-left">Status</th>
                  <th class="p-3 text-left">Action</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($news as $n): ?>

                  <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">
                      <img src="<?= base_url('uploads/' . $n['image']) ?>" class="w-16 h-12 rounded">
                    </td>

                    <td class="p-3"><?= $n['title'] ?></td>

                    <td class="p-3"><?= $n['author'] ?></td>

                    <td class="p-3">
                      <span class="<?= $n['status'] == 'draft' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' ?> px-2 py-1 rounded text-xs">
                        <?= $n['status'] ?>
                      </span>
                    </td>

                    <td class="p-3 flex gap-2">

                      <?php if ($n['status'] == 'draft'): ?>
                        <a href="/admin/news/publish/<?= $n['id'] ?>"
                          class="bg-green-500 text-white px-2 py-1 text-xs rounded">
                          Publish
                        </a>
                      <?php else: ?>
                        <a href="/admin/news/unpublish/<?= $n['id'] ?>"
                          class="bg-gray-500 text-white px-2 py-1 text-xs rounded">
                          Unpublish
                        </a>
                      <?php endif; ?>

                      <a href="/admin/news/edit/<?= $n['id'] ?>" class="bg-yellow-400 text-white px-2 py-1 text-xs rounded">Edit</a>
                      <a href="/admin/news/delete/<?= $n['id'] ?>" class="bg-red-500 text-white px-2 py-1 text-xs rounded">Delete</a>

                    </td>

                  </tr>

                <?php endforeach; ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

      <!-- ================= FAKULTAS ================= -->
      <div id="fakultasTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white p-4 border-b flex justify-between items-center">
          <h1 class="font-semibold text-lg">Fakultas & Program Studi</h1>
          <a href="/admin/fakultas/create"
            class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm hover:bg-gray-200 hover:text-[#1E459F] transition">
            + Tambah Fakultas
          </a>
        </div>

        <!-- ================= FAKULTAS ================= -->
        <div class="p-6">

          <div class="bg-white rounded-xl shadow">

            <!-- LIST -->
            <div class="divide-y">

              <?php foreach ($fakultas as $f): ?>
                <div class="p-4 flex justify-between items-center hover:bg-gray-50 transition">

                  <div class="w-full">

                    <!-- NAMA -->
                    <span class="nama-view font-medium text-gray-800"><?= $f['nama'] ?></span>
                    <input type="text"
                      class="nama-edit hidden border px-2 py-1 text-sm w-full mt-1"
                      value="<?= $f['nama'] ?>">

                    <!-- DESKRIPSI -->
                    <span class="desk-view text-xs text-gray-500 mt-1 block"><?= $f['deskripsi'] ?></span>
                    <textarea
                      class="desk-edit hidden border px-2 py-1 text-sm w-full mt-1"><?= $f['deskripsi'] ?></textarea>

                  </div>

                  <div class="flex gap-2">

                    <!-- EDIT -->
                    <button onclick="editFakultas(this)"
                      class="btn-edit px-3 py-1 bg-yellow-400 text-white rounded text-xs">
                      <i class="fi fi-rr-pencil"></i>
                    </button>

                    <!-- SAVE -->
                    <button onclick="saveFakultas(this, <?= $f['id'] ?>)"
                      class="btn-save hidden px-3 py-1 bg-green-500 text-white rounded text-xs">
                      <i class="fi fi-rr-check "></i>
                    </button>

                    <!-- DELETE -->
                    <a href="/admin/fakultas/delete/<?= $f['id'] ?>"
                      onclick="return confirm('Hapus fakultas ini?')"
                      class="px-3 py-1 bg-red-500 text-white rounded text-xs">
                      <i class="fi fi-rr-trash"></i>
                    </a>

                  </div>

                </div>
              <?php endforeach; ?>

            </div>

          </div>

        </div>

        <!-- ================= PRODI ================= -->
        <div class="px-6 pb-6">

          <div class="bg-white rounded-xl shadow overflow-hidden">

            <!-- HEADER -->
            <div class="p-4 border-b flex justify-between items-center">
              <h2 class="font-semibold text-lg">Program Studi</h2>

              <a href="/admin/prodi/create"
                class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm hover:bg-gray-200 hover:text-[#1E459F] transition">
                + Tambah Prodi
              </a>
            </div>

            <!-- TABLE -->
            <table class="w-full text-sm">

              <!-- HEADER -->
              <thead class="bg-gray-50 text-gray-500">
                <tr>
                  <th class="p-3 text-left">Prodi</th>
                  <th class="p-3 text-left">Fakultas</th>
                  <th class="p-3 text-center">Deskripsi</th>
                  <th class="p-3 text-center">Visi</th>
                  <th class="p-3 text-center">Misi</th>
                  <th class="p-3 text-center">Profil</th>
                  <th class="p-3 text-center">Capaian</th>
                  <th class="p-3 text-left">Action</th>
                </tr>
              </thead>

              <!-- BODY -->
              <tbody>

                <?php foreach ($prodi as $p): ?>

                  <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NAMA PRODI -->
                    <td class="p-3 font-medium text-gray-800">
                      <?= $p['nama'] ?>
                    </td>

                    <!-- FAKULTAS -->
                    <td class="p-3 text-gray-700">
                      <?php foreach ($fakultas as $f): ?>
                        <?php if ($f['id'] == $p['fakultas_id']): ?>
                          <?= $f['nama'] ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </td>

                    <!-- DESKRIPSI -->
                    <td class="p-3 text-center">
                      <?php if (!empty($p['deskripsi'])): ?>
                        <i class="fi fi-rr-check text-green-600"></i>
                      <?php else: ?>
                        <i class="fi fi-rr-cross text-red-500"></i>
                      <?php endif; ?>
                    </td>

                    <!-- VISI -->
                    <td class="p-3 text-center">
                      <?php if (!empty($p['visi'])): ?>
                        <i class="fi fi-rr-check text-green-600"></i>
                      <?php else: ?>
                        <i class="fi fi-rr-cross text-red-500"></i>
                      <?php endif; ?>
                    </td>

                    <!-- MISI -->
                    <td class="p-3 text-center">
                      <?php if (!empty($p['misi'])): ?>
                        <i class="fi fi-rr-check text-green-600"></i>
                      <?php else: ?>
                        <i class="fi fi-rr-cross text-red-500"></i>
                      <?php endif; ?>
                    </td>

                    <!-- PROFIL -->
                    <td class="p-3 text-center">
                      <?php if (!empty($p['profil_lulusan'])): ?>
                        <i class="fi fi-rr-check text-green-600"></i>
                      <?php else: ?>
                        <i class="fi fi-rr-cross text-red-500"></i>
                      <?php endif; ?>
                    </td>

                    <!-- CAPAIAN -->
                    <td class="p-3 text-center">
                      <?php if (!empty($p['capaian'])): ?>
                        <i class="fi fi-rr-check text-green-600"></i>
                      <?php else: ?>
                        <i class="fi fi-rr-cross text-red-500"></i>
                      <?php endif; ?>
                    </td>

                    <!-- ACTION -->
                    <td class="p-3 flex gap-2">

                      <a href="/admin/prodi/edit/<?= $p['id'] ?>"
                        class="px-3 py-1 bg-yellow-400 text-white rounded text-xs hover:bg-yellow-500 transition">
                        Edit
                      </a>

                      <a href="/admin/prodi/delete/<?= $p['id'] ?>"
                        onclick="return confirm('Hapus data ini?')"
                        class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition">
                        Delete
                      </a>

                    </td>

                  </tr>

                <?php endforeach; ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

      <!-- ================= KERJASAMA ================= -->
      <div id="kerjasamaTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 border-b flex justify-between items-center">
          <h1 class="font-semibold text-lg">Kerjasama</h1>

          <a href="/admin/kerjasama/create"
            class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm hover:bg-gray-200 hover:text-[#1E459F]">
            + Tambah Kerjasama
          </a>
        </div>

        <div class="p-6">

          <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full text-sm">

              <thead class="bg-gray-50 text-gray-500">
                <tr>
                  <th class="p-3 text-left">Kategori</th>
                  <th class="p-3 text-left">Nama Instansi</th>
                  <th class="p-3 text-left">Action</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($kerjasama as $k): ?>

                  <tr class="border-t hover:bg-gray-50">

                    <td class="p-3 font-medium text-gray-800">
                      <?= $k['kategori'] ?>
                    </td>

                    <td class="p-3 text-gray-600">
                      <span class="text-view"><?= $k['nama'] ?></span>

                      <input type="text"
                        class="text-edit hidden border px-2 py-1 text-sm w-full"
                        value="<?= $k['nama'] ?>">
                    </td>

                    <td class="p-3 flex gap-2">

                      <!-- EDIT -->
                      <button onclick="editRow(this)"
                        class="btn-edit px-3 py-1 bg-yellow-400 text-white rounded text-xs">
                        Edit
                      </button>

                      <!-- SAVE -->
                      <button onclick="saveRow(this, <?= $k['id'] ?>)"
                        class="btn-save hidden px-3 py-1 bg-green-500 text-white rounded text-xs flex items-center justify-center">

                        <i class="fi fi-rr-check "></i>

                      </button>

                      <!-- DELETE -->
                      <a href="/admin/kerjasama/delete/<?= $k['id'] ?>"
                        onclick="return confirm('Hapus data ini?')"
                        class="px-3 py-1 bg-red-500 text-white rounded text-xs">
                        Delete
                      </a>

                    </td>

                  </tr>

                <?php endforeach; ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

      <!-- ================= SEJARAH ================= -->
      <div id="sejarahTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 border-b">
          <h1 class="font-semibold text-lg">Sejarah Kampus</h1>
        </div>

        <div class="p-6">

          <div class="bg-white rounded-xl shadow p-6">

            <form action="admin/profil/update" method="post" class="space-y-4">

              <!-- JUDUL -->
              <div>
                <label class="text-sm text-gray-600">Judul</label>
                <input type="text" name="judul"
                  value="<?= $sejarah['judul'] ?? '' ?>"
                  class="w-full mt-1 p-3 border rounded-lg text-sm">
              </div>

              <!-- DESKRIPSI -->
              <div>
                <label class="text-sm text-gray-600">Deskripsi</label>
                <textarea name="deskripsi" rows="6"
                  class="w-full mt-1 p-3 border rounded-lg text-sm"><?= $sejarah['deskripsi'] ?? '' ?></textarea>
              </div>

              <!-- BUTTON -->
              <button type="submit"
                class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm">
                Simpan Perubahan
              </button>

            </form>

          </div>

        </div>

      </div>

      <!-- ================= VISI MISI ================= -->
      <div id="visimisiTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 border-b">
          <h1 class="font-semibold text-lg">Visi & Misi</h1>
        </div>

        <div class="p-6 space-y-6">

          <!-- ================= VISI ================= -->
          <div class="bg-white rounded-xl shadow p-6">

            <h2 class="font-semibold mb-4 text-gray-800">Visi </h2>

            <form action="admin/visi/update" method="post" class="space-y-4">

              <div>
                <textarea name="visi" rows="3"
                  class="w-full mt-1 p-3 border rounded-lg text-sm"><?= $visi['visi'] ?? '' ?></textarea>
              </div>

              <button class="bg-[#1E459F] text-white px-4 py-2 rounded text-sm">
                Simpan
              </button>

            </form>

          </div>

          <!-- ================= MISI ================= -->
          <div class="bg-white rounded-xl shadow p-6">

            <div class="flex justify-between items-center mb-4">
              <h2 class="font-semibold text-gray-800">Misi</h2>
            </div>

            <!-- TAMBAH MISI -->
            <form action="admin/misi/add" method="post" class="flex gap-2 mb-4">
              <input type="text" name="isi"
                placeholder="Tambah misi..."
                class="flex-1 p-2 border rounded text-sm">

              <button class="bg-[#1E459F] text-white px-3 rounded text-sm">
                Tambah
              </button>
            </form>

            <!-- LIST MISI -->
            <div class="space-y-3">

              <?php $no = 1;
              foreach ($misi as $m): ?>
                <div class="misi-item flex items-center gap-4 border rounded-lg p-3 bg-gray-50 hover:bg-gray-100 transition">

                  <!-- NUMBER -->
                  <div class="w-8 h-8 flex items-center justify-center text-[#1E459F] text-xs font-bold">
                    <?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
                  </div>

                  <!-- TEXT -->
                  <span class="misi-view flex-1 text-sm text-gray-700">
                    <?= $m['isi'] ?>
                  </span>

                  <!-- INPUT -->
                  <input type="text"
                    class="misi-edit hidden flex-1 border px-2 py-1 text-sm rounded"
                    value="<?= $m['isi'] ?>">

                  <!-- ACTION -->
                  <div class="flex gap-1">

                    <!-- EDIT -->
                    <button type="button" onclick="editMisi(this)"
                      class="btn-edit px-2 py-1 bg-yellow-400 text-white text-xs rounded">
                      <i class="fi fi-rr-pencil"></i>
                    </button>

                    <!-- SAVE -->
                    <button type="button" onclick="saveMisi(this, <?= $m['id'] ?>)"
                      class="btn-save hidden px-2 py-1 bg-green-500 text-white text-xs rounded">
                      <i class="fi fi-rr-check"></i>
                    </button>

                    <!-- DELETE -->
                    <a href="admin/misi/delete/<?= $m['id'] ?>"
                      onclick="return confirm('Hapus misi?')"
                      class="px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                      <i class="fi fi-rr-trash"></i>
                    </a>

                  </div>

                </div>
              <?php endforeach; ?>

            </div>

          </div>

        </div>

      </div>

      <div id="sambutanTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 border-b">
          <h1 class="font-semibold text-lg">Sambutan Rektor</h1>
        </div>

        <div class="p-6">
          <div class="bg-white rounded-xl shadow p-6">

            <form action="/admin/sambutan/update" method="post" enctype="multipart/form-data" class="space-y-5">

              <!-- NAMA REKTOR -->
              <div>
                <label class="text-sm text-gray-600">Nama Rektor</label>
                <input type="text" name="nama_rektor"
                  value="<?= $sejarah['nama_rektor'] ?? '' ?>"
                  placeholder="Contoh: Dr. Dadang Hermawan"
                  class="w-full mt-1 p-3 border rounded-lg text-sm focus:ring-2 focus:ring-[#1E459F]">
              </div>

              <!-- JABATAN -->
              <div>
                <label class="text-sm text-gray-600">Jabatan</label>
                <input type="text" name="jabatan"
                  value="<?= $sejarah['jabatan'] ?? '' ?>"
                  placeholder="Contoh: Rektor ITB STIKOM Bali"
                  class="w-full mt-1 p-3 border rounded-lg text-sm focus:ring-2 focus:ring-[#1E459F]">
              </div>

              <!-- SAMBUTAN -->
              <div>
                <label class="text-sm text-gray-600">Isi Sambutan</label>
                <textarea name="sambutan" rows="6"
                  placeholder="Tulis sambutan rektor di sini..."
                  class="w-full mt-1 p-3 border rounded-lg text-sm focus:ring-2 focus:ring-[#1E459F]"><?= $sejarah['sambutan'] ?? '' ?></textarea>
              </div>

              <!-- FOTO -->
              <div>
                <label class="text-sm text-gray-600">Foto Rektor</label>
                <input type="file" name="foto_rektor"
                  class="w-full mt-1 text-sm border p-2 rounded-lg bg-gray-50">
              </div>

              <!-- BUTTON -->
              <div class="flex justify-end">
                <button class="bg-[#1E459F] hover:bg-[#16367c] text-white px-5 py-2 rounded-lg text-sm transition">
                  Simpan
                </button>
              </div>

            </form>

          </div>
        </div>

      </div>

      <!-- ================= FASILITAS ================= -->
      <div id="fasilitasTab" class="hidden">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 border-b">
          <h1 class="font-semibold text-lg">Fasilitas Kampus</h1>
        </div>

        <div class="p-6">

          <div class="bg-white rounded-xl shadow p-6">

            <!-- INFO -->
            <div class="bg-blue-50 border border-blue-100 text-blue-700 text-xs p-3 rounded-lg mb-4 flex items-center gap-2">
              <i class="fi fi-rr-info"></i>
              <span>Tekan <b>Enter</b> untuk menambah fasilitas baru (1 baris = 1 fasilitas)</span>
            </div>

            <!-- FORM -->
            <form action="/admin/fasilitas/update" method="post" class="space-y-4">

              <!-- TEXTAREA -->
              <textarea name="fasilitas" rows="10"
                class="w-full p-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1E459F]"
                placeholder="- Lab Komputer&#10;- Ruang Kelas Nyaman&#10;- Perpustakaan Digital"><?= $sejarah['fasilitas'] ?? '' ?></textarea>

              <!-- BUTTON -->
              <div class="flex justify-end">
                <button class="bg-[#1E459F] hover:bg-[#16367c] text-white px-5 py-2 rounded-lg text-sm transition">
                  Simpan Perubahan
                </button>
              </div>

            </form>

          </div>

        </div>

      </div>

    </main>

  </div>

  <!-- JS TAB -->
  <script>
    function showTab(tab) {
      document.getElementById('newsTab').classList.add('hidden');
      document.getElementById('fakultasTab').classList.add('hidden');
      document.getElementById('kerjasamaTab').classList.add('hidden');
      document.getElementById('sejarahTab').classList.add('hidden');
      document.getElementById('visimisiTab').classList.add('hidden');

      document.getElementById(tab + 'Tab').classList.remove('hidden');
    }

    function editProdi(id, nama) {
      const newName = prompt("Edit nama prodi:", nama);

      if (newName !== null) {
        fetch('/admin/prodi/update/' + id, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'nama=' + encodeURIComponent(newName)
          })
          .then(() => location.reload());
      }
    }

    function editRow(btn) {
      const row = btn.closest("tr");

      row.querySelector(".text-view").classList.add("hidden");
      row.querySelector(".text-edit").classList.remove("hidden");

      row.querySelector(".btn-edit").classList.add("hidden");
      row.querySelector(".btn-save").classList.remove("hidden");
    }

    function saveRow(btn, id) {
      const row = btn.closest("tr");

      const input = row.querySelector(".text-edit");
      const newValue = input.value;

      fetch(`/admin/kerjasama/update/${id}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            nama: newValue
          })
        })
        .then(res => res.json())
        .then(res => {

          // update tampilan
          row.querySelector(".text-view").textContent = newValue;

          // balik ke mode normal
          row.querySelector(".text-view").classList.remove("hidden");
          row.querySelector(".text-edit").classList.add("hidden");

          row.querySelector(".btn-edit").classList.remove("hidden");
          row.querySelector(".btn-save").classList.add("hidden");

        });
    }

    function editFakultas(btn) {
      const row = btn.closest(".flex");

      const parent = btn.closest(".p-4");

      parent.querySelector(".nama-view").classList.add("hidden");
      parent.querySelector(".desk-view").classList.add("hidden");

      parent.querySelector(".nama-edit").classList.remove("hidden");
      parent.querySelector(".desk-edit").classList.remove("hidden");

      parent.querySelector(".btn-edit").classList.add("hidden");
      parent.querySelector(".btn-save").classList.remove("hidden");
    }

    function saveFakultas(btn, id) {
      const parent = btn.closest(".p-4");

      const nama = parent.querySelector(".nama-edit").value;
      const deskripsi = parent.querySelector(".desk-edit").value;

      fetch(`/admin/fakultas/update/${id}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            nama: nama,
            deskripsi: deskripsi
          })
        })
        .then(res => res.json())
        .then(res => {

          parent.querySelector(".nama-view").textContent = nama;
          parent.querySelector(".desk-view").textContent = deskripsi;

          parent.querySelector(".nama-view").classList.remove("hidden");
          parent.querySelector(".desk-view").classList.remove("hidden");

          parent.querySelector(".nama-edit").classList.add("hidden");
          parent.querySelector(".desk-edit").classList.add("hidden");

          parent.querySelector(".btn-edit").classList.remove("hidden");
          parent.querySelector(".btn-save").classList.add("hidden");
        });
    }

    function editMisi(btn) {
      const parent = btn.closest(".misi-item"); // 🔥 FIX

      const view = parent.querySelector(".misi-view");
      const input = parent.querySelector(".misi-edit");
      const editBtn = parent.querySelector(".btn-edit");
      const saveBtn = parent.querySelector(".btn-save");

      view.classList.add("hidden");
      input.classList.remove("hidden");

      editBtn.classList.add("hidden");
      saveBtn.classList.remove("hidden");
    }

    function saveMisi(btn, id) {
      const parent = btn.closest(".misi-item"); // 🔥 FIX

      const isi = parent.querySelector(".misi-edit").value;

      fetch(`/admin/misi/update/${id}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            isi: isi
          })
        })
        .then(res => res.json())
        .then(() => {

          parent.querySelector(".misi-view").textContent = isi;

          parent.querySelector(".misi-view").classList.remove("hidden");
          parent.querySelector(".misi-edit").classList.add("hidden");

          parent.querySelector(".btn-edit").classList.remove("hidden");
          parent.querySelector(".btn-save").classList.add("hidden");

        });
    }
  </script>

</body>

</html>