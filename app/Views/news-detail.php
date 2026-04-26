<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">

<div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-12 gap-6">

    <aside class="col-span-2 hidden md:block">
    </aside>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="col-span-12 md:col-span-7">

        <!-- BACK -->
        <a href="/news" class="text-sm text-gray-500 hover:text-blue-600 mb-4 inline-block">
            ← Back to News
        </a>

        <!-- TITLE -->
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
            <?= $news['title'] ?>
        </h1>

        <!-- META -->
        <p class="text-sm text-gray-500 mb-6">
            <?= $news['author'] ?> • <?= date('d M Y', strtotime($news['created_at'])) ?>
        </p>

        <!-- IMAGE -->
        <img src="<?= base_url('uploads/'.$news['image']) ?>"
            class="w-full h-[350px] object-cover rounded-xl mb-6">

        <!-- CONTENT -->
        <div class="text-gray-700 leading-relaxed space-y-4 text-sm text-justify">
            <?= nl2br($news['content']) ?>
        </div>

    </main>

    <!-- ================= RIGHT SIDEBAR ================= -->
    <aside class="col-span-3 hidden md:block">

    </aside>

</div>

<?= $this->endSection() ?>