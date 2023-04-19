<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    session_start();
    $email=$_POST["email"];
    $password=$_POST["password"];
    $conn=mysqli_connect('localhost','root','','test');
    $sql="select * from user where email='$email' and password='$password' ";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        session_start();
        $_SESSION['email']=$email;
        header('location:index.php');
    }
    else{
        echo "<script> alert('Enter valid details!!!') </script>";
    }

    }
?>