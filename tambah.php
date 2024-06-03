<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
//cek tombol submit
if( isset($_POST["submit"]) ) {
    
    //cek apakah data berhasil
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah data calon karyawan</title>
</head>
<body>
    <h1>Tambahkan Data Calon Karyawan</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <br>
            <li>
                <label for="nama">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <br>
            <li>
                <label for="nama">Tgl_lahir:</label>
                <input type="text" name="tgl_lahir" id="tgl_lahir" required>
            </li>
            <br>
            <li>
                <label for="nama">Email:</label>
                <input type="text" name="email" id="email" required>
            </li>
            <br>
            <li>
                <label for="nama">Foto:</label>
                <input type="file" name="foto" id="foto">
            </li>
            <br><br>
           
                <button type="submit" name="submit">TAMBAHKAN</button>
            
        </ul>

    </form>




</body>
</html>