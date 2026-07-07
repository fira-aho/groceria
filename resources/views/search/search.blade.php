<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groceria Search</title>

    <link rel="stylesheet" href="{{ asset('assets/css/pages/search.css') }}">

    <style>
        .products {
            display: none;
        }

        #loading {
            display: none;
            padding: 20px;
        }

        .suggestions {
            background: white;
            position: absolute;
            width: 300px;
            border: 1px solid #ddd;
            z-index: 10;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background: #f2f2f2;
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

    <div class="search-wrapper" style="position: relative;">
        <input class="search-bar" id="searchInput" type="text" placeholder="Cari produk...">
        <div id="suggestions" class="suggestions"></div>
    </div>

</header>

<div class="wrapper">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <h3>Kategori</h3>

        <div class="category">Makanan</div>
        <div class="category">Minuman</div>
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

        <h1>Hasil Pencarian</h1>

        <p id="statusText">
            Ketik minimal 3 huruf untuk mencari produk
        </p>

        <div id="loading">
            Loading...
        </div>

        <div class="products" id="products"></div>

    </section>

</div>

<footer>
    © 2026 GROCERIA
</footer>

<script>

const input = document.getElementById("searchInput");
const suggestions = document.getElementById("suggestions");
const products = document.getElementById("products");
const loading = document.getElementById("loading");
const statusText = document.getElementById("statusText");

// DATA PHP -> JS

const data = [

@foreach ($products as $p)

{
    name: "{{ $p->name }}",
    img: "{{ asset('assets/img') }}/{{ $p->image }}",
    tag: "<?= $p['tag'] ?>",
    price: "{{ $p->price }}",
    fill: "<?= $p['fill'] ?>"
},

@endforeach

];

// SEARCH

input.addEventListener("input", function () {

    const value = this.value.toLowerCase().trim();

    suggestions.innerHTML = "";

    products.style.display = "none";

    if (value.length < 3) {

        statusText.innerText = "Ketik minimal 3 huruf untuk mencari produk";

        return;
    }

    statusText.innerText = "";

    const found = data.filter(item =>
        item.name.toLowerCase().includes(value)
    );

    if (found.length === 0) {

        suggestions.innerHTML =
            '<div class="suggestion-item">Produk tidak ditemukan</div>';

        return;
    }

    found.forEach((item, index) => {

        suggestions.innerHTML += `
            <div class="suggestion-item" onclick="selectProduct(${index})">
                ${item.name}
            </div>
        `;

    });

});

// SELECT PRODUCT

function selectProduct(index) {

    const item = data[index];

    input.value = item.name;

    suggestions.innerHTML = "";

    loading.style.display = "block";

    products.style.display = "none";

    setTimeout(() => {

        loading.style.display = "none";

        products.style.display = "block";

        products.innerHTML = `

            <div class="card">

                <img src="${item.img}" alt="${item.name}">

                <div class="tag">${item.tag}</div>

                <div class="name">${item.name}</div>

                <div class="price">${item.price}</div>

                <div class="progress">
                    <div class="fill" style="width:${item.fill}"></div>
                </div>

                <form method="POST" action="">

                    <input type="hidden" name="name" value="${item.name}">
                    <input type="hidden" name="img" value="${item.img}">
                    <input type="hidden" name="price" value="${item.price}">

                    <button type="submit" name="add_to_cart">
                        Tambah ke Keranjang
                    </button>

                </form>

            </div>

        `;

    }, 600);

}

</script>

</body>
</html>