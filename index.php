<?php

    include("config.php");
    
    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $sql = mysqli_query($conn, "SELECT * FROM crud WHERE nama LIKE '%$search%'");
    }
    else{
        $sql = mysqli_query($conn, "SELECT * FROM crud");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD: PHP, MYSQL, DOCKER</title>
</head>
<body style="margin: 15rem; text-align: center;">
    <form action="" method="get">
        <input type="search" name="search" placeholder="Cari Nama..." value="<?php echo isset($_GET['search'])? $_GET['search']:""?>">
        <button type="submit">Cari</button>
        <button type="button"><a href="tambah.php">Tambah Data</a></button>
    </form>
    <br><br>

        <table border="1" style="margin:0 auto; border-collapse: collapse;">
            <thead>
                <tr>
                <th style="padding: 1rem 2rem;">Nomor</th>
                <th style="padding: 1rem 2rem;">Nama</th>
                <th style="padding: 1rem 2rem;">Jenis Kelamin</th>
                <th style="padding: 1rem 2rem;">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            if(mysqli_num_rows($sql) > 0){
                while($data = mysqli_fetch_array($sql)) {
                    echo"<tr>";
                    echo"<td>".$data['id']."</td>";
                    echo"<td>".$data['nama']."</td>";
                    echo"<td>".$data['jenis_kelamin']."</td>";
                    echo"<td><a href='edit.php?id=".$data['id']."'>Edit</a> | <a href='hapus.php?id=".$data['id']."'>Hapus</a></td>";
                    echo"</tr>";
                }           
            }
            else {
                echo "<tr><td colspan='4'>Data Tidak ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
