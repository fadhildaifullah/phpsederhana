<?php

//keneksi ke database
$conn = mysqli_connect("localhost", "root", "", "metro");



function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    //aambil data tiap elemen
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $email = htmlspecialchars($data["email"]);
   
    //upload foto
    $foto = upload();
    if( !$foto) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO calon_karyawan
                VALUES
                ('', '$nama', '$alamat', '$tgl_lahir', '$email', '$foto')";

    mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpNama = $_FILES['foto']['tmp_name'];

    //cek
    if ($error === 4) {
        echo "<script>
                alert('Silahkan masukan foto!!!');
            </script>";
        return false;
    }

    //cek file
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if( !in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File yang anda upload bukan foto!!!');
            </script>";
        return false;
    }

    //cek ukuran file
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran foto terlalu besar!!!');
            </script>";
        return false;
    }

    //nama foto
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;


    //lolos cek
    move_uploaded_file($tmpNama, 'img/' . $namaFileBaru);

    return $namaFileBaru;


}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE  FROM calon_karyawan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    //aambil data tiap elemen
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $email = htmlspecialchars($data["email"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    //cek foto 
    if( $_FILES['foto']['error'] === 4 ){
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }


    //query insert data
    $query = "UPDATE calon_karyawan SET
                nama = '$nama',
                alamat = '$alamat',
                tgl_lahir = '$tgl_lahir',
                email = '$email',
                foto = '$foto'
            WHERE id = $id
            ";

    mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);

}

function cari($keyword) {
    $query = "SELECT * FROM calon_karyawan WHERE
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                tgl_lahir LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username yang suda ada
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
        username = '$username'");

    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }


    //cek konfir pass
    if ( $password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesui!!');
                </script>";
        return false;
    }



    // enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah username ke database
    mysqli_query($conn, "INSERT INTO user VALUES('.', '$username'
    , '$password')");

    return mysqli_affected_rows($conn);

}



?>
