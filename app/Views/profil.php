<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="relative h-[500px] flex items-center overflow-hidden">

  <!-- BACKGROUND IMAGE -->
  <img src="https://pendaftaranmahasiswabaru.net/wp-content/uploads/2021/04/bali.jpg"
    class="absolute inset-0 w-full h-full object-cover">

  <!-- OVERLAY KIRI -->
  <div class="absolute inset-0 bg-gradient-to-r from-[#0f1e3a]/90 via-[#0f1e3a]/70 to-transparent"></div>

  <!-- CONTENT -->
  <div class="relative max-w-7xl mx-auto px-6 text-white reveal">

    <p class="text-sm text-gray-300 mb-2">
      ITB STIKOM Bali
    </p>

    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
      Profil Kampus <br>
      Institut Teknologi dan Bisnis STIKOM Bali
    </h1>

    <p class="text-gray-300 text-sm md:text-base max-w-xl mb-6">
      Membangun generasi unggul melalui pendidikan teknologi, inovasi,
      dan kolaborasi global untuk masa depan yang lebih baik.
    </p>

  </div>

</section>

<section class="max-w-7xl mx-auto px-6 py-16 text-center">

  <!-- HEADER -->
  <div class="max-w-7xl mx-auto">

    <p class="text-sm text-gray-400 uppercase tracking-wide mb-2">
      Introduction
    </p>

    <h2 class="text-3xl font-bold text-gray-800 leading-tight">
      Visi & Misi <br>
      ITB STIKOM Bali
    </h2>

    <p class="text-gray-600 mt-4 text-sm leading-relaxed">
      <?= $visi['visi'] ?? 'Belum ada data visi' ?>
    </p>
  </div>

  <!-- GRID MISI -->
  <div class="mt-12 grid md:grid-cols-3 gap-6 justify-center">

    <?php if (!empty($misi)): ?>
      <?php $no = 1;
      foreach ($misi as $m): ?>

        <div class="bg-white p-6 rounded-xl border border-[#1E2A47]/30 hover:shadow-md transition text-center min-h-[180px] flex flex-col justify-center">

          <!-- NUMBER -->
          <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-full bg-[#1E2A47]/10 text-[#1E2A47] font-bold mb-4">
            <?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
          </div>

          <!-- TEXT -->
          <p class="text-sm text-gray-600 leading-relaxed">
            <?= $m['isi'] ?>
          </p>

        </div>

      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-400 text-sm col-span-3">Belum ada data misi</p>
    <?php endif; ?>

  </div>

</section>

<section class="max-w-7xl mx-auto px-6 py-16">

  <div class="grid md:grid-cols-2 gap-12 items-start">

    <!-- LEFT -->
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-2">
        Sambutan
      </h2>

      <h3 class="text-lg font-semibold text-[#1E459F] mb-6">
        <?= $profil['jabatan'] ?><br>
        <?= $profil['nama_rektor'] ?>
      </h3>

      <div class="text-gray-600 text-sm leading-relaxed text-justify space-y-4">
        <?= nl2br($profil['sambutan']) ?>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="flex justify-center md:justify-end">
      <img src="<?= base_url('uploads/' . $profil['foto_rektor']) ?>"
        class="w-34 h-[600px] object-cover rounded-xl shadow-md">
    </div>

  </div>

</section>

<section class="bg-white py-16">

  <div class="max-w-7xl mx-auto px-6">

    <!-- TITLE -->
    <div class="mb-10">
      <h2 class="text-3xl font-bold text-gray-800">
        Kerjasama ITB STIKOM Bali
      </h2>

      <p class="text-gray-600 mt-3 max-w-2xl text-sm leading-relaxed">
        ITB STIKOM Bali terus mengembangkan mutu pendidikan melalui kerja sama
        dengan berbagai institusi di tingkat lokal, nasional, dan internasional.
      </p>
    </div>

    <!-- GRID CATEGORY -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php foreach ($kerjasama as $kategori => $items): ?>

        <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">

          <!-- WARNA DINAMIS -->
          <h3 class="font-semibold mb-3
        <?= $kategori == 'Internasional' ? 'text-[#1E459F]' : '' ?>
        <?= $kategori == 'Perguruan Tinggi Nasional' ? 'text-[#1E459F]' : '' ?>
        <?= $kategori == 'Pemerintah & Asosiasi' ? 'text-[#1E459F]' : '' ?>
        <?= $kategori == 'BUMN & Industri' ? 'text-[#1E459F]' : '' ?>
        <?= $kategori == 'Korporat' ? 'text-[#1E459F]' : '' ?>
        <?= $kategori == 'Perbankan' ? 'text-[#1E459F]' : '' ?>
      ">
            <?= esc($kategori) ?>
          </h3>

          <ul class="text-sm text-gray-600 space-y-1">
            <?php foreach ($items as $nama): ?>
              <li><?= esc($nama) ?></li>
            <?php endforeach; ?>
          </ul>

        </div>

      <?php endforeach; ?>

    </div>

  </div>

  </div>

</section>

<section class="max-w-7xl mx-auto px-6 py-16">

  <!-- TITLE -->
  <div class="text-center mb-10">
    <h2 class="text-3xl font-bold text-gray-800">
      Fasilitas Kampus
    </h2>

    <p class="text-gray-500 text-sm mt-2 max-w-xl mx-auto">
      Fasilitas lengkap untuk menunjang pembelajaran dan pengembangan mahasiswa
    </p>
  </div>

  <!-- GRID -->
  <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">

    <?php
    $fasilitas = explode("\n", $profil['fasilitas'] ?? '');
    ?>

    <?php foreach ($fasilitas as $f): ?>
      <?php if (trim($f) != ''): ?>

        <div class="bg-white p-4 rounded-xl shadow border hover:shadow-lg transition">

          <!-- ICON -->
          <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#1E2A47]/10 text-[#1E2A47] mb-3">
            <i class="fi fi-rr-check"></i>
          </div>

          <!-- TEXT -->
          <p class="text-sm text-gray-600 leading-relaxed">
            <?= trim($f) ?>
          </p>

        </div>

      <?php endif; ?>
    <?php endforeach; ?>

  </div>

</section>
<?= $this->endSection() ?>