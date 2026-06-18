const productsData = [
  {
    img: "img/susu",
    tag: "SUSU SEGAR",
    name: "Susu Murni Organik 1L",
    price: "Rp 28.500",
    fill: "75%",
  },
  {
    img: "https://images.unsplash.com/photo-1600093463592-8e36ae95ef56",
    tag: "PREMIUM IMPORT",
    name: "Almond Milk Unsweetened",
    price: "Rp 64.000",
    fill: "35%",
  },
  {
    img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b",
    tag: "NABATI",
    name: "Oat Milk Barista Edition",
    price: "Rp 42.000",
    fill: "55%",
  },
  {
    img: "https://images.unsplash.com/photo-1571212515416-fca88e1f56c9",
    tag: "OLAHAN",
    name: "Yogurt Plain 500g",
    price: "Rp 19.500",
    fill: "80%",
  },
];

const products = document.getElementById("products");

productsData.forEach((product) => {
  products.innerHTML += `
        <div class="card">
            <img src="${product.img}">
            <div class="tag">${product.tag}</div>
            <div class="name">${product.name}</div>
            <div class="price">${product.price}</div>

            <div class="progress">
                <div class="fill" style="width:${product.fill};"></div>
            </div>

            <button>Tambah ke Keranjang</button>
        </div>
    `;
});
