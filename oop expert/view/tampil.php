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
    <h1>Data buku</h1>
    <a href="../index.php">Kembali</a>
    <a href="tambah-buku.php">Tambah</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    <?php
    $no = 1;
    foreach($model->tampilbuku() as $buku){
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><img src="<?php echo $buku['gambar'] ?>" width="50px"></td>
            <td><?php echo $buku['judul'] ?></td>
            <td><?php echo $buku['stok'] ?></td>
            <td><a href="edit-buku.php?id=<?php echo $buku['id_buku']; ?>">Edit</a>
            <a href="../controller/controller.php?id=<?php echo $buku['id_buku']; ?>&aksi=hapus">Hapus</a>
            <a href="pinjam-buku.php?id=<?php echo $buku['id_buku']; ?>">Pinjam</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php }else{
    echo '<script>alert("Anda Blum Login"); window.location="../login.php";</script>';
} ?>