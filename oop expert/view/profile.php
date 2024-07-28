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
    <h1>Profile Anda</h1>
    <form action="../controller/controller.php?aksi=updateprofile" method="post">
        <table>
            <?php
            foreach($model->editprofile($_GET['id']) AS $profile){
            ?>
            <tr>
                <td>Nama</td>
                <td><input type="hidden" name="id_user" value="<?php echo $profile['id_user'] ?>"> <input type="text" name="nama" value="<?php echo $profile['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $profile['username'] ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><a href="../index.php">Kembali</a></td>
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