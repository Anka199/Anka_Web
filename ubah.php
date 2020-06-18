<?php

$databaseHost = "localhost";
$databaseName = "arkademy";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

function query($query)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $nama = htmlspecialchars($_POST["nama_produk"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);

    // query insert data
    $query = "UPDATE produk SET
                nama_produk = '$nama',
                keterangan = '$keterangan',
                harga = '$harga',
                jumlah = '$jumlah'
                WHERE id = $id ";

    mysqli_query($mysqli, $query);

    if (isset($_POST) > 0) {
        echo "
 <script>
     alert('Data berhasil di ubah');
     document.location.href = 'index.php';
 </script>
 ";
    } else {
        echo "
 <script>
     alert('Data gagal di ubah');
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
    <title>Ubah data</title>
</head>

<body>
    <h1>ubah data </h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
        <ul>
            <li>
                <label for="nama_produk">nama : </label>
                <input type="text" name="nama_produk" id="nama_produk" required value="<?= $produk["nama_produk"] ?>">
            </li>
            <li>
                <label for="keterangan">keterangan : </label>
                <input type="text" name="keterangan" id="keterangan" required value="<?= $produk["keterangan"] ?>">
            </li>
            <li>
                <label for="harga">harga : </label>
                <input type="number" name="harga" id="harga" required value="<?= $produk["harga"] ?>">
            </li>
            <li>
                <label for="jumlah">jumlah : </label>
                <input type="number" name="jumlah" id="jumlah" required value="<?= $produk["jumlah"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>

</body>

</html>