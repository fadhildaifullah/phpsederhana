<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM calon_karyawan WHERE 
            nama LIKE '%$keyword%' OR 
            alamat LIKE '%$keyword%' OR 
            tgl_lahir LIKE '%$keyword%'
        ";
$calon_karyawan = query($query);

?>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tgl_lahir</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $calon_karyawan as $row) : ?>
        
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["tgl_lahir"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td>
            <img src="img/<?php echo $row["foto"]; ?>"
            width="50">
        </td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">UBAH</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">HAPUS</a>
        </td>
    </tr>

    <?php $i++; ?>
    <?php endforeach; ?>

</table>