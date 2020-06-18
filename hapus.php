<?php
$databaseHost = "localhost";
$databaseName = "arkademy";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$id = $_GET['id'];

$result = mysqli_query($mysqli, " DELETE FROM produk WHERE id=$id");

header("location:index.php");


if (hapus($id) > 0 ) {
    echo "
 <script>
     alert('Data berhasil di hapus');
     document.location.href = 'index.php';
 </script>
 ";
} else {
    echo "
 <script>
     alert('Data gagal di hapus');
     document.location.href = 'index.php';
 </script>
 ";
}
