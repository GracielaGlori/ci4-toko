<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .button-group a, .button-group button {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }
        .add-btn { background-color: #4CAF50; }
        .edit-btn { background-color: #008CBA; }
        .delete-btn { background-color: #f44336; border: none; }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p class="error"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <div class="button-group">
        <a href="/products/new" class="add-btn">Tambah Produk Baru</a>
    </div>

    <?php if (empty($products)): ?>
        <p>Belum ada produk.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>Rp<?= number_format($product['price'], 2, ',', '.') ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td class="button-group">
                            <a href="/products/<?= $product['id'] ?>" class="edit-btn">Detail</a>
                            <a href="/products/edit/<?= $product['id'] ?>" class="edit-btn">Edit</a>
                            <form action="/products/<?= $product['id'] ?>" method="post" style="display:inline-block;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>