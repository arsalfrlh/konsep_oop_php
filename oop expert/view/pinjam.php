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
    <h1>Data Pinjam</h1>
    <a href="../index.php">Kembali</a>
    <a href="tambah-pinjam.php">Tambah</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    <?php
    $listpinjam = $model->tampilpinjam($_SESSION['id_user']);
    if(!empty($listpinjam)){
    $no = 1;
    foreach($listpinjam as $pinjam){
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><img src="<?php echo $pinjam['gambar'] ?>" width="50px"></td>
            <td><?php echo $pinjam['judul'] ?></td>
            <td><?php echo $pinjam['tanggal_pinjam'] ?></td>
            <td><?php echo $pinjam['tanggal_kembali'] ?></td>
            <td><?php echo $pinjam['jumlah'] ?></td>
            <td><a href="../controller/controller.php?id=<?php echo $pinjam['id_pinjam']; ?>&aksi=hapuspinjam">Hapus</a>
            <a href="../controller/controller.php?id=<?php echo $pinjam['id_pinjam']; ?>&aksi=kembalikan">Kembalikan</a></td>
        </tr>
        <?php } 
        }else{
            echo '<tr><td colspan="7">Tidak ada data pinjaman</td></tr>';
        } ?>
    </table>
</body>
</html>
<?php }else{
    echo '<script>alert("Anda Blum Login"); window.location="../login.php";</script>';
} ?>