<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="relative h-[500px] flex items-center overflow-hidden">

	<!-- BACKGROUND IMAGE -->
	<img src="https://tse3.mm.bing.net/th/id/OIP.CmLwqAvHHx37-ry56HEdQQHaFH?rs=1&pid=ImgDetMain&o=7&rm=3"
		class="absolute inset-0 w-full h-full object-cover">

	<!-- OVERLAY KIRI -->
	<div class="absolute inset-0 bg-gradient-to-r from-[#0f1e3a]/90 via-[#0f1e3a]/70 to-transparent"></div>

	<!-- CONTENT -->
	<div class="relative max-w-7xl mx-auto px-6 text-white reveal">

		<p class="text-sm text-gray-300 mb-2">
			ITB STIKOM Bali
		</p>

		<h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
			Sejarah Kampus
		</h1>

		<p class="text-gray-300 text-sm md:text-base max-w-xl mb-6">
			Perjalanan panjang ITB STIKOM Bali dalam mencetak generasi unggul
			di bidang teknologi, bisnis, dan inovasi digital.
		</p>

	</div>

</section>
<section class="max-w-7xl mx-auto px-6 py-16">

	<div class="max-w-3xl mx-auto space-y-8">

		<!-- IMAGE 1 -->
		<img src="<?= base_url('uploads/' . $profil['gambar1']) ?>"
			class="w-full h-full object-cover rounded-xl shadow-md">

		<!-- CONTENT -->
		<div>

			<h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 text-center">
				<?= $profil['judul'] ?>
			</h2>

			<p class="text-gray-600 text-sm leading-relaxed text-justify">
				<?= $profil['deskripsi'] ?>
			</p>

		</div>

		<!-- IMAGE 2 -->
		<img src="<?= base_url('uploads/' . $profil['gambar2']) ?>"
			class="w-full h-full object-cover rounded-xl shadow-md">

	</div>

</section>

<?= $this->endSection() ?>