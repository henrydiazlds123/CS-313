<?php
include('./model/config.ini');
include('./model/query.php');
?>

<div class="container">
    <div class="row">
        <form class='form-horizontal' action='index.php' method='POST' role='form'>
        Transaction Date: <input type="date" value="<?php echo date('Y-m-d'); ?>" name="fecha">
        <br>
        Transaction Type: 
        <select>
          <option>-- Choose a value --</option>
          <option name="type" value="1">Income</option>
          <option name="type" value="2">Expense</option>
        </select>
        <select name="" id="">
          <?php transType();?>  
        </select>
        
        <br>
        Category: 
        <select>
          <option>-- Choose a value --</option>
          <option name="category" value="1">Income</option>
          <option name="ctegory" value="2">Expense</option>
        </select>
        <br>
        Amount: <input type="numeric" name="amount">
        <br>
        Notes: <input type="text" name="notes">
        </form>
    </div>
</div>