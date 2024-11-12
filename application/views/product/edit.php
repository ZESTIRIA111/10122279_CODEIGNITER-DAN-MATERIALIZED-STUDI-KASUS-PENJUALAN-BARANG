<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="<?php echo site_url('product/update/'.$product->id); ?>" method="post">
        <label>Nama Produk:</label>
        <input type="text" name="product_name" value="<?php echo $product->product_name; ?>" required><br>
        
        <label>Harga:</label>
        <input type="number" name="price" value="<?php echo $product->price; ?>" required><br>
        
        <label>Deskripsi:</label>
        <textarea name="description"><?php echo $product->description; ?></textarea><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>