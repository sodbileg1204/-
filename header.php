<?php include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ATTERT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <body {
 background-image: url("img/cool-background.svg");
}
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">出席管理システム</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/viewAttendance.php">日別</a></li>
      <li><a href="/viewAttendanceMonthly.php">月別</a></li>
    </ul>
  </div>
</nav>