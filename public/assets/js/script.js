const menuBtn = document.getElementById("menu-bar");
const navLinks = document.getElementById("navbar-link");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
    navLinks.classList.toggle("open");

    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

navLinks.addEventListener("click", (e) => {
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
});

const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};

ScrollReveal().reveal(".content-img img", {
    ...scrollRevealOption,
    origin: "right",
});
ScrollReveal().reveal(".content-title h1", {
    ...scrollRevealOption,
    delay: 500,
});
ScrollReveal().reveal(".content-title h3", {
    ...scrollRevealOption,
    delay: 1000,
});
ScrollReveal().reveal(".content-title p", {
    ...scrollRevealOption,
    delay: 1500,
});
ScrollReveal().reveal(".content-title .content-btn", {
    ...scrollRevealOption,
    delay: 2000,
});

$(document).ready(function() {
    // Tampilkan semua produk saat halaman dimuat
    const products = $('.filter-fakultas');

    function displayProducts(fakultasId) {
        products.each(function() {
            const fakultasCategory = $(this).data('category');
            if (fakultasId === 'all' || fakultasCategory == fakultasId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    displayProducts('all'); // Tampilkan semua produk saat halaman dimuat

    // Filter produk berdasarkan kategori yang dipilih
    $('#fakultasFilter').on('change', function() {
        const selectedCategory = $(this).val();
        displayProducts(selectedCategory);
    });
});
