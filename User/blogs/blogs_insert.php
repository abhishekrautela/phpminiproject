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
    background-image: url('bg.jpg');
    background-color:#d7bde2;
    height: 500px;
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
?>
<h1 align="center">WHATS ON YOUR MIND?</h1>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
<form method="post" enctype="multipart/form-data" class="form-horizontal">
<input name="did" value="<?php echo $_SESSION['sid']; ?> " hidden>
<input name="profession" value="<?php echo $_SESSION['spro'];?>" hidden><p>
<input name="name" value="<?php echo $_SESSION['sname']?>" hidden><p>
<div class="form-group">
<label>Title: </label><input type="text" name="title" class="form-control" required><p>
<label>Image: </label><input type="file" name="image" class="form-control" required><p>
<label>Category: </label>
<select name="category" class="form-control" required>
    <option>---select any one---</option>
    <option>News</option>
    <option>Sports</option>
    <option>Politics</option>
    <option>Business</option>
    <option>Technical</option>
    <option>Entertainment</option>
    <option>Others</option>
</select><p>
<label>Description: </label><textarea class="form-control" name="description" required></textarea><p>
<input type="submit" name="submit" class="btn btn-primary" value="Upload">
</div>
</form>

        </div>
    </div>
<?php
    include("../../connection.php");
if(isset($_POST['submit']))
{
    $did = $_POST['did'];
    $profession = $_POST['profession'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $imgname=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $uid = time();
    $folder= "../../assets/blogs/$category-$uid-$imgname";
    move_uploaded_file($tmpname,$folder);
    $query = "INSERT INTO blogs_table(did,profession,name,title,category,image,description)VALUES('$did','$profession','$name','$title','$category','$folder','$description')";
    $data = mysqli_query($conn,$query);
    if($data==true)
    {
        echo "<script>alert('Blog has been uploaded')</script>";
    }
    else
    {
        echo "<script>alert('Sorry, try again')</script>";
    }
}

?>
</body>
</html>
