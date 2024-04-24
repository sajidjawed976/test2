<?php
$login= false;
$showError= false; 
$destroy = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];

 
    $sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($con, $sql) or die("query unsuccessful");
    if (mysqli_num_rows($result) > 0) {

      
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true; 
      $_SESSION ['username'] = $username;
      header("location: http://localhost/loginsystem/welcome.php");
    }

  else{
    $showError = true;
  }
      
  
}

session_start();

// Check if the logout parameter is set and display the message accordingly
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
   $destroy = true;
}






// if (isset($_POST['submit'])) {
//   header('Location: http://localhost/loginsystem/welcome.php');
//   exit; // Ensure that no further code is executed after the redirect
// }


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

    <title>Login</title>
  </head>
  <body>
    <?php  require 'partials/_nav.php'; ?>

    <?php
    if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($showError) {
      echo '<div class="alert alert-danger
      
      alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
      }
      if($destroy){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success:</strong> You are logged out.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
      }
     
?>
    <div class="container my-4">

    <h1 class = text-center>Log in to our website</h1>
    <form action = 'login.php' method = 'post'>
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="exampleInputEmail1"name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <!-- <div class="mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
    <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
  </div> -->
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="checkout">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>


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