<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-6xl mx-auto py-10">

    <h2 class="text-2xl font-bold mb-6">Edit Program Studi</h2>

    <form action="/admin/prodi/update/<?= $prodi['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="grid md:grid-cols-2 gap-6">

            <!-- ================= KIRI ================= -->
            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="font-semibold mb-4">Informasi Dasar</h3>

                <label class="text-sm">Fakultas</label>
                <select name="fakultas_id" class="border p-2 w-full rounded mb-4">
                    <?php foreach ($fakultas as $f): ?>
                        <option value="<?= $f['id'] ?>"
                            <?= $f['id'] == $prodi['fakultas_id'] ? 'selected' : '' ?>>
                            <?= $f['nama'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label class="text-sm">Nama Prodi</label>
                <input name="nama" value="<?= $prodi['nama'] ?>"
                    class="border p-2 w-full rounded">

                <div>
                    <label class="text-sm font-medium">Deskripsi</label>
                    <p class="text-xs text-gray-500 mb-1">
                        Penjelasan singkat tentang program studi
                    </p>

                    <textarea name="deskripsi" rows="3"
                        class="border p-2 w-full rounded"><?= $prodi['deskripsi'] ?? '' ?></textarea>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Foto Program Studi</label>
                    <p class="text-xs text-gray-500 mb-1">
                        Upload gambar untuk ditampilkan di halaman prodi
                    </p>

                    <input type="file" name="image" class="border p-2 w-full rounded">

                    <?php if (!empty($prodi['image'])): ?>
                        <img src="<?= base_url('uploads/' . $prodi['image']) ?>"
                            class="mt-3 w-32 h-20 object-cover rounded border">
                    <?php endif; ?>
                </div>

            </div>

            <!-- ================= KANAN ================= -->
            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="font-semibold mb-4">Konten Akademik</h3>

                <!-- VISI -->
                <label class="text-sm">Visi</label>
                <textarea name="visi" class="border p-2 w-full rounded mb-4"><?= $prodi['visi'] ?></textarea>

                <!-- MISI -->
                <div class="mb-4">
                    <label class="text-sm font-medium">Misi</label>

                    <div id="misi-container" class="space-y-2 mt-2">
                        <?php foreach (explode("\n", $prodi['misi']) as $m): ?>
                            <div class="flex gap-2">
                                <input type="text" name="misi[]" value="<?= $m ?>"
                                    class="border p-2 w-full rounded">
                                <button type="button" onclick="removeItem(this)"
                                    class="text-red-500">✕</button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" onclick="addItem('misi-container','misi[]')"
                        class="text-[#1E459F]  text-sm mt-2">+ Tambah Misi</button>
                </div>

                <!-- PROFIL -->
                <div class="mb-4">
                    <label class="text-sm font-medium">Profil Lulusan</label>

                    <div id="profil-container" class="space-y-2 mt-2">
                        <?php foreach (explode("\n", $prodi['profil_lulusan']) as $p): ?>
                            <div class="flex gap-2">
                                <input type="text" name="profil_lulusan[]" value="<?= $p ?>"
                                    class="border p-2 w-full rounded">
                                <button type="button" onclick="removeItem(this)"
                                    class="text-red-500">✕</button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" onclick="addItem('profil-container','profil_lulusan[]')"
                        class="text-[#1E459F]  text-sm mt-2">+ Tambah Profil</button>
                </div>

                <!-- CAPAIAN -->
                <div>
                    <label class="text-sm font-medium">Capaian Pembelajaran</label>

                    <div id="capaian-container" class="space-y-2 mt-2">
                        <?php foreach (explode("\n", $prodi['capaian']) as $c): ?>
                            <div class="flex gap-2">
                                <input type="text" name="capaian[]" value="<?= $c ?>"
                                    class="border p-2 w-full rounded">
                                <button type="button" onclick="removeItem(this)"
                                    class="text-red-500">✕</button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" onclick="addItem('capaian-container','capaian[]')"
                        class="text-[#1E459F]  text-sm mt-2">+ Tambah Capaian</button>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-6">
            <button type="submit"
                class="bg-[#1E459F] text-white px-6 py-2 rounded hover:bg-gray-200 hover:text-[#1E459F]">
                Update
            </button>
        </div>

    </form>

</div>

<script>
    function addItem(containerId, name) {
        const container = document.getElementById(containerId);

        const div = document.createElement('div');
        div.className = 'flex gap-2';

        div.innerHTML = `
    <input type="text" name="${name}" class="border p-2 w-full rounded">
    <button type="button" onclick="removeItem(this)" class="text-red-500">✕</button>
  `;

        container.appendChild(div);
    }

    function removeItem(btn) {
        btn.parentElement.remove();
    }

    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(event) {
            document.getElementById('previewImage').src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>