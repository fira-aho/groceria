function cekPromo() {
        var kode = prompt("Silahkan masukkan kode promo Anda:", "");

        var elemenDiskon = document.querySelectorAll(".row.discount span")[1];
        var elemenTotal = document.querySelectorAll(".total span")[1];

        if (kode == "GROCERIA2026") {
            // 1. Ambil teks total harga saat ini dari layar
            var teksTotalLama = elemenTotal.textContent;

            // 2. Bersihkan huruf "Rp " dan titik agar jadi angka murni (String ke Integer)
            var angkaTotalLama = parseInt(teksTotalLama.replace(/[^0-9]/g, ""));

            // 3. Proses Aritmatika
            var angkaTotalBaru = angkaTotalLama - 10000;

            // 4. Kembalikan angka tersebut jadi format Rupiah
            var teksTotalBaru = "Rp " + angkaTotalBaru.toLocaleString("id-ID").replace(/,/g, '.');

            // 5. Update hasilnya ke layar
            elemenDiskon.textContent = "-Rp 15.000"; // Ubah visual teks diskon
            elemenTotal.textContent = teksTotalBaru; // Update teks harga dengan hasil aritmatika

            // Efek visual tambahan
            elemenDiskon.style.color = "green";
            elemenTotal.style.color = "green";
            
            alert("Selamat! Anda mendapatkan tambahan diskon Rp 10.000.");
        } 
        else if (kode == "" || kode == null) {
            alert("Anda belum memasukkan kode apapun.");
        } 
        else {
            alert("Maaf, kode promo tidak valid.");
        }
    }