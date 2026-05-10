document.addEventListener("DOMContentLoaded", function () {

    // ===== BUDGET =====
    const budget = 100000;

    // ===== DISKON STATE =====
    let discountPercent = 0;

    // ===== FORMAT RUPIAH =====
    function formatRupiah(angka) {

        return angka.toLocaleString("id-ID");

    }

    // ===== UPDATE CART =====
    function updateCart() {

        let total = 0;

        // Ambil semua item
        const items =
            document.querySelectorAll(".cart-item");

        items.forEach(function(item) {

            // ===== HARGA =====
            let price =
                Number(item.getAttribute("data-price"));

            if (isNaN(price)) {
                price = 0;
            }


            // ===== QTY =====
            const qtyElement =
                item.querySelector(".qty-value");

            let qty =
                Number(qtyElement.innerText);

            if (isNaN(qty)) {
                qty = 1;
            }


            // ===== SUBTOTAL =====
            let subtotal =
                price * qty;


            // Update subtotal
            const subtotalElement =
                item.querySelector(".subtotal-value");

            subtotalElement.innerText =
                formatRupiah(subtotal);

            // Tambah total
            total += subtotal;

        });

        // ===== HITUNG DISKON =====
        let discountAmount = total * discountPercent;
        let finalTotal = total - discountAmount;

        // Update elemen nominal diskon (contoh ID "discount-value")
        const discountElement = document.getElementById("discount-value");
        if (discountElement) {
            discountElement.innerText = "- Rp " + formatRupiah(discountAmount);
        }

        // ===== UPDATE TOTAL =====
        const totalPrice =
            document.getElementById("total-price");

        totalPrice.innerText =
            "Rp " + formatRupiah(finalTotal);


        // ===== UPDATE PROGRESS =====
        const progress =
            document.querySelector(".progress-fill");

        let percent =
            (finalTotal / budget) * 100;

        progress.style.width =
            percent + "%";


        // ===== UPDATE INFO =====
        const budgetInfo =
            document.getElementById("budget-info");

        budgetInfo.innerText =
            "Digunakan Rp " +
            formatRupiah(finalTotal) +
            " dari Rp " +
            formatRupiah(budget);


        // ===== WARNING =====
        const warning =
            document.getElementById("budget-warning");


        if (finalTotal > budget) {

            progress.style.background =
                "red";

            warning.innerText =
                "Budget melebihi batas!";

            warning.style.color =
                "red";

        }

        else {

            progress.style.background =
                "green";

            warning.innerText =
                "Budget masih aman.";

            warning.style.color =
                "green";

        }

    }

    // ===== BUTTON PLUS =====
    const plusButtons =
        document.querySelectorAll(".plus-btn");

    plusButtons.forEach(function(button) {

        button.addEventListener("click", function() {

            const qtyElement =
                this.parentElement.querySelector(".qty-value");

            let qty =
                Number(qtyElement.innerText);

            qty++;

            qtyElement.innerText = qty;

            updateCart();

        });

    });

    // ===== BUTTON MINUS =====
    const minusButtons =
        document.querySelectorAll(".minus-btn");


    minusButtons.forEach(function(button) {

        button.addEventListener("click", function() {

            const qtyElement =
                this.parentElement.querySelector(".qty-value");

            let qty =
                Number(qtyElement.innerText);

            if (qty > 1) {

                qty--;

                qtyElement.innerText = qty;

                updateCart();

            }

        });

    });

    // ===== PROMO =====
    window.cekPromo = function() {

        const kode =
            prompt("Masukkan kode promo:");

        if (kode === "GROCERIA2026") {

            alert("Promo berhasil digunakan!");
            
            discountPercent = 0.1; // Memberikan diskon 10%

            updateCart(); // Render ulang keranjang

        }

        else {

            alert("Kode promo tidak valid.");
            
            discountPercent = 0; // Mereset diskon
            
            updateCart(); // Render ulang keranjang tanpa diskon

        }

    }


    // ===== LOAD AWAL =====
    updateCart();

});