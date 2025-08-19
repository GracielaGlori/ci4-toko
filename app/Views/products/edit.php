<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; max-width: 500px; margin: 20px auto; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], input[type="number"], textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea { resize: vertical; min-height: 80px; }
        .error-message { color: red; font-size: 0.9em; margin-top: -10px; margin-bottom: 10px; display: block; }
        button {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #007bb5; }
        .back-link { display: block; margin-top: 15px; text-decoration: none; color: #008CBA; }
    </style>
</head>
<body>
    <h1>Edit Produk</h1>

    <form action="/products/<?= $product['id'] ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" value="<?= old('name', $product['name']) ?>">
            <?php if (session()->getFlashdata('errors.name')): ?>
                <span class="error-message"><?= session()->getFlashdata('errors.name') ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description"><?= old('description', $product['description']) ?></textarea>
            <?php if (session()->getFlashdata('errors.description')): ?>
                <span class="error-message"><?= session()->getFlashdata('errors.description') ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="price">Harga:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?= old('price', $product['price']) ?>">
            <?php if (session()->getFlashdata('errors.price')): ?>
                <span class="error-message"><?= session()->getFlashdata('errors.price') ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="stock">Stok:</label>
            <input type="number" id="stock" name="stock" value="<?= old('stock', $product['stock']) ?>">
            <?php if (session()->getFlashdata('errors.stock')): ?>
                <span class="error-message"><?= session()->getFlashdata('errors.stock') ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Update Produk</button>
        <a href="/products" class="back-link">Kembali ke Daftar Produk</a>
    </form>
</body>
</html>