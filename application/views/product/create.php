<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="<?= site_url('product/store') ?>" method="post">
    <label>Nama Produk:</label>
    <input type="text" name="product_name" value="<?= set_value('product_name') ?>" required>
    <?= form_error('product_name', '<p style="color:red">', '</p>') ?><br>
    
    <label>Harga:</label>
    <input type="number" name="price" value="<?= set_value('price') ?>" required>
    <?= form_error('price', '<p style="color:red">', '</p>') ?><br>
    
    <label>Deskripsi:</label>
    <textarea name="description"><?= set_value('description') ?></textarea>
    <?= form_error('description', '<p style="color:red">', '</p>') ?><br>
    
    <button type="submit">Simpan</button>

    <form action="<?= site_url('product/store') ?>" method="post" enctype="multipart/form-data">
    <label>Nama Produk:</label>
    <input type="text" name="product_name" required><br>
    
    <label>Harga:</label>
    <input type="number" name="price" required><br>
    
    <label>Deskripsi:</label>
    <textarea name="description"></textarea><br>

    <label>Upload Gambar:</label>
    <input type="file" name="product_image" accept="image/*"><br>
    
    <button type="submit">Simpan</button>
</form>

</form>
</body>
</html>