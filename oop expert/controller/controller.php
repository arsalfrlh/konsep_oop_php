<?php
include '../model/model.php';
$model = new model();
$aksi = $_GET['aksi'];
if($aksi == "tambahbuku"){
    $max_size = 2 * 1024 * 1024;
    $acc = array("image/png","image/jpg","image/jpeg");

    $namafoto = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $type = $_FILES['gambar']['type'];
    $size = $_FILES['gambar']['size'];

    if(in_array($type,$acc) && $size <= $max_size){
        $lokasi = '../assets/img' . $namafoto;
        move_uploaded_file($tmp,$lokasi);
        $model->tambahbuku($lokasi,$_POST['judul'],$_POST['stok']);
        echo '<script>alert("Tambah Buku Berhasil"); window.location="../view/tampil.php";</script>';
    }else{
        echo '<script>alert("Tambah Buku Gagal Type harus berupa png, jpg, jpeg dan max ukuran hanya 2mb"); window.history.back();</script>';
    }
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
}elseif($aksi == "hapuspinjam"){
    $model->hapuspinjam($_GET['id']);
    echo '<script>alert("Hapus  Pinjam Berhasil"); window.location="../view/pinjam.php";</script>';
}elseif($aksi == "kembalikan"){
    $model->kembalikan($_GET['id']);
    echo '<script>alert("Kembalikan Buku Berhasil"); window.location="../view/pinjam.php";</script>';
}
?>
