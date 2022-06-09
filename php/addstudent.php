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
    <title> Add Students</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
    require("includes/sidebar.php");
    require("includes/connection.php");
    ?>
    <div class="add-container">
          <form method="post" onsubmit="return validate()">
              <input type="text" name="rollno" id="rollno" placeholder="Enter Roll No">
              <input type="text" name="name" id="name" placeholder="Enter Name">
              <input type="text" name="faculty" id="faculty" placeholder="Enter Faculty">
              <input type="text" name="address" id="address" placeholder="Enter Address">
              <input type="submit" value="Submit" name="submit">
              <div class="errorText"></div>
        </form>
    </div>
</body>
<?php
  if(isset($_POST["submit"]))
  {
    $rollno=$_POST["rollno"];
    $name=$_POST["name"];
    $faculty=$_POST["faculty"];
    $address=$_POST["address"];
    $sql="INSERT INTO students(rollNo,name,faculty,address) values('$rollno','$name','$faculty','$address')";
    if(mysqli_query($conn,$sql))
    {
      echo "<script>alert('Student Data Inserted!');</script>";
    }
  }
?>
<script>
    function validate()
    {
      const rollno=document.getElementById("rollno").value,
      name=document.getElementById("name").value,
      faculty=document.getElementById("faculty").value,
      address=document.getElementById("address").value,
      error=document.querySelector('.errorText');
      if(rollno.length==0 || name.length==0 || faculty.length==0 || address.length==0)
      {
        error.innerHTML="All Fields Are Required!";
        return false;
      }
      else if(isNaN(rollno))
      {
        error.innerHTML="Roll No Must Be Number!";
        return false;
      }
      else
      {
        return true;
      }
    }
</script>
</html>
