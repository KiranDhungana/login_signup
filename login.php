<?php
$disp = 1;
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $password = $_POST['password'];
  $quer = "select *from users123 where name = '$name' and password = '$password'";
  $res = mysqli_query($sql, $quer);
  if (!$res) {
    echo mysqli_error($sql);
  } else {
    
  }
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    $disp = 1;
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    header("location:welcome.php");
    // echo "Record found";
  }else{
    $disp=0;
  }
} else {

  
  echo mysqli_error($sql);
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
  <?php include "navbar.php";
  if ($disp == 0) {
    echo ' <div class="alert alert-danger" role="alert">
    The account is not created yet go to signup page and create a new account!
  </div>';
  }
  ?>
  <div class="col-6">


    <form action="login.php" method="post">
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