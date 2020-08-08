<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../index.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <style>
  #link
  {
  font-size: 1vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
  text-align: center;
  color: white;
  }
  #link:hover
  {
    color:dodgerblue;
  }
  #gender
  {
    font-size: 1vw;
    font-family: 'Josefin Sans', sans-serif;
    font-weight: bolder;
    color: white;
  }
   label
{
  font-size: 1vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
  text-align: center;
  color: white;
}
input
{
  font-size: 1vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
}
h1
{
  font-size: 2vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
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
        <h1>User Registration</h1>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
<form method="post" enctype="multipart/form-data" class="form-horizontal">
     <div class="form-group">
      <label>Name: </label><input type="text"  class="form-control" name="name" required></div>
     <div class="form-group">
         <label>Email: </label><input type="email"  class="form-control" name="email" required></div>
     <div class="form-group">
         <label>Password:</label> <input type="password" name="password" class="form-control" required></div>
     <div class="form-group">
<label>Profession:</label>
<select name="profession" class="form-control" required>
    <option>select any one</option>
    <option>Professional</option>
    <option>Free-lancer</option>
    <option>Student</option>
    <option>Others</option>
         </select></div>
    <div class="form-group">
        <label>Dob:</label><input type="date"  name="dob" class="form-control" required></div>
 <div class="form-group">
    <label>Gender: </label>
    <span id = "gender">Male</span><input type="radio" name="gender" value="male">
    <span id = "gender">Female</span><input type="radio" name="gender" value="female" ></div>
     <div class="form-group">
         <label>Contact: </label><input type="number"  class="form-control" name="contact" required></div>
     <div class="form-group">
         <label>Address</label><textarea name="address" class="form-control" required></textarea></div>
     <div class="form-group">
         <label>Photo: </label><input type="file" class="form-control" name="photo" required></div>
    <input type="submit" name="user_reg" class="btn btn-primary" value="Register">
</form>
        </div>
            <div class="col-md-4">
            <a href="user_login.php" id="link"><h4>Already a member?<br> CLICK HERE TO LOGIN</h4></a>
            </div>

                </div>
            </div>
    </body>
</html>
<?php
include("../connection.php");
if(isset($_POST['user_reg']))
   {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $profession=$_POST['profession'];
      $dob=$_POST['dob'];
      $gender=$_POST['gender'];
      $contact=$_POST['contact'];
      $address=$_POST['address'];
      $imgname=$_FILES['photo']['name'];
      $tmpname=$_FILES['photo']['tmp_name'];
      $uid = time();
      $folder= "../assets/upload/User_$uid-$imgname";
      move_uploaded_file($tmpname,$folder);

       $query = "INSERT INTO user_login(name,email,password,profession,dob,gender,contact,address,photo) VALUES('$name','$email','$password','$profession','$dob','$gender','$contact','$address','$folder')";
       $data = mysqli_query($conn,$query);
       if($data==true)
       {
           echo "<script>alert('Credentials have been generated for $name')</script>";
       }
       else
       {
           echo "<script>alert('Sorry, Please try again')</script>";
       }
   }
?>
