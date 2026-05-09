document.addEventListener("DOMContentLoaded", function () {

    // ===== BUDGET =====
    const budget = 100000;


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


        // ===== UPDATE TOTAL =====
        const totalPrice =
            document.getElementById("total-price");

        totalPrice.innerText =
            "Rp " + formatRupiah(total);


        // ===== UPDATE PROGRESS =====
        const progress =
            document.querySelector(".progress-fill");

        let percent =
            (total / budget) * 100;

        progress.style.width =
            percent + "%";


        // ===== UPDATE INFO =====
        const budgetInfo =
            document.getElementById("budget-info");

        budgetInfo.innerText =
            "Digunakan Rp " +
            formatRupiah(total) +
            " dari Rp " +
            formatRupiah(budget);


        // ===== WARNING =====
        const warning =
            document.getElementById("budget-warning");


        if (total > budget) {

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

        }

        else {

            alert("Kode promo tidak valid.");

        }

    }


    // ===== LOAD AWAL =====
    updateCart();

});