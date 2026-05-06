function cekPromo() {

    // Munculkan popup input promo
    let kode = prompt("Silahkan masukkan kode promo Anda:");

    // Ambil elemen total dan diskon
    let elemenDiskon = document.querySelectorAll(".row.discount span")[1];
    let elemenTotal = document.getElementById("total-price");

    // Jika kode benar
    if (kode === "GROCERIA2026") {

        // Ambil angka total lama
        let totalLama = 83000;

        // Tambahan diskon 10rb
        let totalBaru = totalLama - 10000;

        // Ubah tampilan
        elemenDiskon.textContent = "-Rp 15.000";

        elemenTotal.textContent =
            "Rp " + totalBaru.toLocaleString("id-ID");

        // Efek visual
        elemenDiskon.style.color = "green";
        elemenTotal.style.color = "green";

        alert("Promo berhasil digunakan!");

    }

    // Jika kosong
    else if (kode === "" || kode === null) {

        alert("Anda belum memasukkan kode.");

    }

    // Jika salah
    else {

        alert("Kode promo tidak valid.");

    }

}