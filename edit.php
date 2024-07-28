<?php
include 'database.php';
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Data User</h1>
    <form action="proses.php?aksi=edit" method="post">
        <?php
        foreach($db->edit($_GET['id']) as $edit){
        ?>
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="hidden" name="id" value="<?php echo $edit['id'] ?>"><input type="text" name="nama" value="<?php echo $edit['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td><input type="text" name="alamat" value="<?php echo $edit['alamat'] ?>"></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia" value="<?php echo $edit['usia'] ?>"></td>
            </tr>
            <tr>
                <td><a href="tampil.php">Kembali</a></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
        <?php } ?>
    </form>
</body>
</html>