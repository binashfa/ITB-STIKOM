<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<!-- HERO -->
<section class="relative h-[450px] flex items-center overflow-hidden">

  <img src="<?= base_url('uploads/'.$prodi['image']) ?>"
     class="absolute inset-0 w-full h-full object-cover">

  <div class="absolute inset-0 bg-gradient-to-r from-[#0f172a]/90 via-[#0f172a]/70 to-transparent"></div>

  <div class="relative pl-10 md:pl-20 text-left text-white">
    <div class="w-12 h-1 bg-[#1E459F] mb-4"></div>

    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
      <?= $prodi['nama'] ?>
    </h1>

    <p class="mt-4 text-gray-300 text-sm md:text-base max-w-xl">
      <?= $prodi['deskripsi'] ?? '-' ?>
    </p>
  </div>
</section>

<!-- VISI MISI -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center">

  <h2 class="text-3xl font-bold text-gray-800">
    Visi dan Misi Program Studi
  </h2>

  <!-- VISI -->
  <p class="text-gray-600 mt-3 max-w-2xl mx-auto text-sm">
    <?= $prodi['visi'] ?>
  </p>

  <!-- MISI -->
  <div class="grid md:grid-cols-4 gap-8 mt-12">

    <?php
    $misiList = explode("\n", $prodi['misi']);
    $i = 1;
    foreach ($misiList as $m):
    ?>

      <div class="bg-white p-6 rounded-xl border border-[#1E459F] shadow-sm hover:shadow-xl transition">
        <h3 class="font-semibold text-lg mb-2">Misi <?= $i++ ?></h3>
        <p class="text-sm text-gray-500"><?= $m ?></p>
      </div>

    <?php endforeach; ?>

  </div>
</section>

<!-- PROFIL LULUSAN -->
<section class="max-w-7xl mx-auto px-6 py-16">

  <h2 class="text-3xl font-bold text-gray-800 mb-6">
    Profil Lulusan
  </h2>

  <div class="grid sm:grid-cols-2 gap-4">

    <?php
    $profil = explode("\n", $prodi['profil_lulusan']);
    $huruf = range('A', 'Z'); // array A-Z
    $i = 0;

    foreach ($profil as $item):
    ?>

      <div class="bg-white p-4 rounded-lg border 
        hover:shadow-[#1E459F]
        hover:-translate-y-1 hover:scale-[1.02]
        transition duration-300 flex gap-3 items-start">

        <!-- HURUF -->
        <div class="w-8 h-8 flex items-center justify-center 
          bg-[#1E459F] text-white font-bold rounded-full text-sm">
          <?= $huruf[$i] ?? '-' ?>
        </div>

        <!-- TEXT -->
        <p class="text-sm text-gray-500 flex-1 text-justify">
          <?= $item ?>
        </p>

      </div>

    <?php
      $i++;
    endforeach;
    ?>

  </div>

</section>


<!-- CAPAIAN -->
<section class="bg-gray-50 py-16">

  <div class="max-w-7xl mx-auto px-6">

    <h2 class="text-3xl font-bold text-gray-800">
      Capaian Pembelajaran
    </h2>

    <div class="grid md:grid-cols-4 gap-8 mt-12">

      <?php
      $capaian = explode("\n", $prodi['capaian']);
      $no = 1;
      foreach ($capaian as $c):
      ?>

        <div>
          <h3 class="text-3xl font-bold text-[#1E459F]">
            <?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
          </h3>
          <p class="text-sm text-gray-500 mt-2 text-justify"><?= $c ?></p>
        </div>

      <?php endforeach; ?>

    </div>

  </div>

</section>

<?= $this->endSection() ?>