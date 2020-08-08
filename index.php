<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
  <style>
  body
  {
    background-image: url('new.jpg');
    background-color:#d7bde2;
    height: 730px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
  </style>
</head>
  <body>
    <nav>
      <div class="navbar-header">
      <a href="index.php" class="navbar-brand">BLOG.COM</a>
      </div>
      <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="query.php">Contact us</a></li>
      <li><a href="User/user_dashboard.php">Dashboard</a></li>
      <li id="log"><a href="User/user_registration.php"><button class="btn btn-primary">Register</button></a></li>
      <li class="dropdown" id="log"><a class="dropdown-toggle" data-toggle="dropdown" ><button class="btn btn-danger">Login</button></a>
      <ul class="dropdown-menu">
       <li><a href="User/user_login.php">User Login</a></li>
       <li><a href="Admin/admin_login.php">Admin Login</a></li>
      </ul>
        </li>
        </ul>
    </div>
</nav>
<?php
    include("connection.php");
    session_start();
    $query = "SELECT * FROM blogs_table ORDER BY id DESC LIMIT 0,10";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total>0)
    {
        echo "<div class='container'>";
        while($rs = mysqli_fetch_assoc($data))
        {
?>
            <div class="row">
            <div class="col-md-4">
            <img src="htdocs/blogs_spot/<?php echo $rs['image']; ?>" height="280" width="310" class="img-thumbnail">
            </div>

            <div class="col-md-8">
            <div class="jumbotron">
            <h2><center>
            <?php echo ucfirst($rs['title']);?>
            [<?php echo $rs['category']; ?>]</center>
            </h2>
            <?php echo ucfirst($rs['description']); ?><br>
            <p style="float:right;"><strong>by: <?php echo $rs['name']; ?>(<?php echo $rs['profession']; ?>)</strong></p>
                    </div>
            </div>
            </div>
            <?php
                    }
                    echo "</div>";
                    }
                else
                {
                    // echo "<center><h1>Sorry, No data Found. </h1></center>";
                }
            ?>

</body>
</html>
