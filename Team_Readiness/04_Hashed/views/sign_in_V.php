<?php

session_set_cookie_params(0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS313 | Sign In</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <style>
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }
    
    legend.scheduler-border {
        width: inherit;
        /* Or auto */
        
        padding: 0 10px;
        /* To give a bit of padding on the left and right */
        
        border-bottom: none;
    }
    </style>
</head>
<body>    


<?php
if (($_SESSION['lastActivity'] + 300) > time()) {
    echo "<p>Thank you for registering. Please use the credentials you just set to enter the site.</p>";
}
?>
    <div class="container">
        <div class="row">
        <h2>Welcome <?php echo $_SESSION['user'];?></h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" role="form">
                
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Sign-In Form</legend>

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
                </fieldset>
            </form>
            <a href="../controllers/sign_up_C.php">Crea a new Account</a>
        </div>
    </div>
</body>
</html>
