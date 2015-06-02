<?php
session_start();
if (!$_SESSION['AUTH']) {
    header('Location: ./log_err_V.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>Welcome <?php echo $_SESSION['user'];?></h2>
    <p>Logon successful</p>
</body>
</html>