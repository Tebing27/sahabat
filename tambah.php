<?php

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    
    include("config.php");

    $result = mysqli_query($conn, "INSERT INTO crud(nama, jenis_kelamin) VALUES('$nama', '$jk')");
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body style="margin: 15rem;">
    <form action="tambah.php" method="post">
        Nama: <input type="text" name="nama" id="">
        <br><br>
        Jenis Kelamin: <br>
        <input type="radio" name="jk" id="" value="Perempuan">Perempuan
        <input type="radio" name="jk" id="" value="Laki-Laki">Laki-Laki
        <br><br>
        <input type="submit" name="submit" value="Tambah">
    </form>
</body>
</html>
