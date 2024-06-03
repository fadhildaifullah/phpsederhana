<?php
require 'functions.php';

if( isset($_POST["register"])) {

    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>

<h1>Halaman Registrasi</h1>
<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" autocomplete="off">
        </li>
        <br>
        <li>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </li>
        <br>
        <li>
            <label for="password2">Konfirmasi password:</label>
            <input type="password" name="password2" id="password2">
        </li>
        <br>
        
            <button type="submit" name="register" href="index.php">Register</button>
       
    </ul>

</form>    

</body>
</html>