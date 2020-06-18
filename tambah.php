<?php

$databaseHost = "localhost";
$databaseName = "arkademy";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


// cek apakah tombol submit sudah di klik atau belum
if (isset($_POST["submit"])) {

    $nama = htmlspecialchars($_POST["nama"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);

    // query insert data
    $query = "INSERT INTO produk
            VALUES
            ('','$nama', '$keterangan', '$harga', '$jumlah')
            ";
    mysqli_query($mysqli, $query);

    //cek apakah data berhasil atau gagal di Tambah
    if (isset($_POST) > 0) {
        echo "
 <script>
     alert('Data berhasil di tambahkan');
     document.location.href = 'index.php';
 </script>
 ";
    } else {
        echo "
 <script>
     alert('Data gagal di tambahkan');
     document.location.href = 'index.php';
 </script>
 ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
</head>

<body>
    <h1>Tambah data</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <!-- for berpasangan dengan id di bawah -->
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="keterangan">keterangan : </label>
                <input type="text" name="keterangan" id="keterangan" required>
            </li>
            <li>
                <label for="harga">harga : </label>
                <input type="number" name="harga" id="harga" required>
            </li>
            <li>
                <label for="jumlah">jumlah : </label>
                <input type="number" name="jumlah" id="jumlah" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>

</body>

</html>