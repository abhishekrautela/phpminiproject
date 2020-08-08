<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../index.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<style>
h1
{
  font-size: 3vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
  text-align: center;
  color: white;
}
label
{
  font-size: 2vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
  text-align: center;
  color: white;
}
body
{
  background-image: url('new.jpg');
  background-color:#d7bde2;
  height: 720px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body>
  <nav>
    <div class="navbar-header">
    <a href="../index.php" class="navbar-brand">BLOG.COM</a>
    </div>
    <ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="../query.php">Contact us</a></li>
    </ul>
  </nav>
        <div class="container">

        <h1>Login</h1>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
<form method="post" class="form-horizontal">
     <div class="form-group">
         <label>Email: </label><input type="email"  class="form-control" name="email" autocomplete="" autofocus required></div>
     <div class="form-group">
         <label>Password:</label> <input type="password" name="password" class="form-control" autocomplete="" autofocus required></div>
    <input type="submit" name="user_log" class="btn btn-primary" value="Login">
</form>
        </div>
            <div class="col-md-2"></div>
                </div>
            </div>
    </body>
</html>
<?php
include("../connection.php");
session_start();
if(isset($_POST['user_log']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user_login WHERE email='$email' and password='$password'";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total==1)
    {
        $rs = mysqli_fetch_assoc($data);
        $id = $rs['id'];
        $name = $rs['name'];
        $profession = $rs['profession'];
        $_SESSION['sid']=$id;
        $_SESSION['sname']=$name;
        $_SESSION['spro']=$profession;
        header('location:user_dashboard.php');
    }
}
