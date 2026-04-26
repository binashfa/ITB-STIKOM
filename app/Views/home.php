<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<section class="relative h-[500px] flex items-center text-white overflow-hidden">

	<!-- BACKGROUND IMAGE -->
	<img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644"
		class="absolute inset-0 w-full h-full object-cover">

	<!-- OVERLAY -->
	<div class="absolute inset-0 bg-gradient-to-r from-[#1E2A47]/90 to-[#1E2A47]/40"></div>

	<!-- CONTENT -->
	<div class="relative max-w-7xl mx-auto px-6 text-left">

		<p class="text-sm text-gray-300 mb-2">
			Explore The Best IT Education
		</p>

		<h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
			Mencetak Generasi Unggul <br>
			di Era Teknologi Digital
		</h1>

		<p class="text-gray-300 text-sm md:text-base max-w-xl mb-6">
			ITB STIKOM Bali menghadirkan pendidikan teknologi informasi
			berkualitas dengan kurikulum berbasis industri dan fasilitas modern.
		</p>

		<!-- BUTTON -->
		<div class="flex gap-4">
			<a href="https://siap.stikom-bali.ac.id/" class="bg-[#1E459F] hover:text-white hover:bg-[#1E459F] px-5 py-2 rounded-md text-sm transition !no-underline">
				Daftar Sekarang
			</a>

			<a href="/faculty" class="border border-white px-5 py-2 rounded-md text-sm hover:bg-white hover:text-black transition !no-underline">
				Lihat Program
			</a>
		</div>

	</div>
</section>
<div class="max-w-6xl mx-auto px-4">


	<!-- FITUR ICON -->
	<section class="py-16">

		<div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-6 items-start">

			<!-- LEFT TEXT -->
			<div>
				<h2 class="text-3xl font-bold text-gray-800 mb-4">
					Fasilitas & Keunggulan
				</h2>

				<p class="text-gray-600 mb-6 text-sm">
					ITB STIKOM Bali menyediakan lingkungan belajar yang modern,
					nyaman, dan berbasis teknologi untuk mendukung kesuksesan mahasiswa.
				</p>
			</div>

			<!-- RIGHT CARDS -->
			<div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">

				<!-- CARD 1 (highlight) -->
				<div class="bg-[#1E459F] text-white p-6 rounded-xl shadow-md  hover:-translate-y-2 hover:rotate-1 transition">
					<i class="fi fi-rr-marker text-2xl mb-3"></i>
					<h4 class="font-semibold mb-2">Suasana</h4>
					<p class="text-sm opacity-80">
						Nyaman & kondusif untuk belajar
					</p>
				</div>

				<!-- CARD -->
				<div class="bg-white p-6 rounded-xl shadow-md hover:-translate-y-2 hover:rotate-1 transition">
					<i class="fi fi-rr-trophy text-2xl text-[#1E459F] mb-3"></i>
					<h4 class="font-semibold text-gray-800 mb-2">Program Unggulan</h4>
					<p class="text-sm text-gray-500">
						Kurikulum berbasis industri
					</p>
				</div>

				<div class="bg-white p-6 rounded-xl shadow-md hover:-translate-y-2 hover:rotate-1 transition">
					<i class="fi fi-rr-building text-2xl text-[#1E459F] mb-3"></i>
					<h4 class="font-semibold text-gray-800 mb-2">Fasilitas Lengkap</h4>
					<p class="text-sm text-gray-500">
						Lab modern & teknologi terbaru
					</p>
				</div>

				<div class="bg-white p-6 rounded-xl shadow-md hover:-translate-y-2 hover:rotate-1 transition">
					<i class="fi fi-rr-users text-2xl text-[#1E459F] mb-3"></i>
					<h4 class="font-semibold text-gray-800 mb-2">Jaringan Alumni</h4>
					<p class="text-sm text-gray-500">
						Terhubung dengan profesional
					</p>
				</div>

			</div>

		</div>

	</section>

	<!-- FITUR -->
	<div class="mt-14 text-center">
		<h3 class="text-3xl font-bold">Program Studi Unggulan</h3>

		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">

			<?php if (!empty($prodi)): ?>

				<?php foreach ($prodi as $p): ?>

					<a href="<?= base_url('prodi/' . $p['slug']) ?>"
						class="block bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:-translate-y-2 hover:shadow-xl !no-underline">

						<!-- IMAGE -->
						<img src="<?= !empty($p['image'])
										? base_url('uploads/' . $p['image'])
										: 'https://via.placeholder.com/300x200' ?>"
							class="w-full h-40 object-cover">

						<div class="p-4 text-left">

							<p class="text-xs text-gray-400 mb-2">
								Program Studi
							</p>

							<!-- NAMA -->
							<h4 class="font-semibold text-gray-800">
								<?= esc($p['nama']) ?>
							</h4>

							<!-- DESKRIPSI -->
							<p class="text-gray-400 text-sm mt-1">
								<?= !empty($p['deskripsi'])
									? (strlen($p['deskripsi']) > 120
										? substr($p['deskripsi'], 0, 120) . '...'
										: $p['deskripsi'])
									: 'Deskripsi belum tersedia' ?>
							</p>

						</div>

						<!-- BUTTON -->
						<div class="bg-[#1E459F] text-white text-sm px-4 py-2 flex items-center justify-between group">
							<span>Learn More</span>
							<i class="fi fi-rr-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
						</div>

					</a>

				<?php endforeach; ?>

			<?php else: ?>

				<!-- EMPTY STATE -->
				<p class="text-gray-400">Belum ada data program studi</p>

			<?php endif; ?>

		</div>
	</div>

	<!-- QUICK LINK -->
	<section class="max-w-7xl mx-auto px-6 py-10">

		<!-- TITLE -->
		<h2 class="text-xl font-bold mb-6">Quick Links</h2>
		<div class="border-b mb-6"></div>

		<!-- GRID -->
		<div id="quickLinks" class="grid grid-cols-1 md:grid-cols-2 gap-6 ">

			<!-- ITEM -->
			<a href="https://siap.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-graduation-cap text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Penerimaan Mahasiswa Baru</h3>
					<p class="text-sm text-gray-500">Informasi pendaftaran mahasiswa baru.</p>
				</div>
			</a>

			<a href="https://elearning.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-book text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">E-Learning ITB STIKOM Bali</h3>
					<p class="text-sm text-gray-500">Akses pembelajaran online.</p>
				</div>
			</a>

			<a href="https://sion.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-database text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">SION (Sistem Informasi Online)</h3>
					<p class="text-sm text-gray-500">Portal akademik mahasiswa.</p>
				</div>
			</a>

			<a href="https://yudisium-wisuda.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-document text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Yudisium & Wisuda</h3>
					<p class="text-sm text-gray-500">Sistem pendaftaran wisuda.</p>
				</div>
			</a>

			<a href="https://sid.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-user text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Sistem Informasi Dosen (SID)</h3>
					<p class="text-sm text-gray-500">Portal khusus dosen.</p>
				</div>
			</a>

			<a href="http://eresearch.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-search text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">E-Research</h3>
					<p class="text-sm text-gray-500">Sistem penelitian kampus.</p>
				</div>
			</a>

			<a href="https://library.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-book-alt text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Digital Library</h3>
					<p class="text-sm text-gray-500">Perpustakaan digital kampus.</p>
				</div>
			</a>

			<a href="https://cdc.stikom-bali.ac.id/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-briefcase text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Career Development Center</h3>
					<p class="text-sm text-gray-500">Informasi karir & lowongan.</p>
				</div>
			</a>

			<a href="https://invest-virtual.co.id/itb-stikom-bali" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-chart-line-up text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Galeri Investasi</h3>
					<p class="text-sm text-gray-500">Edukasi investasi mahasiswa.</p>
				</div>
			</a>

			<a href="https://www.stikom-bali.ac.id/id/thai-cross-cultural-program-at-valaya-alongkorn-rajabhat-university-vru/" class="flex items-start gap-4 p-4 rounded-lg hover:bg-gray-100 transition group !no-underline">
				<i class="fi fi-rr-world text-2xl text-[#1E459F]"></i>
				<div>
					<h3 class="font-semibold group-hover:text-[#1E459F]">Thai Cross Cultural Program</h3>
					<p class="text-sm text-gray-500">Program internasional VRU.</p>
				</div>
			</a>

		</div>
	</section>

	<section class="max-w-7xl mx-auto px-6 py-10">

		<div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

			<!-- IMAGE (STYLE KANAN) -->
			<div class="relative">
				<div class=" rounded-[40px] p-4">
					<img src="https://www.stikom-bali.ac.id/id/wp-content/uploads/2025/07/stikom_2025_stikoman_resized-300x300.png"
						class="rounded-[30px] w-full object-contain">
				</div>

			</div>

			<!-- CONTENT (ISI KIRI) -->
			<div>

				<p class="text-sm text-[#315762] tracking-wide mb-2">
					DOWNLOAD STIKER
				</p>

				<h2 class="text-3xl font-bold text-[#1E2A47] mb-4">
					Ayo Download Stiker Stikoman
				</h2>

				<p class="text-[#1E2A47]/80 mb-6">
					Gunakan stiker resmi Stikoman untuk WhatsApp dan Telegram.
					Tersedia juga link Google Drive untuk akses lengkap semua stiker.
				</p>

				<!-- BUTTON -->
				<div class="flex flex-wrap gap-3 mb-4">

					<a href="https://wa.me/message/Y42L7O23BD2JL1"
						class="bg-[#F3E4C9] text-[#1E2A47] px-5 py-2 font-semibold hover:opacity-90 transition !no-underline">
						Sticker WhatsApp
					</a>

					<a href="https://t.me/addstickers/stikomanSTIKOMBALI"
						class="bg-[#1E2A47] text-white px-5 py-2 font-semibold hover:opacity-90 transition !no-underline">
						Sticker Telegram
					</a>

				</div>

				<a href="https://drive.google.com/drive/folders/1ScnKBKWcVlCsBH1dMHdancBUtsDcNNmJ"
					class="inline-block bg-[#315762]/10 text-[#315762] px-5 py-2 font-semibold hover:bg-[#315762]/20 transition !no-underline">
					Link Google Drive
				</a>

			</div>

		</div>

	</section>

	<!-- ARTIKEL -->
	<section class="max-w-7xl mx-auto px-6 py-10">

		<!-- TITLE -->
		<div class="flex items-center gap-2 mb-6">
			<h2 class="text-xl font-bold">Top Stories</h2>
		</div>

		<!-- CARDS -->
		<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

			<?php if (!empty($news)): ?>

				<?php foreach ($news as $n): ?>

					<a href="<?= base_url('news/' . $n['slug']) ?>" class="group cursor-pointer block !no-underline">

						<div class="overflow-hidden rounded-lg">
							<img src="<?= base_url('uploads/' . $n['image']) ?>"
								class="w-full h-40 object-cover transform group-hover:scale-110 transition duration-300">
						</div>

						<h3 class="mt-3 font-semibold text-sm group-hover:text-[#1E459F] transition ">
							<?= $n['title'] ?>
						</h3>

						<p class="text-xs text-gray-500 mt-1 ">
							<?= $n['author'] ?> • <?= date('d M Y', strtotime($n['created_at'])) ?>
						</p>

					</a>

				<?php endforeach; ?>

			<?php endif; ?>

		</div>
	</section>



</div>
<script>
	document.addEventListener("DOMContentLoaded", () => {
		const cards = document.querySelectorAll("#storyContainer > div");

		cards.forEach((card, index) => {
			card.style.opacity = 0;
			card.style.transform = "translateY(20px)";

			setTimeout(() => {
				card.style.transition = "all 0.5s ease";
				card.style.opacity = 1;
				card.style.transform = "translateY(0)";
			}, index * 150);
		});

		const items = document.querySelectorAll("#quickLinks a");

		items.forEach((item, i) => {
			item.style.opacity = 0;
			item.style.transform = "translateY(20px)";

			setTimeout(() => {
				item.style.transition = "all 0.4s ease";
				item.style.opacity = 1;
				item.style.transform = "translateY(0)";
			}, i * 100);
		});
	});
</script>
<script>
	feather.replace()
</script>

<?= $this->endSection() ?>