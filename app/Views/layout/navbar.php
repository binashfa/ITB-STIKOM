<style>
    .nav-item {
        position: relative;
        padding: 4px 8px;
        font-weight: 600;
        color: #1E2A47;
        cursor: pointer;
        transition: 0.3s;
    }

    .nav-item:hover {
        color: #1E2A47;
    }
</style>

<!-- NAVBAR -->
<nav class="fixed top-0 left-0 w-full z-50 bg-[#EFEFEF] shadow-sm">

    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="https://www.stikom-bali.ac.id/id/wp-content/uploads/2020/07/ITB-RESMI-300x300.png"
                class="h-14 w-14 object-contain">

            <div class="leading-tight">
                <p class="text-[10px] text-[#1E2A47] font-medium">
                    INSTITUT TEKNOLOGI DAN BISNIS
                </p>
                <p class="text-[18px] font-extrabold text-[#1E2A47]">
                    ITB STIKOM BALI
                </p>
            </div>
        </div>

        <!-- Menu Tengah -->
        <div class="flex-1 flex justify-center">
            <div class="hidden md:flex items-center gap-6 relative !no-underline" id="nav-container">

                <!-- UNDERLINE -->
                <div id="underline"
                    class="absolute bottom-0 h-[2px] bg-[#1E2A47] transition-all duration-300">
                </div>

                <?php $uri = service('uri')->getSegment(1); ?>

                <a href="<?= base_url() ?>" class="nav-item !no-underline" data-path="">Home</a>
                <a href="<?= base_url('news') ?>" class="nav-item !no-underline" data-path="news">News</a>
                <a href="<?= base_url('faculty') ?>" class="nav-item !no-underline" data-path="faculty">Faculty</a>
                <a href="<?= base_url('sejarah') ?>" class="nav-item !no-underline" data-path="sejarah">Sejarah</a>
                <a href="<?= base_url('profil') ?>" class="nav-item !no-underline" data-path="profil">Profil</a>

            </div>
        </div>

    </div>

</nav>

<div class="h-20"></div>
<script>
    const items = document.querySelectorAll(".nav-item");
    const underline = document.getElementById("underline");

    let lastX = 0;

    function moveUnderline(el) {
        const rect = el.getBoundingClientRect();
        const parentRect = el.parentElement.getBoundingClientRect();

        const newX = rect.left - parentRect.left;

        // DETEKSI ARAH GERAK
        if (newX > lastX) {
            // dari kiri ke kanan
            underline.style.transformOrigin = "left";
        } else {
            // dari kanan ke kiri
            underline.style.transformOrigin = "right";
        }

        underline.style.width = rect.width + "px";
        underline.style.transform = `translateX(${newX}px)`;

        lastX = newX;
    }

    // INIT ACTIVE
    window.addEventListener("load", () => {
        const currentPath = "<?= service('uri')->getSegment(1) ?>";

        items.forEach(item => {
            if (item.dataset.path === currentPath || (currentPath === "" && item.dataset.path === "")) {
                moveUnderline(item);
                item.style.color = "#1E2A47";
            }
        });
    });

    // HOVER
    items.forEach(item => {
        item.addEventListener("mouseenter", () => {
            moveUnderline(item);
        });
    });
</script>