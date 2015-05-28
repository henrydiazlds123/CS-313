<?php
include('./model/config.ini');
include('./model/query.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Team Readiness | Scriptures</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
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
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="./view/viewAll.php">View Scriptures</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <main class="container">
        <form class="form-horizontal" action="./model/query.php" method="POST" role="form">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">New Scripture Entry: </legend>
                <div class="form-group">
                    <label for="_name" class="col-sm-2 control-label">Book: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="_book" placeholder="Enter a book" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="_name" class="col-sm-2 control-label">Chapter: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="_chapter" placeholder="Enter the chapter" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="_name" class="col-sm-2 control-label">Verse(s): </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="_verse" placeholder="Enter verse(s)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="_name" class="col-sm-2 control-label">Content: </label>
                    <div class="col-sm-10">
                        <textarea rows="6" cols="80" class="form-control" name="_content" placeholder="Enter the content here" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="_name" class="col-sm-2 control-label">Topics: </label>
                    <div class="col-sm-10">
                        <?php getTopics(); ?>
                        <div class="checkbox">
                        <h5>Stretch Challenge 1:</h5>
                        <label><input type="checkbox" id="otherchk" name="other" value="other" onChange="validarchk();">Other:</label> <input disabled type="text" id="othertxt" name="_newTopic">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default btn-lg active" role="button">Submit</button>
                    </div>
                </div>
                
            </fieldset>

            </div>
            
        </form>
    </main>
    <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <script>
    function validarchk(){
        var chk = document.getElementById('otherchk');
        var txt = document.getElementById('othertxt');
        if(chk.checked){
            txt.disabled='';
            txt.required='required';
        }else{
            othertxt.value='';
            othertxt.disabled='disabled';
            
        }
    }
    </script>
</body>

</html>

