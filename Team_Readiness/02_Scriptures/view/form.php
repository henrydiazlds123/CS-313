<?php
include('./model/config.ini');
include('./model/query.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>
<h3>SCRIPTURE RESOURCES</h3>
<?php listCollection() ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <label for="searchBook">Book: </label>
    <select name="searchBook" onchange="this.form.submit();">
        <option value="Book">Choose...</option>
        <?php uniqueBooks();?>
    </select>
</form>
<br>
<?php searchBook();?>
</body>
</html>