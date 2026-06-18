document.querySelectorAll(".produk-card button").forEach(function (btn) {
    btn.addEventListener("click", function () {
        btn.classList.add("klik-animasi");

        setTimeout(function () {
            btn.classList.remove("klik-animasi");
        }, 200);
    });
});