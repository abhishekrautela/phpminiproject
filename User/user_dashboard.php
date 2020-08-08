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
body
{
  background-image: url('new2.jpg');
  background-color:#d7bde2;
  height: 750px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
table
{
  margin-top: 150px;
  width: 900px;
}
td
{
  text-align:center;
  vertical-align: top;
  height: 80px;

}
#operations
{
  font-size: 5vw;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bolder;
}
  #welcome
  {
    font-size: 3vw;
    ffont-family: 'Merriweather', serif;
    font-weight: bolder;
    text-align: center;
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
        <li id="log"><a href="../logout.php"><button  style="margin-right:10px;" class="btn btn-primary">LOGOUT</button></a></li>
        </ul>
        </nav>
  <?php
  session_start();
  if($_SESSION['sid'])
  {
      echo "<h3 id='welcome'>Welcome,&nbsp $_SESSION[sname] </h3><hr></div>";

  }

  else
  {
      header('location:../index.php');
  }
  ?>
<br>
<center>
    <table >

<tr>
    <td>
        <a href="blogs/blogs_insert.php" id="operations"><font color=" #154360">Insert Blog</font></a>
    </td>
    <td>
        <a href="blogs/blogs_search.php" id="operations"><font color=" #154360">Search Blog</font></a>
    </td>
</tr>
    </table>
</center>
</body>
</html>
