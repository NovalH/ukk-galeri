<!doctype html>
<html lang="en"> 
<head> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8"> 
    <title>REGISTER</title> 
</head> 
<body>
    <form action="proses_register.php" method="post">
        <div class="mb3">
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </div>
        <div class="mb3">
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </div>
        <div class="mb3">
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </div>
        <div class="mb3">
            <td>Nama Lengkap</td>
            <td><input type="text" name="namalengkap"></td>
        </div>
        <div class="mb3">
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </div>
        <button type="submit">register</button>
    </form>
</body>
</html>