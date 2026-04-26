<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="relative h-[500px] flex items-center overflow-hidden">

  <!-- BACKGROUND IMAGE -->
  <img src="https://tse2.mm.bing.net/th/id/OIP.G6_gf4I74_tFjXRPhJHjagHaFD?rs=1&pid=ImgDetMain&o=7&rm=3"
    class="absolute inset-0 w-full h-full object-cover">

  <!-- OVERLAY KIRI -->
  <div class="absolute inset-0 bg-gradient-to-r from-[#0f1e3a]/90 via-[#0f1e3a]/70 to-transparent"></div>

  <!-- CONTENT -->
  <div class="relative max-w-7xl mx-auto px-6 text-white reveal">

    <p class="text-sm text-gray-300 mb-2">
      ITB STIKOM Bali
    </p>

    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
      News & Update <br>
      Berita Kampus
    </h1>

    <p class="text-gray-300 text-sm md:text-base max-w-xl mb-6">
      Temukan informasi terbaru seputar kegiatan, prestasi,
      dan perkembangan ITB STIKOM Bali.
    </p>

  </div>

</section>


<section class="max-w-7xl mx-auto px-6 py-16">

  <h2 class="text-3xl font-bold text-center mb-10">
    News & Articles
  </h2>

  <div class="grid md:grid-cols-3 gap-6">

    <?php foreach ($news as $n): ?>

      <div class="bg-white rounded-xl shadow hover:shadow-lg transition">

        <img src="<?= base_url('uploads/' . $n['image']) ?>"
          class="h-40 w-full object-cover rounded-t-xl">

        <div class="p-4">

          <p class="text-xs text-gray-400">
            <?= date('M d, Y', strtotime($n['created_at'])) ?>
          </p>

          <h3 class="font-semibold mt-2">
            <?= $n['title'] ?>
          </h3>

          <p class="text-sm text-gray-500 mt-2 line-clamp-2">
            <?= substr($n['content'], 0, 80) ?>...
          </p>

          <a href="<?= base_url('news/' . $n['slug']) ?>"
            class="text-blue-600 text-sm mt-3 inline-block !no-underline">
            Read More
          </a>

        </div>

      </div>

    <?php endforeach; ?>

  </div>

</section>
<?= $this->endSection() ?>