<?php
$success=0;
$user=0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from registration where username='$username'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $num = mysqli_num_rows($result);
        if($num > 0) {
            // echo "User already exists";
            $user=1;
        } else {
            $sql = "insert into registration (username, password) values ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                // echo "Signup successful";
                $success=1;
            } else {
                die(mysqli_error($conn));
            }
        }
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
    if($user){
     echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed Try again!</strong> user already exist

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
        if($success){
     echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are successfully  signed up.
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
?>
    <h1 class="text-center">Sign Up Page</h1>
    <div class="container mt-5">
    <form action="sign.php"method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
    <input type="text" class="form-control"name="username" placeholder="Enter you username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder=" Enter you password">
  </div>

  <button type="submit" class="btn btn-primary w-100 ">Register</button>
</form>
    </div>
  </body>
</html>