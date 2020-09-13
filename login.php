<?php

include 'database.php';

if (isset($_SESSION['no_user'])) {
  header("location:index.php");
  exit;
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass     = $_POST['pass'];

  $result = mysqli_query($db, "SELECT * FROM users WHERE email='$email' ");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_array($result);
    if (password_verify($pass, $row['pasword'])) {
      $_SESSION['no_user'] = $row['no'];
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['level'] = $row['level'];
      $_SESSION['password'] = $row['pasword'];
      $_SESSION['status'] = $row['status'];

      echo "<script>window.location='index.php'</script>";
    }else {
    echo "<script>alert('Login Anda Gagal!')</script>";
    echo "<script>window.location='login.php'</script>";
  }
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo1.png" type="image/ico" />

  <title>Klinik Citra Madina</title>

  <!-- Bootstrap -->
  <link href="aset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="aset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="aset/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="aset/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="aset/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post">
            <h1>Login Form</h1>
            <div>
              <input type="email" class="form-control" name="email" placeholder="Email" required="required" autofocus/>
            </div>
            <div>
              <input type="password" class="form-control" name="pass" placeholder="Password" required="required" />
            </div>
            <div class="pull-left">
              <button class="btn btn-default submit" type="submit" name="login">Login</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">

              <div class="clearfix"></div>
              <br />

              <div>
                <!-- <img src="images/citra.png" alt=""> -->
                <h1><img src="images/logo1.png" alt=""> Klinik Citra Madina</h1>
                <p><?php echo "Copyright © " . (int)date('Y') . " Klinik Citra Madina"; ?></p>
              </div>
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</body>
</html>
