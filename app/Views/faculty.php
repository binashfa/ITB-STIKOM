<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">

<!-- HERO (INFO ONLY) -->
<section class="relative h-[500px] flex items-center overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <img src="https://www.stikom-bali.ac.id/id/wp-content/uploads/2021/04/WEB-1-min.jpg"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- OVERLAY KIRI -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#0f1e3a]/90 via-[#0f1e3a]/70 to-transparent"></div>

    <!-- CONTENT -->
    <div class="relative max-w-7xl mx-auto px-6 text-white reveal">

        <p class="text-sm text-gray-300 mb-2">
            ITB STIKOM Bali
        </p>

        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
            Fakultas & Program <br>
            Unggulan Kampus Digital
        </h1>

        <p class="text-gray-300 text-sm md:text-base max-w-xl mb-6">
            Mencetak generasi unggul di bidang teknologi, bisnis, dan kolaborasi global
            melalui pendidikan berbasis industri dan inovasi digital.
        </p>

    </div>

</section>


<!-- SECTION FAKULTAS -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center">

    <h2 class="text-3xl font-bold mt-4 text-gray-800">
        Fakultas ITB STIKOM Bali
    </h2>

    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
        Semua fakultas unggulan untuk mendukung karier di era digital.
    </p>

    <!-- CARDS -->
    <div class="grid md:grid-cols-3 gap-8 mt-12 text-left">

        <?php foreach ($fakultas as $f): ?>

            <div class="bg-white p-6 rounded-xl border-2 border-gray-300 hover:border-[#1E459F] shadow-sm hover:shadow-xl hover:-translate-y-2 hover:scale-[1.02] transition-all duration-300 ease-in-out">

                <!-- ICON (opsional nanti dari DB) -->
                <i class="fi fi-rr-computer text-3xl text-[#1E459F] mb-4"></i>

                <!-- NAMA -->
                <h3 class="font-semibold text-lg mb-2">
                    <?= $f['nama'] ?>
                </h3>

                <!-- DESKRIPSI -->
                <p class="text-sm text-gray-500 mb-3">
                    <?= $f['deskripsi'] ?>
                </p>

                <!-- LABEL -->
                <p class="text-sm font-medium text-gray-700 mb-2">
                    Berikut program studi:
                </p>

                <!-- LIST PRODI -->
                <ul class="space-y-2 text-sm">

                    <?php foreach ($f['prodi'] as $p): ?>

                        <li>
                            <a href="<?= base_url('prodi/' . $p['slug']) ?>"
                                class="text-gray-600 hover:text-[#1E459F] hover:underline transition">

                                <?= esc($p['nama']) ?>

                            </a>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>

        <?php endforeach; ?>

    </div>

</section>



<!-- SCRIPT ANIMASI -->
<script>
    const reveals = document.querySelectorAll(".reveal");

    function revealOnScroll() {
        reveals.forEach(el => {
            const windowHeight = window.innerHeight;
            const elementTop = el.getBoundingClientRect().top;

            if (elementTop < windowHeight - 80) {
                el.style.opacity = 1;
                el.style.transform = "translateY(0)";
            }
        });
    }

    reveals.forEach(el => {
        el.style.opacity = 0;
        el.style.transform = "translateY(40px)";
        el.style.transition = "all 0.7s ease";
    });

    window.addEventListener("scroll", revealOnScroll);
    window.addEventListener("load", revealOnScroll);

    // 🔥 INI YANG KURANG
    revealOnScroll();
</script>

<?= $this->endSection() ?>