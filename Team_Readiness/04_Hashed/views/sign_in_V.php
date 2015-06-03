<?php

session_set_cookie_params(0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>    
<h2>Welcome <?php echo $_SESSION['user'];?></h2>

<?php
if (($_SESSION['lastActivity'] + 300) > time()) {
    echo "<p>Thank you for registering. Please use the credentials you just set to enter the site.</p>";
}
?>
    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" role="form">
                <legend>Sign-In Form</legend>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="_username" placeholder="your username" value="<?php echo $_SESSION['user'];?>" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="_password" placeholder="enter your password" required>
                </div>
                <div class="error">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        if (!$logonSuccess) {
                            echo "Invalid name and/or password";
                        }
                    }
                    ?>
                </div>

                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <a href="../controllers/sign_up_C.php">Crea a new Account</a>
        </div>
    </div>
</body>
</html>
