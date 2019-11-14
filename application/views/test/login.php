<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Laboran</title>
</head>

<body>
    <?php echo form_open('Laboran_controller/login'); ?>

    <label for="user">Username</label>
    <input type="text" name="user" id="u"><br>

    <label for="pass">Password</label>
    <input type="text" name="pass" id="p"><br>

    <input type="submit" value="submit">

    <?php echo form_close(); ?>
</body>

</html>