<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="<?php echo site_url('product/create'); ?>">Tambah Produk</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->product_name; ?></td>
            <td><?php echo $product->price; ?></td>
            <td><?php echo $product->description; ?></td>
            <td>
                <a href="<?php echo site_url('product/edit/'.$product->id); ?>">Edit</a>
                <a href="<?php echo site_url('product/delete/'.$product->id); ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <form action="<?= site_url('product/search'); ?>" method="post">
        <input type="text" name="keyword" placeholder="Cari Produk..." required>
        <button type="submit">Cari</button>
    </form>

</body>
</html>