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
    <title> View Students</title>
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
    <div class="viewbook-container">
        <div class="main">
          <div class="form-control">
              <label for="search"><i class='bx bx-search'></i></label>
              <input type="search" name="search" id="search" placeholder="Search" onkeyup="searchdata()">
          </div>
          <div class="table-data">
          <table id="ordering-table">
             
                <tr>
                  <th>Roll No</th>
                  <th>Name</th>
                  <th>Faculty</th>
                  <th>Address</th>
                </tr>

                <?php
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<tr>";
                      echo "<td>".$row["rollNo"]."</td>";
                      echo "<td>".$row["name"]."</td>";
                      echo "<td>".$row["faculty"]."</td>";
                      echo "<td>".$row["address"]."</td>";
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
