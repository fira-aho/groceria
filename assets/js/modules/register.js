function register() {

    // Ambil input
    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;


    // Validasi kosong
    if (
        nama === "" ||
        email === "" ||
        password === "" ||
        confirmPassword === ""
    ) {

        alert("Semua data wajib diisi.");

    }

    // Validasi password
    else if (password !== confirmPassword) {

        alert("Konfirmasi password tidak sesuai.");

    }

    // Jika berhasil
    else {

        alert("Registrasi berhasil!");

        // pindah halaman login
        window.location.href = "login.html";

    }

}