<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS313 | Sign Up</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <script href="../public/js/jquery-1.11.3.min.js"></script>
    <script>
            
    </script>

</head>
<body>
    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" role="form">
                <legend>Sign-Up Form</legend>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="_username" name="_username" placeholder="your username" onblur="run()" value="<?php echo $username;?>">
                    <?php
                    /** Display error messages if "user" field is empty or there is already a user with that name*/
                    if ($userIsEmpty) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">Enter your name, please!</div>');
                    }
                    if (!$userNameIsUnique) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">The person already exists. Please check the spelling and try again</div>');
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="_password" placeholder="enter your password">
                    <?php
                    /** Display error messages if the "password" field is empty */
                    if ($passwordIsEmpty) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">Enter the password, please</div>');
                    }
                    if (!$passwordIsComplex) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">Password must be at least 7 characters and contain a number</div>');
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Confirm your Password</label>
                    <input type="password" class="form-control" name="_password2" placeholder="enter your password">
                    <div class="error" id="errorMatch"></div>
                    <?php
                    /**
                     * Display error messages if the "password2" field is empty
                     * or its contents do not match the "password" field
                     */
                    if ($password2IsEmpty) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">Confirm your password, please</div>');
                    }
                    if (!$password2IsEmpty && !$passwordIsValid) {
                        echo('<span class="asterisk_input">  </span>');
                        echo('<div class="error">The passwords do not match!</div>');
                    }
                    ?>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    
</body>
</html>
