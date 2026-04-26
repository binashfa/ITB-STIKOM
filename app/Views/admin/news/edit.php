<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-6">

        <!-- TITLE -->
        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Edit News
        </h2>

        <form action="/admin/news/update/<?= $news['id'] ?>" method="post" enctype="multipart/form-data" class="space-y-5">

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Title</label>
                <input type="text" name="title"
                    value="<?= $news['title'] ?>"
                    class="w-full mt-1 p-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1E459F]">
            </div>

            <!-- CONTENT -->
            <div>
                <label class="text-sm text-gray-600">Content</label>
                <textarea name="content" rows="6"
                    class="w-full mt-1 p-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1E459F]"><?= $news['content'] ?></textarea>
            </div>

            <!-- AUTHOR -->
            <div>
                <label class="text-sm text-gray-600">Author</label>
                <input type="text" name="author"
                    value="<?= $news['author'] ?>"
                    class="w-full mt-1 p-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#1E459F]">
            </div>

            <!-- IMAGE -->
            <div>
                <label class="text-sm text-gray-600">Image</label>

                <?php if (!empty($news['image'])): ?>
                    <img src="<?= base_url('uploads/' . $news['image']) ?>"
                        class="w-32 h-20 object-cover rounded mb-2">
                <?php endif; ?>

                <input type="file" name="image"
                    class="w-full text-sm border p-2 rounded-lg bg-gray-50">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 pt-4">

                <a href="/admin/news"
                    class="px-4 py-2 border rounded text-sm text-gray-600 hover:bg-gray-100">
                    Cancel
                </a>

                <button type="submit"
                    class="bg-[#1E459F] text-white px-5 py-2 rounded text-sm hover:bg-[#163a85] transition">
                    Update News
                </button>

            </div>

        </form>

    </div>

</div>