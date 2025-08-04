<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .product-detail { background: #f9f9f9; padding: 20px; border-radius: 8px; max-width: 500px; margin: 20px auto; }
        .product-detail h2 { color: #333; }
        .product-detail p { margin-bottom: 10px; }
        .product-detail strong { display: inline-block; width: 100px; }
        .back-link { display: block; margin-top: 20px; text-decoration: none; color: #008CBA; }
    </style>
</head>
<body>
    <h1>Detail Produk</h1>

    <div class="product-detail">
        <h2><?= $product['name'] ?></h2>
        <p><strong>Deskripsi:</strong> <?= nl2br(esc($product['description'])) ?></p>
        <p><strong>Harga:</strong> Rp<?= number_format($product['price'], 2, ',', '.') ?></p>
        <p><strong>Stok:</strong> <?= $product['stock'] ?></p>
        <p><strong>Dibuat Pada:</strong> <?= $product['created_at'] ?></p>
        <p><strong>Diupdate Pada:</strong> <?= $product['updated_at'] ?></p>
    </div>

    <a href="/products" class="back-link">Kembali ke Daftar Produk</a>
</body>
</html>