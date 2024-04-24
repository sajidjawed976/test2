<?php
$showAlert= false;
$showError= false; 
$unique_username = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["confirmpassword"];
  $exists= false;

  $sqlexist = "SELECT * FROM signup WHERE username = '$username'";
  $result1 = mysqli_query($con, $sqlexist);
  if(mysqli_num_rows($result1) > 0) {
    $unique_username = true;
  }
  else {


  if (($password == $cpassword && $exists == false)) {
    $sql = "INSERT INTO `signup` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())  ";
    $result = mysqli_query($con, $sql) or die("query unsuccessful");
    if ($result) {
      $showAlert = true;
    }

  }
  else{
    $showError = true;
  }
  
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">

    <title>Sign Up</title>
  </head>
  <body>
    <?php  require 'partials/_nav.php'; ?>

    <?php
    if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created and you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($showError) {
      echo '<div class="alert alert-danger
      
      alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Password do not match.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
      }
      if ($unique_username) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>Username already taken. Please change your username.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      }
?>
    <div class="container my-4">

    <h1 class = text-center>Sign up to our website</h1>
    <form action = 'signup.php' method = 'post'>
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="exampleInputEmail1"name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
    <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="checkout">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" name="submit">Signup</button>
</form>

<!-- <?php    ?> -->


    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
     integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
     integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>