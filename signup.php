<?php
include "connect.php";
$dis = 0;
$exit =false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $dis = false;
  $name = $_POST['name'];
  $password = $_POST['password'];

  $cpasswor = $_POST['cpassword'];
  $sql_u = "SELECT * FROM users123 WHERE name='$name'";
  $check_que=mysqli_query($sql,$sql_u);
  if(mysqli_num_rows($check_que) > 0){
    $exit=true;
  }
  if ($cpasswor == $password && $exit==false) {
    $dis = 1;

    $que = "INSERT INTO `users123` (`name`, `password`, `datetime`) VALUES ('$name', '$password', current_timestamp());";
    $res = mysqli_query($sql, $que);
    if ($res) {
      // echo "Okay";
    } else {
      echo mysqli_error($sql);
    }
  } else {
    $dis = 0;
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <?php require "navbar.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($dis == 0) {
      echo ' <div class="alert alert-danger" role="alert">
    The password field are not same or user already exit. Please try again! 
  </div>';
    } else {
      echo ' <div class="alert alert-success" role="alert">
  Your account has been created successfully!
    </div>';
      header("refresh:1; url=login.php");
    }
  }
  ?>
  <div class="col-6">

    <form action="signup.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="name" placeholder="Your name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" placeholder="Password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Final-Password</label>
        <input name="cpassword" placeholder="Password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>