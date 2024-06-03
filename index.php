<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPrHalaman = 2;
$jumlahData = count(query("SELECT * FROM calon_karyawan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPrHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPrHalaman * $halamanAktif) - $jumlahDataPrHalaman;


$calon_karyawan = query ("SELECT * FROM calon_karyawan LIMIT $awalData, $jumlahDataPrHalaman");


// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $calon_karyawan = cari($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Calon Karyawan</title>
</head>
<body>

<a href="logout.php">Logout</a>
<h1>Daftar Calon Karyawan</h1>

<br>
<a href="tambah.php">TAMBAH DATA</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" size="35" autofocus 
    placeholder="masukan kayword pencarian.." autocomplete="off"
    id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari</button>
</form>
<br>

<!--Navigasi-->
<?php if($halamanAktif > 1) :?>
    <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if( $i == $halamanAktif) : ?>
        <a href="?halaman=<?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman ) :?>
    <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<div id="container">
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
</div>

<script src="js/script.js"></script>

</body>
</html>