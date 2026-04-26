<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah News</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl rounded-xl shadow-lg p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Tambah News</h2>
            <a href="/admin/news" class="text-sm text-gray-500 hover:underline">
                Back
            </a>
        </div>

        <!-- FORM -->
        <form action="/admin/news/store" method="post" enctype="multipart/form-data" class="space-y-5">

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Title</label>
                <input type="text" name="title" placeholder="Masukkan judul"
                    class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#1E459F] ">
            </div>

            <!-- AUTHOR -->
            <div>
                <label class="text-sm text-gray-600">Author</label>
                <input type="text" name="author" placeholder="Nama penulis"
                    class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#1E459F] ">
            </div>

            <!-- CONTENT -->
            <div>
                <label class="text-sm text-gray-600">Content</label>
                <textarea name="content" rows="5" placeholder="Isi berita..."
                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#1E459F] "></textarea>
            </div>

            <!-- IMAGE -->
            <div>
                <label class="text-sm text-gray-600">Image</label>

                <div class="flex items-center gap-4 mt-2">
                    <!-- preview -->
                    <img id="preview" src="https://via.placeholder.com/100"
                        class="w-24 h-24 object-cover rounded-lg border">

                    <!-- input -->
                    <input type="file" name="image" id="imageInput"
                        class="text-sm file:bg-[#1E459F]  file:text-white file:px-4 file:py-2 file:rounded file:border-0">
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 pt-4">

                <a href="/admin/news"
                    class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-2 text-sm bg-[#1E459F]  text-white rounded hover:bg-orange-600 shadow">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<!-- JS PREVIEW IMAGE -->
<script>
document.getElementById("imageInput").addEventListener("change", function(e){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById("preview").src = reader.result;
    }
    reader.readAsDataURL(e.target.files[0]);
});
</script>

</body>
</html>