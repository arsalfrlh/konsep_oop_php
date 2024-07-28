<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi == "tambah"){
    $db->input($_POST['nama'],$_POST['alamat'],$_POST['usia']);
    echo '<script>alert("Tambah Data User Brhasil"); window.location="tampil.php";</script>';
}elseif($aksi == "hapus"){
    $db->hapus($_GET['id']);
    echo '<script>alert("Hapus Data User Brhasil"); window.location="tampil.php";</script>';
}elseif($aksi == "edit"){
    $db->update($_POST['id'],$_POST['nama'],$_POST['alamat'],$_POST['usia']);
    echo '<script>alert("Edit Data User Brhasil"); window.location="tampil.php";</script>';
}
?>