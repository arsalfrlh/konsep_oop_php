<?php
session_start();
if($_SESSION['login'] == 1){
include '../model/model.php';
$model = new model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pinjam Buku</h1>
    <form action="../controller/controller.php?aksi=pinjambuku" method="post">
        <table>
            <?php
            foreach($model->editbuku($_GET['id']) as $buku){
            ?>
            <tr>
                <td>Gambar</td>
                <td><img src="<?php echo $buku['gambar'] ?>" width="50px"><input type="hidden" name="id_buku" value="<?php echo $buku['id_buku'] ?>"><input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $buku['judul'] ?>" readonly></td>
            </tr>
            <tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tgl_pinjam"></td>
            </tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah" value="<?php echo $buku['stok'] ?>"></td>
            </tr>
            <tr>
                <td><a href="tampil.php">Kembali</a></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>
<?php }else{
    echo '<script>alert("Anda Blum Login"); window.location="../login.php";</script>';
}
?>