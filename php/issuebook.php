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
    <title> Issue Books</title>
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
    <?php
      $sql="SELECT * FROM students";
      $result=mysqli_query($conn,$sql);
    ?>
    <div class="add-container">
          <form method="post" onsubmit="return validate()">
              <select name="sid" class="sid">
                <option value="null" selected>--- Select Student ---</option>
                <?php
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<option value='".$row["rollNo"]."'>".$row["rollNo"]." - ".$row["name"]."</option>";
                    }
                  }
                ?>
              </select>
              <select name="bid" class="bid">
                <option value="null" selected>--- Select Book ---</option>
                <?php
                  $sql="select * from books";
                  $result=mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<option value='".$row["id"]."'>".$row["id"]." - ".$row["title"]."</option>";
                    }
                  }
                ?>
              <input type="submit" value="Submit" name="submit">
              <div class="errorText"></div>
        </form>
    </div>
</body>
<?php
    if(isset($_POST["submit"]))
    {
      $studentid=$_POST["sid"];
      $bookid=$_POST["bid"];
      $issuedate=date("Y/m/d");
      $sql="SELECT * FROM books WHERE id='$bookid'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
        $row=mysqli_fetch_assoc($result);
        $updateQuantity=$row["quantity"]-1;
        $sql="INSERT INTO issue(studentId,bookId,issueDate) VALUES('$studentid','$bookid','$issuedate')";
        if(mysqli_query($conn,$sql))
        {
          $sql="UPDATE books SET quantity='$updateQuantity' WHERE id='$bookid'";
          if(mysqli_query($conn,$sql))
          {
            echo "<script>alert('Book Issued Successfully');</script>";
          }
          else
          {
            echo "<script>alert('Error in updating book quantity');</script>";
          }
        }
    }
  }
?>
<script>
    function validate()
    {
      const student=document.querySelector('.sid'),
      book=document.querySelector('.bid'),
      error=document.querySelector('.errorText');
      if(student.value=="null" || book.value=="null")
      {
        error.innerHTML="Student or Book is not Selected!";
        return false;
      }
      else
      {
        return true;
      }
    }
</script>
</html>
