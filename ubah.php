<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$krywn = query("SELECT * FROM calon_karyawan WHERE id = $id")[0];



//cek tombol submit
if( isset($_POST["submit"]) ) {
    

    //cek apakah data berhasil
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah data calon karyawan</title>
</head>
<body>
    <h1>Ubah Data Calon Karyawan</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $krywn['id']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $krywn['foto']; ?>">
        <ul>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required value="<?= $krywn["nama"]; ?>">
            </li>
            <br>
            <li>
                <label for="nama">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $krywn["alamat"]; ?>">
            </li>
            <br>
            <li>
                <label for="nama">Tgl_lahir:</label>
                <input type="text" name="tgl_lahir" id="tgl_lahir" required value="<?= $krywn["tgl_lahir"]; ?>">
            </li>
            <br>
            <li>
                <label for="nama">Email:</label>
                <input type="text" name="email" id="email" required value="<?= $krywn["email"]; ?>">
            </li>
            <br>
            <li>
                <label for="nama">Foto:</label><br>
                <img src="img/<?= $krywn['foto']; ?>" width="40"><br>
                <input type="file" name="foto" id="foto">
            </li>
            <br><br>
           
                <button type="submit" name="submit">PERBARUI</button>
          
        </ul>

    </form>




</body>
</html>