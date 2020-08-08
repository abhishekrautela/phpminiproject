<!DOCTYPE HTML>
<html>
<head>
  <title>WELCOME</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../index.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
      <style>



      body
      {
        background-image: url('bg2.jpg');
        background-color:#d7bde2;
        height: 750px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
  }


      label
      {
        font-family: 'Merriweather', serif;
        font-size: 1.5vw;
        font-weight: bold;
        color: black;
      }

      #head
      {
         font-family: 'Josefin Sans', sans-serif;
         font-size: 3vw;
         font-weight: bolder;
         color:  #fbfcfc ;
         text-align: center;
      }
     input[type]
    {
      width:400;
      height:50;
      font-family:sans-serif;
      border-radius:5px;
      border:none;
      font-size: 16px;
    }
    #res{
      width:80px;
      height:40px;
      background-color:#ec7063;
      color:white;
      margin-left:20px;
    }
    #res:hover
    {
      background-color: #7b241c  ;
    }

        #haha
        {
          color:white;
          background-color:#3498db  ;
          border:none;
          padding:10px;
          border-radius:5px;
          font-size: 15px;
          width:80px;
          height: 40px;
          margin-left: 110px;
        }
        #haha:hover
        {
          background-color:  #154360 ;
        }
        form
        {
          margin-top: 200px;
        }

  </style>
</head>
<body >
  <nav>

        <div class="navbar-header">
        <a href="index.php" class="navbar-brand">BLOG.COM</a>
        </div>
        <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../query.php">Contact us</a></li>
        </ul>
        </nav>

        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form method="post" class="form-horizontal">
        <div class="form-group">
        <label>USERNAME:</label><input type="text" name="username" class="form-control" value="" required /><br/></br/>
        <label>PASSWORD:</label><input type="password" name="password" class="form-control" value="" required /><br/></br/>
        <input type="submit" id="haha" name="admin_login" value="Login" />
        <input type="reset" name="reset" value="Reset" id="res">

    </form>
  </body>
</html>
<?php
  include("../connection.php");
  session_start();
if (isset($_POST['admin_login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query="select * from admin_login where username='$username' and password='$password'";
  $data=mysqli_query($conn,$query);
  $total=mysqli_num_rows($data);
  if($total==1)
  {
    $result=mysqli_fetch_assoc($data);
    $id=$result['id'];
    $username=$result['username'];
    $_SESSION['aid']=$id;
    $_SESSION['ausername']=$username;
    header('location:admin_dashboard.php');
  }
}
?>
