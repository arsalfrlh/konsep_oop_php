<?php
include '../model/model.php';
$model = new model();
$aksi = $_GET['aksi'];
if($aksi == "tambahbuku"){
    $model->tambahbuku($_FILES['gambar']['name'],$_FILES['gambar']['tmp_name'],$_POST['judul'],$_POST['stok']);
    echo '<script>alert("Tambah Berhasil"); window.location="../view/tampil.php";</script>';
}elseif($aksi == "hapus"){
    $model->hapusbuku($_GET['id']);
    echo '<script>alert("Hapus Berhasil"); window.location="../view/tampil.php";</script>';
}elseif($aksi == "updatebuku"){
    $model->updatebuku($_POST['id_buku'],$_FILES['gambar']['name'],$_FILES['gambar']['tmp_name'],$_POST['judul'],$_POST['stok']);
    echo '<script>alert("Update Berhasil"); window.location="../view/tampil.php";</script>';
}elseif($aksi == "register"){
    $model->register($_POST['nama'],$_POST['username'],$_POST['password']);
    echo '<script>alert("Register Berhasil"); window.location="../login.php";</script>';
}elseif($aksi == "updateprofile"){
    $model->updateprofile($_POST['id_user'],$_POST['nama'],$_POST['username'],$_POST['password']);
    echo '<script>alert("Update Profile Berhasil"); window.location="../index.php";</script>';
}elseif($aksi == "pinjambuku"){
    $model->pinjambuku($_POST['id_user'],$_POST['id_buku'],$_POST['tgl_pinjam'],$_POST['jumlah']);
    echo '<script>alert("Pinjam Buku Berhasil"); window.location="../view/tampil.php";</script>';
}
?>