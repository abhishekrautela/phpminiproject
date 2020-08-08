<!DOCTYPE HTML>
<html>
<head>
  <title>DASHBOARD</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <style>
  body
  {
    background-image: url('new.jpg');
    background-color:#d7bde2;
    height: 750px;
    width:auto;
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
}

label
{
  font-size: 1vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
  text-align: center;
  color: white;
}

  </style>
  </head>
  <body >
  <nav>
      <div class="navbar-header">
      <a href="index.php" class="navbar-brand">BLOG.COM</a>
      </div>
      <ul>
      <li><a href="index.php">Home</a></li>
      <li id="log"><a href="logout.php"><button  style="margin-right:10px;" class="btn btn-primary">LOGOUT</button></a></li>
      </ul>
  </nav>

<center><h1>Mail your suggestions/Query</h1></center>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<form method="post">
  <label>Email: </label><input type="email" class="form-control" name="email">
  <label>Subject: </label><select name="subject" class="form-control">
    <option>Suggestion</option>
    <option>Query</option>
    </select>
    <label>Description: </label><textarea name="description" class="form-control"></textarea>
    <br>
<input type="submit" name="submit" class="btn btn-success" value="Submit">
</form>
    </div>
</div>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $to = "abhishekrautela007@gmail.com";
    if(mail($to,$subject,$description,$email))
    {
        echo "<script>alert('Thank You for mailing. You will receive your reply on mail')</script>";
    }
    else
    {
        echo "<script>alert('Sorry, error occured')</script>";
    }
}
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $query = "insert into query_table(email,subject,description) VALUES('$email','$subject','$description')";
    $data = mysqli_query($conn,$query);
}
?>
