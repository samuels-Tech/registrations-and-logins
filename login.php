<?php
$login=0;
$invalid=0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql ="select * from `registration` where username
    ='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    if($result) {
        $num = mysqli_num_rows($result);
        if($num > 0) {
$login=1;
session_start();
$_SESSION["username"]=$username;
header("location:home.php");
        } else {
$invalid=1;                       }
        }
    }

?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <?php
    if($invalid){
     echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Invalid credential;

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
        if($login){
     echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are successfully  logged in.
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
?>
    <h1 class="text-center">login to  our  website</h1>
    <div class="container mt-5">
    <form action="login.php"method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
    <input type="text" class="form-control"name="username" placeholder="Enter you username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder=" Enter you password">
  </div>

  <button type="submit" class="btn btn-primary w-100 ">Login</button>
</form>
    </div>
  </body>
</html>