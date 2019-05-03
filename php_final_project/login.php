<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BamBoo</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        padding-top: 5rem;
        background-color: #7BBA58;
      }

      .login-container {
        background-color: #ffffff;
        border: 0;
        padding: 50px 25px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }

      .text-for-regis {
        text-align: center;
        color: #cccccc;
      }

      .text-for-regis>a {}

      input.form-control.login-form-fix {
        border-radius: 0;
        margin-top: 30px;
        margin-bottom: 30px;
        border: 0;
        background-color: #eeeeee;

      }
      button.login-btn-fix {
        border-radius: 0;
        margin-bottom: 30px;
      }
    </style>
  </head>

  <body data-gr-c-s-loaded="true">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Bamboo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="home.php">Home </a>
          </li>
          <li class="nav-item active"><a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        </ul>
      </div>
    </nav>
    <main role="main" class="container main-content-container">
      <div class="starter-template">
        <h1 class="invisible">Bamboo is a self content managment platform. </h1>
        <p class="lead">
        </p>
        <br />
        <div class="row justify-content-md-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-container">
              <?php
              include("connection.php");

              if(isset($_POST['submit'])) {
                  $user = mysqli_real_escape_string($mysqli, $_POST['loginname']);
                  $pass = mysqli_real_escape_string($mysqli, $_POST['loginpassword']);

                  if($user == "" || $pass == "") {
                      echo "Either username or password field is empty.";
                      echo "<br/>";
                      echo "<a href='login.php'>Go back</a>";
                  } else {
                      $result = mysqli_query($mysqli, "SELECT * FROM user_table WHERE user_name='$user' AND dashed_password='$pass'")
                      or die("Could not execute the select query.");
                      $row = mysqli_fetch_assoc($result);
                      if(is_array($row) && !empty($row)) {
                          $validuser = $row['user_name'];
                          $_SESSION['valid'] = $validuser;
                          $_SESSION['name'] = $row['user_name'];
                          $_SESSION['id'] = $row['user_id'];
                      } else {
                          echo "Invalid username or password.";
                          echo "<br/>";
                          echo "<a href='login.php'>Go back</a>";
                      }
                      if(isset($_SESSION['valid'])) {
                          header('Location: home.php');
                      }
                  }
              } else {
              ?>
              <p><font size="+2">Login</font></p>
              <form name="form1" method="post" action="">
                <div class="form-group">
                  <!-- <label for="formGroupExampleInput">Example label</label> -->
                  <input type="text" class="form-control login-form-fix" id="loginname" name ="loginname" placeholder="Username" >
                </div>
                <div class="form-group">
                  <!-- <label for="formGroupExampleInput2">Another label</label> -->
                  <input type="text" class="form-control login-form-fix" id="loginpassword" name ="loginpassword" placeholder="Password">
                </div>
                <button class="btn btn-success btn-block login-btn-fix" type="submit" name="submit" value="Submit">LOGIN</button>
              </form>
              <?php
              }
              ?>
              <p class="text-for-regis">Not registered? <a href="register.php" class="sucess">Create an account</a></p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- /.container -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>
