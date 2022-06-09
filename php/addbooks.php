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
    <title> Add Books</title>
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
              <input type="text" name="isbn" id="isbn" placeholder="Enter ISBN">
              <input type="text" name="title" id="title" placeholder="Enter Title">
              <input type="text" name="author" id="author" placeholder="Enter Author Name">
              <input type="text" name="publication" id="publication" placeholder="Enter Publication">
              <input type="text" name="quantity" id="quantity" placeholder="Enter Quantity">
              <input type="submit" value="Submit" name="submit">
              <div class="errorText"></div>
        </form>
    </div>
</body>
<?php
  if(isset($_POST["submit"]))
  {
    $isbn=$_POST["isbn"];
    $title=$_POST["title"];
    $author=$_POST["author"];
    $publication=$_POST["publication"];
    $quanity=$_POST["quantity"];
    $sql="INSERT INTO books(isbn,title,author,publication,quantity) values('$isbn','$title','$author','$publication','$quanity')";
    if(mysqli_query($conn,$sql))
    {
      echo "<script>alert('Book Inserted!');</script>";
    }
  }
?>
<script>
    function validate()
    {
      const isbn=document.getElementById("isbn").value,
      title=document.getElementById("title").value,
      author=document.getElementById("author").value,
      publication=document.getElementById("publication").value,
      quantity=document.getElementById("quantity").value,
      error=document.querySelector('.errorText');
      if(isbn.length==0 || title.length==0 || author.length==0 || publication.length==0 || quantity.length==0)
      {
        error.innerHTML="All Fields Are Required!";
        return false;
      }
      else if(isNaN(isbn))
      {
        error.innerHTML="ISBN Must Be Number!";
        return false;
      }
      else if(isNaN(quantity))
      {
        error.innerHTML="Quantity Must Be Number!";
        return false;
      }
      else
      {
        return true;
      }
    }
</script>
</html>
