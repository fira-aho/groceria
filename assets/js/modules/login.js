function login() {

    // Ambil input
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    // Validasi sederhana
    if (email === "" || password === "") {

        alert("Email dan password wajib diisi.");

    }

    else {

        alert("Login berhasil!");

        // pindah halaman
        window.location.href = "home.html";

    }

}