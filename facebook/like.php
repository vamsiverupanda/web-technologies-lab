<?php
session_start();
$conn=mysqli_connect('localhost','root','','test');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$image_id = $_POST["image_id"];
$user_id = $_SESSION["email"];
$sql = "select * from likes where email='$user_id'and post_id='$image_id' " ;
$result = $conn->query($sql);
$rowcount = mysqli_num_rows( $result );
if ($rowcount > 0) {
} 
else {
  $sql = "UPDATE images SET likes=likes+1 WHERE post_id=" . $image_id;
    if ($conn->query($sql) === TRUE) {
    } 
    else {
      echo "Error adding like: " . $conn->error;
    }
    $sql = "INSERT INTO likes(email,post_id) VALUES ('$user_id',$image_id)";
  if ($conn->query($sql) === TRUE) {
  } 
  else {
    echo "Error recording like: " . $conn->error;
  }
}
}
$conn->close();
echo '<script>window.location.replace("post.php");</script>';
?>