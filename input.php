<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Data User</h1>
    <form action="proses.php?aksi=tambah" method="post">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia"></td>
            </tr>
            <tr>
                <td><a href="tampil.php">Kembali</a></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>