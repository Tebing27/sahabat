<?php

include("config.php");
$id = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM crud WHERE id='$id'");
$data = mysqli_fetch_array($sql);

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];

    $result = mysqli_query($conn, "UPDATE crud SET nama='$nama', jenis_kelamin='$jk' WHERE id=$id");
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body style="margin: 15rem;">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        Nama: <input type="text" name="nama" value="<?php echo $data['nama']?>">
        <br><br>
        Jenis Kelamin: <br>
        <input type="radio" name="jk" id="" value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo'checked'?>>Perempuan
        <input type="radio" name="jk" id="" value="Laki-Laki" <?php if($data['jenis_kelamin'] == 'Laki-Laki') echo'checked'?>>Laki-Laki
        <br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>
