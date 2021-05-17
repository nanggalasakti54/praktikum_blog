<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
 
<div class="header">
 <h1>My Blog</h1>
 <p>Mari Berbagi Cerita</p>
</div>
 
<!-- Menampikan kolom sebelah kiri -->
<div class="row">
 <div class="leftcolumn">
   <div class="card">
     <a href="post.php"><h2>TITLE HEADING</h2></a>
     <h5>Title description, Dec 7, 2017</h5>
     <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <div class="card">
     <a href="post.php"><h2>TITLE HEADING</h2></a>
     <h5>Title description, Dec 7, 2017</h5>
     <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <div class="card">
     <a href="post.php"><h2>TITLE HEADING</h2></a>
     <h5>Title description, Dec 7, 2017</h5>
     <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <div class="card">
     <a href="post.php"><h2>TITLE HEADING</h2></a>
     <h5>Title description, Dec 7, 2017</h5>
     <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <div class="card">
     <a href="post.php"><h2>TITLE HEADING</h2></a>
     <h5>Title description, Dec 7, 2017</h5>
     <div class="fakeimg" style="height:200px;">Image</div>
   </div>
 </div>
 
 <!-- Menampikan kolom sebelah kanan -->
 <div class="rightcolumn">
   <div class="card">
     <h2>About Me</h2>
     <div class="fakeimg" style="height:100px;">Image</div>
     <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
   </div>
   <div class="card">
     <h3>Popular Post</h3>
     <a href="post.php"><div class="fakeimg"><p>Image</p></div></a>
     <a href="post.php"><div class="fakeimg"><p>Image</p></div></a>
     <a href="post.php"><div class="fakeimg"><p>Image</p></div></a>
   </div>
   <div class="card">
     <h3>Follow Me on Twitter</h3>
     <p>@nanggala_sakti</p>
   </div>
 </div>
</div>
 
<div class="footer">
 <h2>Footer</h2>
</div>

<?php
include "header.php";
 
$posts = $conn->query("SELECT * FROM Post");
 
while($post = $posts->fetch_object()) {
 ?>
   <div class="card">
       <a href="post.php"><h2><?php echo $post->title; ?></h2></a>
       <h5><?php echo $post->createdAt; ?></h5>
       <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <?php
}
?>
<?php include "footer.php" ?>

<?php
include "header.php";
 
$posts = $conn->query("SELECT * FROM Post");
 
while($post = $posts->fetch_object()) {
 ?>
   <div class="card">
       <a href="post.php?id=<?php echo $post->id ?>"><h2><?php echo $post->title; ?></h2></a>
       <h5><?php echo $post->createdAt; ?></h5>
       <div class="fakeimg" style="height:200px;">Image</div>
   </div>
   <?php
}
?>
<?php include "footer.php" ?>

<?php
include "../header.php";
 
if($_POST["ngapain"] == 'insert') {
   $target_dir = "../uploads/";
   $target_file = $target_dir . basename($_FILES["image"]["name"]);
   move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
   $title = $_POST['title'];
   $content = $_POST['content'];
   $image = $_FILES["image"]["name"];
   $conn->query("INSERT INTO Post set title='$title', content='$content', image='$image'");
}
 
 


 
</body>
</html>
