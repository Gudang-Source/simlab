<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coba kelas laboran</title>
</head>

<body>
    <?php echo form_open('Laboran_controller/editLaboran') ?>
    <label for="a">NIP</label>
    <input type="text" name="id" id="nip"> <br>

    <label for="b">Nama</label>
    <input type="text" name="nama" id="nama"> <br>

    <label for="c">Prodi</label>
    <input type="text" name="prodi" id="prodi"> <br>

    <input type="submit" value="submit">
    <?php echo form_close(); ?>
</body>

</html>