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
    <title>View Books</title>
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
      $sql="SELECT * FROM books";
      $result=mysqli_query($conn,$sql);
    ?>
    <div class="viewbook-container">
        <div class="main">
          <div class="form-control">
              <label for="search"><i class='bx bx-search'></i></label>
              <input type="search" name="search" id="search" placeholder="Search" onkeyup="searchdata()">
          </div>
          <div class="table-data">
          <table id="ordering-table">
             
                <tr>
                  <th>ID</th>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Publication</th>
                  <th>Quantity</th>
                </tr>

                <?php
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<tr>";
                      echo "<td>".$row["id"]."</td>";
                      echo "<td>".$row["isbn"]."</td>";
                      echo "<td>".$row["title"]."</td>";
                      echo "<td>".$row["author"]."</td>";
                      echo "<td>".$row["publication"]."</td>";
                      echo "<td>".$row["quantity"]."</td>";
                      echo "</tr>";
                    }
                  }
                  ?>
                       
            </table>
          </div>
        </div>
    </div>

</body>
<script src="search.js"></script>
</html>
