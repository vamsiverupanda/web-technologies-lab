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
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: green;
}

label {
  margin: 10px 0;
}

input[type="file"] {
  margin-bottom: 20px;
}

textarea {
  height: 100px;
  resize: none;
  margin-bottom: 20px;
}

input[type="submit"] {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #3E8E41;
}   

</style>
</head>
<body>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="post.php">Posts</a>
  <a class="active" href="upload.php">upload</a>
  <a href="info.php">Profile</a>
  <!-- <a href="about.php">About</a> -->
  <div class="logout">
  <a href="logout.php"><button>logout</button></a>
</div>
</div>
<div style="width:300px; border:2px solid black; margin-top:30px; margin-left:38%;  border-radius: 10px;">
<form action="" method="POST" enctype="multipart/form-data">
  <label for="image">Upload Image:</label>
  <input type="file" id="image" name="file" accept="image/*" required>
  <label for="description">Description:</label>
  <textarea id="description" name="description" required style="border-radius:10px; border: 1px solid black; background-color: lightgrey;"></textarea>
  <input type="submit" name="submit" value="Upload">
</form>
</div>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","test");
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $eid=$_SESSION["email"];
        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $description = $_POST['description'];
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_types)) {
          echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.')</script>;";
        exit;
        }
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($file_name);
        move_uploaded_file($file_tmp_name, $target_file);
        $sql = "INSERT INTO images(email,image,description) VALUES ('$eid','$file_name', '$description')";
        if ($con->query($sql) === TRUE) {
          echo "<script>alert('File uploaded successfully.')</script>";
        }
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
</body>
</html>
