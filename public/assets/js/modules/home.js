document.querySelectorAll(".produk-card button").forEach(function (btn) {
    btn.addEventListener("click", function () {
        btn.classList.add("klik-animasi");

        setTimeout(function () {
            btn.classList.remove("klik-animasi");
        }, 200);
    });
});

document.querySelectorAll('.btn-add-cart').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const productId = this.dataset.id;

        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ product_id: productId, qty: 1 }),
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                }
            })
            .catch(() => alert('Gagal menambahkan ke keranjang'));
    });
});