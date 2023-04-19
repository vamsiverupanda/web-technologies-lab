<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin-top: 20px;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f0f2f5;
}

.topnav {
  overflow: hidden;
  background-color: blue;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  font-size: 17px;
  height:25px;
  justify-content: center;
}

.topnav a:hover {
  background-color: skyblue;
  color: black;
}

.topnav a.active {
  background-color: red;
  color: white;
}
.logout{
  justify-content: right;
  display: flex;
}
button{
  margin-bottom: 10px;
  padding: 8px 20px;
  align-self: center;
  background: #1877f2;
  border: none;    
  border-radius: 5px;
  color: #fff;
  font-size: 1rem;
  font-weight: bold;
}
button:hover{
  background: #196fe0;
}
</style>
</head>
<body>


<div class="topnav">
  <a href="index.php">Home</a>
  <a href="post.php">posts</a>
  <a href="upload.php">upload</a>
  <a class="active" href="info.php">profile</a>
  <!-- <a href="about.php">About</a> -->
  <div class="logout">
  <a href="logout.php"><button>logout</button></a>
</div>
</div>

<div style="padding-left:16px">
    <?php
        session_start();
        $con=mysqli_connect("localhost","root","","test");
        $eid=$_SESSION["email"];
        $phonenumber;
        $rows=mysqli_query($con,"select * from user where email='$eid'");
        echo "<center><br><br><table border=1 cellspacing=0 cellpadding=6>";
        while($row=mysqli_fetch_array($rows))
        {
            echo "<tr><th>First Name</th><th>".$row["firstname"]."</th></tr>";
            echo "<tr><th>Last Name</th><th>".$row["lastname"]."</th></tr>";
            echo "<tr><th>DateOfBirth</th><th>".$row["dob"]."</th></tr>";
            echo "<tr><th>Email</th><th>".$row["email"]."</th></tr>";
            echo "<tr><th>Password</th><th>".$row["password"]."</th></tr>";
            echo "<tr><th>Phone Number</th><th>".$row["phonenumber"]."</th></tr>";
            echo "<tr><th>Address</th><th>".$row["address"]."</th></tr>";
        }
        echo "</center> </table>";
    ?>
</div>

</body>
</html>
