<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS313 | Sign Up</title>
    <script href="../public/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
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
    <script>
            
    </script>

</head>
<body>
    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" role="form">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Sign-Up Form</legend>

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
                </fieldset>
            </form>
        </div>
    </div>
    
</body>
</html>
