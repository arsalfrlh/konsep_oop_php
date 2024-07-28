<?php
include 'database.php';
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD OOP</h1>

    <a href="input.php">Input Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Usia</th>
            <th>Opsi</th>
        </tr>
        <?php
        $no = 1;
        foreach($db->tampil_data() as $user){
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $user['nama'] ?></td>
        <td><?php echo $user['alamat'] ?></td>
        <td><?php echo $user['usia'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $user['id'] ?>">Edit</a>
            <a href="proses.php?id=<?php echo $user['id']; ?>&aksi=hapus">Hapus</a>
        </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>