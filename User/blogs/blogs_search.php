<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../index.css">
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

  <style>
  table
  {
    margin-top: 90px;
    width: 1200px;
    font-weight: bolder;
    color: white;
  }
  td
  {
    text-align:center;
    vertical-align center;
    height: 80px;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 2vw;
    font-weight: bolder;
    color: white;


  }
  body
  {
    background-image: url('bg3.jpg');
    background-color:#d7bde2;
    height: 700px;
    width: auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
  </style>
</head>
<body>
  <nav>
  <div class="navbar-header">
  <a href="../../index.php" class="navbar-brand">BLOG.COM</a>
  </div>
  <ul>
  <li><a href="../../index.php">Home</a></li>
  <li><a href="../../query.php">Contact us</a></li>
  <li><a href="../user_dashboard.php">Dashboard</a></li>
  <li><a href="blogs_insert.php"> Write New</a></li>
  <li id="log"><a href="../../logout.php"><button   class="btn btn-primary">LOGOUT</button></a></li>
   </ul>
</nav>

<?php
session_start();
if($_SESSION['sid'])
{
    // echo "<h3>Welcome, $_SESSION[sname] </h3><hr>";
}
else
{
    header('location:../index.php');
}
?>
<?php
    include("../../connection.php");
    $query = "SELECT * FROM blogs_table WHERE did= '$_SESSION[sid]'";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total>0)
    {
        ?>
    <center>
        <h2><u>Details of your Blogs</u></h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Profession</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
            <th colspan="2">Operations</th>
        </tr>
    <?php
        while($rs = mysqli_fetch_assoc($data))
        {
            ?>
<tr>
<td><?php echo $rs['id']; ?></td>
<td><?php echo $rs['name']; ?></td>
<td><?php echo $rs['profession']; ?></td>
<td><?php echo $rs['title']; ?></td>
<td><?php echo $rs['category']; ?></td>
<td><?php echo $rs['description']; ?></td>
<td><img src="<?php echo $rs['image']; ?>" height="120" width="150"></td>
 <?php
echo "<td><a href='blogs_update.php?id=$rs[id]'>update</a></td>
<td><a href='blogs_search.php?id=$rs[id]' onclick='return checkdelete()'>delete</a></td>";
?>
</tr>
        <?php
        }
        ?>
    </table>
        </center>

      </body>
    </html>
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
            return confirm("Do you really want to delete ?");
        }
    </script>
    <?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM blogs_table WHERE id='$id'";
        $data = mysqli_query($conn,$query);
        if($data)
        {
            header('location:blogs_search.php');
        }
    }
    ?>
