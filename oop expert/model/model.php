<?php
class model{
    var $host = "localhost";
    var $usr = "root";
    var $pass = "";
    var $db = "db_cobaan";
    var $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host,$this->usr,$this->pass,$this->db);
    }

    function tampilbuku(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_buku");
        $hasil = [];
        while($buku=mysqli_fetch_array($query)){
            $hasil[] = $buku;
        }
        return $hasil;
    }

    function tambahbuku($namafoto,$tmp,$judul,$stok){
        $lokasi = '../assets/img/' . $namafoto;
        move_uploaded_file($tmp,$lokasi);
        mysqli_query($this->conn,"INSERT INTO tbl_buku VALUES ('','$lokasi','$judul','$stok')");
    }
    function hapusbuku($id){
        mysqli_query($this->conn,"DELETE FROM tbl_buku WHERE id_buku='$id'");
    }

    function editbuku($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_buku WHERE id_buku='$id'");
        while($buku=mysqli_fetch_array($query)){
            $hasil[] = $buku;
        }
        return $hasil;
    }

    function updatebuku($id,$namafoto,$tmp,$judul,$stok){
        if(!empty($namafoto)){
            $lokasi = '../assets/img/' . $namafoto;
            move_uploaded_file($tmp,$lokasi);
            mysqli_query($this->conn,"UPDATE tbl_buku SET gambar='$lokasi', judul='$judul',stok='$stok' WHERE id_buku='$id'");
        }else{
        mysqli_query($this->conn,"UPDATE tbl_buku SET judul='$judul',stok='$stok' WHERE id_buku='$id'");
        }
    }

    function register($nama,$username,$password){
        mysqli_query($this->conn,"INSERT INTO tbl_user (id_user,nama,username,password) VALUES ('','$nama','$username','$password')");
    }

    function editprofile($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_user WHERE id_user='$id'");
        while($profile=mysqli_fetch_array($query)){
            $hasil[] = $profile;
        }
        return $hasil;
    }

    function updateprofile($id,$nama,$username,$password){
        if(!empty($password)){
            mysqli_query($this->conn,"UPDATE tbl_user SET nama='$nama',username='$username',password='$password' WHERE id_user='$id'"); 
        }else{
            mysqli_query($this->conn,"UPDATE tbl_user SET nama='$nama',username='$username' WHERE id_user='$id'");
        }
    }
    
    function pinjambuku($id_user,$id_buku,$tgl_pinjam,$jumlah){
        mysqli_query($this->conn,"INSERT INTO tbl_pinjam (id_pinjam,id_user,id_buku,tanggal_pinjam,jumlah) VALUES ('','$id_user','$id_buku','$tgl_pinjam','$jumlah')");
    }
    
    function tampilpinjam($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_pinjam LEFT JOIN tbl_user ON tbl_pinjam.id_user = tbl_user.id_user LEFT JOIN tbl_buku ON tbl_pinjam.id_buku = tbl_buku.id_buku WHERE tbl_pinjam.id_user = '$id'");
        $hasil = [];
        while($pinjam = mysqli_fetch_array($query)){
            $hasil[] = $pinjam;
        }
        return $hasil;
    }

    function hapuspinjam($id){
        mysqli_query($this->conn,"DELETE FROM tbl_pinjam WHERE id_pinjam='$id'");
    }

    function kembalikan($id){
        $tgl_kembali = date('y-m-d');
        mysqli_query($this->conn,"UPDATE tbl_pinjam SET tanggal_kembali='$tgl_kembali', jumlah='0' WHERE id_pinjam='$id'");
    }
}
?>
