<?php

$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : "Minuman";

// DATA PRODUK
$allProducts = [
    "Makanan" => [
        [
            "img" => "../assets/img/bayam.jpg",
            "tag" => "BAYAM",
            "name" => "Bayam Organik Lokal",
            "price" => "Rp 12.500",
            "fill" => "70%"
        ],
        [
            "img" => "../assets/img/wortel.jpg",
            "tag" => "WORTEL",
            "name" => "Wortel Organik",
            "price" => "Rp 18.000",
            "fill" => "45%"
        ]
    ],
    "Minuman" => [
        [
            "img" => "../assets/img/susu.jpg",
            "tag" => "SUSU ALMOND",
            "name" => "Susu Almond Murni",
            "price" => "Rp 45.500",
            "fill" => "75%"
        ]
    ]
];

$products = $allProducts[$kategori];

?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Groceria Search</title>

<link rel="stylesheet" href="../assets/css/pages/search.css" />

<style>
.products { display:none; }
#loading { display:none; padding:20px; }
.suggestions {
    background:white;
    position:absolute;
    width:300px;
    z-index:99;
    border:1px solid #ddd;
}
.suggestion-item {
    padding:10px;
    cursor:pointer;
}
.suggestion-item:hover {
    background:#f2f2f2;
}
</style>

</head>

<body>

<header>
    <div class="logo">Groceria</div>

    <nav>
        <span>Promosi</span>
        <span>Lokasi Toko</span>
    </nav>

    <!-- SEARCH -->
    <div class="search-wrapper" style="position:relative;">
        <input class="search-bar" id="searchInput" type="text" placeholder="Cari produk...">
        <div id="suggestions" class="suggestions"></div>
    </div>
</header>

<div class="wrapper">

<!-- SIDEBAR (TETAP UTUH, TIDAK DIHAPUS) -->
<aside class="sidebar">

<h3>Kategori</h3>

<a href="?kategori=Makanan" class="category <?= $kategori == 'Makanan' ? 'active' : '' ?>">
Makanan
</a>

<a href="?kategori=Minuman" class="category <?= $kategori == 'Minuman' ? 'active' : '' ?>">
Minuman
</a>

<div class="category">Perawatan Tubuh</div>
<div class="category">Kebutuhan Rumah</div>

<div class="budget-box">
<p>Estimasi Belanja</p>
<h2>Rp 145.000</h2>
<small>65% dari target harian Anda</small>
</div>

</aside>

<!-- MAIN -->
<section class="main">

<h1>Hasil pencarian <?= $kategori ?></h1>

<p id="statusText">Ketik minimal 3 huruf untuk mencari produk</p>

<!-- LOADING -->
<div id="loading">Loading...</div>

<!-- PRODUCTS -->
<div class="products" id="products"></div>

</section>

</div>

<footer>© 2026 GROCERIA</footer>

<script>

const input = document.getElementById("searchInput");
const suggestions = document.getElementById("suggestions");
const products = document.getElementById("products");
const loading = document.getElementById("loading");
const statusText = document.getElementById("statusText");

const data = [
<?php foreach ($products as $p): ?>
{
    name: "<?= $p['name'] ?>",
    img: "<?= $p['img'] ?>",
    tag: "<?= $p['tag'] ?>",
    price: "<?= $p['price'] ?>",
    fill: "<?= $p['fill'] ?>"
},
<?php endforeach; ?>
];

// =====================
// SEARCH INPUT
// =====================
input.addEventListener("input", function () {

    let value = this.value.toLowerCase();
    suggestions.innerHTML = "";

    // reset UI
    products.style.display = "none";
    loading.style.display = "none";

    if (value.length < 3) {
        statusText.innerText = "Ketik minimal 3 huruf untuk mencari produk";
        return;
    }

    statusText.innerText = "";

    let found = data.filter(item =>
        item.name.toLowerCase().includes(value)
    );

    found.forEach(item => {
        suggestions.innerHTML += `
            <div class="suggestion-item" onclick='selectProduct(${JSON.stringify(item)})'>
                ${item.name}
            </div>
        `;
    });

});

// =====================
// SELECT PRODUCT
// =====================
function selectProduct(item) {

    input.value = item.name;
    suggestions.innerHTML = "";

    loading.style.display = "block";
    products.style.display = "none";

    setTimeout(() => {

        loading.style.display = "none";
        products.style.display = "grid";

        products.innerHTML = `
            <div class="card">
                <img src="${item.img}">
                <div class="tag">${item.tag}</div>
                <div class="name">${item.name}</div>
                <div class="price">${item.price}</div>

                <div class="progress">
                    <div class="fill" style="width:${item.fill}"></div>
                </div>

                <button>Tambah ke Keranjang</button>
            </div>
        `;

    }, 700);

}

</script>

</body>
</html>