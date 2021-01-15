<?php include_once("configtest.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ирц бүртгэлийн систем</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">出席管理システム</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/viewAttendance.php">日別</a></li>
      <li class="active"><a href="/viewAttendanceMonthly.php">月</a></li>
    </ul>
  </div>
</nav>