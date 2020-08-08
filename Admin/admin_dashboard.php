<!DOCTYPE HTML>
<html>
<head>
  <title>DASHBOARD</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../index.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <style>
  h1
  {
    color: white;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 2vw;
    font-weight: bolder;

  }
  table
  {

    margin-top: 90px;
    width: 1500px;
    font-weight: bolder;
    color: white;
  }
  td
  {
    text-align:center;
    vertical-align center;
    height: 80px;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 0.8vw;
    font-weight: bolder;
    color: white;



  }
  th
  {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 2vw;
    font-weight: bolder;
    color: white;
    text-align: center;
    height: 50px;
  }
  table td a
{
  font-family: 'Josefin Sans', sans-serif;
  font-size: 2vw;
  font-weight: bolder;
  color: white;
  text-align: center;
  height: 50px;
}
table td a:hover
{
  color: dodgerblue;
}

  body
  {
    background-image: url('bg.jpg');
    background-color:#d7bde2;
    height: 750px;
    width: auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
h2
{
  font-family: 'Josefin Sans', sans-serif;
  font-size: 3vw;
  font-weight: bolder;
  color: white;
  text-align: center;
}
  </style>
  </head>
  <body >
  <nav>
        <div class="navbar-header">
        <a href="../index.php" class="navbar-brand">BLOG.COM</a>
        </div>
        <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../query.php">Contact us</a></li>
        <li><a href="admin_query.php">Search Queries</a></li>
        <li id="log"><a href="../logout.php"><button  style="margin-right:10px;" class="btn btn-primary">LOGOUT</button></a></li>
        </ul>
  </nav>
  <?php
    session_start();
    if ($_SESSION['aid'])
    {
        // echo "<h1 id='welcome'>WELCOME, ".ucfirst($_SESSION['ausername'])."</h1> ";

    }
    else
    {
      header('location:admin_login.php');
    }
?>
<?php
    include("../connection.php");
    $query = "SELECT * FROM user_login";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total>0)
    {
        ?>
    <center>
        <h2><u>USER'S DETAIL</u></h2>


  <table border="1" cellspacing="5" cellpadding="8">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Profession</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Image</th>
            <th>Operation</th>
        </tr>
    <?php
        while($rs = mysqli_fetch_assoc($data))
        {
            ?>
<tr>
<td><?php echo $rs['id']; ?></td>
<td><?php echo $rs['name']; ?></td>
<td><?php echo $rs['profession']; ?></td>
<td><?php echo $rs['email']; ?></td>
<td><?php echo $rs['dob']; ?></td>
<td><?php echo $rs['gender']; ?></td>
<td><?php echo $rs['contact']; ?></td>
<td><?php echo $rs['address']; ?></td>
<td><img src="<?php echo $rs['photo']; ?>" height="120" width="150"></td>
 <?php
echo "<td><a href='admin_dashboard.php?id=$rs[id]' onclick='return checkdelete()'>delete</a></td>";
?>
</tr>
        <?php
        }
        ?>
    </table>

    <?php
    }
    else
    {
        echo "<center><h1>Sorry, No data Found. </h1></center>";
    }
?>
    <script>
        function checkdelete()
        {
            return confirm("Do you really want to delete the user ?");
        }
    </script>
    <?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM user_login WHERE id='$id'";
        $data = mysqli_query($conn,$query);
        if($data)
        {
        header('location:admin_dashboard.php');
        }
    }
  ?>
</body>
</html>
