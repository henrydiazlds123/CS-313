<?php
include('../model/config.ini');
include('../model/qryViewAll.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Readiness | Scriptures</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CS313</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#">View Scriptures</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
<h3>SCRIPTURE RESOURCES</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Scripture</th>
            <th>Content</th>
            <th>Topics</th>
          </tr>
    </thead>
    <tbody>
            <?php listCollection2();?>
    </tbody>
</table>
<a href="../index.php" class="btn btn-primary btn-lg active" role="button">Entry a new Scripture</a>

<br>
<h3>Stretch Challenge Extra - Filter by Topic:</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <label for="searchBook">Topic: </label>
    <select name="searchBook" onchange="this.form.submit();">
        <option value="Book">Choose...</option>
        <?php uniqueTopics();?>
    </select>
</form>
<br>
<?php searchBooksByTopic();?>
</div>
</body>
</html>