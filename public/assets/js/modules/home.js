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
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ product_id: productId, qty: 1 }),
        })
            .then(res => {
                // Tangani jika user belum login (error 401 dari middleware)
                if (res.status === 401) {
                    alert('Silakan login terlebih dahulu untuk mulai berbelanja.');
                    window.location.href = '/login';
                    throw new Error('Unauthorized'); // Hentikan proses fetch
                }
                return res.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                }
            })
            .catch((error) => {
                // Tampilkan alert error selain dari masalah belum login
                if (error.message !== 'Unauthorized') {
                    alert('Gagal menambahkan ke keranjang');
                }
            });
    });
});