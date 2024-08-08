<?php
session_start();
$login = $_SESSION['login'];
if($login == 1){
    include 'model/model.php';
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
    <table>
        <tr>
            <td>Logout</td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
        <tr>
            <td>Semua buku</td>
            <td><a href="view/tampil.php">disini</a></td>
        </tr>
        <tr>
            <td>Profile</td>
            <td><a href="view/profile.php?id=<?php echo $_SESSION['id_user'] ?>">disini</a></td>
        </tr>
        <tr>
            <td>Jumlah Buku</td>
            <td><?php echo $model->jumlahbuku() ?></td>
        </tr>
        <tr>
            <td>Jumlah User</td>
            <td><?php echo $model->jumlahuser() ?></td>
        </tr>
    </table>
</body>
</html>
<?php
}else{
    include 'login.php';
}
?>
