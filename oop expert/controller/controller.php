<?php
include '../model/model.php';
$model = new model();
$aksi = $_GET['aksi'];
if($aksi == "tambahbuku"){
    $namafoto = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $file_ext = strtolower(end(explode('.', $namafoto)));
    $size = $_FILES['gambar']['size'];

    $acc = array('jpg','jpeg','png');
    $max_size = 2 * 1024 * 1024;
    if(in_array($file_ext,$acc)){
        if($size <= $max_size){
            $lokasi = '../assets/img/' . $namafoto;
            if(move_uploaded_file($tmp,$lokasi)){
                $model->tambahbuku($lokasi,$_POST['judul'],$_POST['stok']);
                echo '<script>alert("Tambah Berhasil"); window.location="../view/tampil.php";</script>';
            }else{
                echo '<script>alert("Tambah Buku Gagal"); window.history.back();</script>';
            }
        }else{
            echo '<script>alert("Ukuran Terlalu Besar"); window.history.back();</script>';
        }
    }else{
        echo '<script>alert("File harus berupa gambar"); window.history.back();</script>';
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
}
?>
