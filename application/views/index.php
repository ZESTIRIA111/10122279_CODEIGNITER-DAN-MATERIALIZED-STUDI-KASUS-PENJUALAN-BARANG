<!DOCTYPE html>
<html>
<head>
	<!-- Compiled and minified CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<title>403 Forbidden</title>
</head>
<body>

<p>Directory access is forbidden.</p>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product->id; ?></td>
        <td><?= $product->product_name; ?></td>
        <td><?= $product->price; ?></td>
        <td><?= $product->description; ?></td>
        <td>
            <a href="<?= site_url('product/edit/'.$product->id); ?>">Edit</a>
            <a href="<?= site_url('product/delete/'.$product->id); ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <?= $this->pagination->create_links(); ?>
</div>

</body>
</html>
