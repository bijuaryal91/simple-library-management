<?php
session_start();
if(!isset($_SESSION["user"]))
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
  require("includes/sidebar.php");
  require("php/includes/connection.php");
  ?>
  <?php
      $sql1="SELECT * from students";
      $sql2="SELECT * from books";
      $sql3="SELECT * from issue";
      $result=mysqli_query($conn,$sql1);
      $count=mysqli_num_rows($result);
      $result1=mysqli_query($conn,$sql2);
      $count1=mysqli_num_rows($result1);
      $result2=mysqli_query($conn,$sql3);
      $count2=mysqli_num_rows($result2);
      
  ?>
  <section class="card-header">
      <div class="card first">
          <h3>Total Students</h3>
          <h2><?php echo $count;?></h2>
      </div>
      <div class="card second">
          <h3>Total Books</h3>
          <h2><?php echo $count1;?></h2>
      </div>
      <div class="card third">
          <h3>Total Book Issued</h3>
          <h2><?php echo $count2;?></h2>
      </div>
  </section>
</body>
</html>
