<?php
require("config.php"); 
//$commonObj = new Common();
  if(isset($_REQUEST['submit'])){
    $commonObj->validateLogin();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>進級制作</title>
    <link rel="stylesheet" href="aaa.css">
    <meta charset="UTF-8">
</head>
<body>
    <div class="wrapper">
    <div class="container">
    <div class="row">
<div class="col-sm-6">
  <h3>ATTERT</h3>
  <?php echo $commonObj->getSuccessMsg();
      echo $commonObj->getErrorMsg();
      $commonObj->unsetMessage();
  ?>
  <form method="post">
    <div class="form-group">
      <label for="email"></label>
      <input type="email" class="form-control" id="email" placeholder="メールアドレス" name="username">
    </div>
    <div class="form-group">
      <label for="pwd"></label>
      <input type="password" class="form-control" id="pwd" placeholder="パスワード" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit" value="ログイン">Submit</button>
  </form>
</div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </div>
</body>
</html>