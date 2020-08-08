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
#update:hover
{
  color: darkblue;
}
h1
{
   font-family: 'Josefin Sans', sans-serif;
   font-size: 3vw;
   font-weight: bolder;
   color: white;

}
label
{
 font-family: 'Merriweather', serif;
  font-size: 2vw;
  font-weight: bold;
  color: white;
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
form
{
  margin-top: 50px;


}

  body
  {
    background-image: url('bg2.jpg');
    background-color:#d7bde2;
    height: 600px;
    width: auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
    <li><a href="blogs_search.php">Search Blogs</a></li>
    <li id="log"><a href="../../logout.php"><button   class="btn btn-primary">LOGOUT</button></a></li>
     </ul>
  </nav>

<?php
session_start();
if($_SESSION['sid'])
{
    // echo "<h3>Welcome, $_SESSION[sname] $_SESSION[spro] </h3><hr>";
}
else
{
  header('location:../index.php');
}
include("../../connection.php");
$id=$_GET['id'];
$query="SELECT * FROM  blogs_table WHERE id='$id'";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if ($total>0)
{
 $result = mysqli_fetch_assoc($data);
?>
<h1 align="center">UPDATE YOUR BLOG</h1>
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-7">
<form method="post" class="form-horizontal">
<input name="id" value="<?php echo $_GET['id'];?> " hidden>
<div class="form-group">
<label>Title: </label><input type="text" name="title" value="<?php echo $result['title'] ?>" class="form-control" required><p>
<label>Category: </label>
<select name="category" class="form-control" required>
    <option><?php echo $result['category'];?></option>
    <option>News</option>
    <option>Politics</option>
    <option>Business</option>
    <option>technical</option>
    <option>Entertainment</option>
    <option>Others</option>
</select><p>
<label>Description: </label><textarea name="description" class="form-control" required><?php echo $result['description']?></textarea><p>
<input type="submit" name="submit" value="Upload" id="update" class="btn btn-primary">
</div>
</form>
</div>
</div>
<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $query = "UPDATE blogs_table SET title='$title', category='$category', description='$description' where id='$id'";

    $data = mysqli_query($conn,$query);
    if($data==true)
    {

            header('location:blogs_search.php');
    }
    else
    {
        echo "<script>alert('Sorry, try again')</script>";
    }
}
}
?>
</body>
</html>
