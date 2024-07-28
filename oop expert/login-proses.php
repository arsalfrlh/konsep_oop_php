<?php
session_start();

$host = "localhost";
$usr = "root";
$pass = "";
$db = "db_cobaan";

$connect = mysqli_connect($host,$usr,$pass,$db);

    $username = $_POST['username'];
    $password = $_POST['password'];
        $query = mysqli_query($connect,"SELECT * FROM tbl_user WHERE username='$username'");
        $sql = mysqli_fetch_array($query);
        if(
            md5($username) == md5($sql['username'])
            AND
            md5($password) == md5($sql['password'])
        )
        {
            $_SESSION['id_user'] = $sql['id_user'];
            $_SESSION['nama'] = $sql['nama'];
            $_SESSION['username'] = $sql['username'];
            $_SESSION['login'] = 1;
            echo '<script>alert("Login Berhasil"); window.location="index.php";</script>';
        }else{
            echo '<script>alert("Login Gagal"); window.location="login.php";</script>';
        }
?>