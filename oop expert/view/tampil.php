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
    <form action="tampil.php" method="get">
        <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
        <input type="submit" value="Cari">
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
<?php
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $list_buku = $model->cari($cari);
    }else{
        $list_buku = $model->tampilbuku();
    }
    if(!empty($list_buku)){
    $no = 1;
    foreach($list_buku as $buku){
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
        <?php } 
        }else{
        echo '<tr><td colspan="5">Belum ada data Buku</td></tr>';
        } ?>
    </table>
</body>
</html>
<?php }else{
    echo '<script>alert("Anda Blum Login"); window.location="../login.php";</script>';
} ?>
