<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BamBoo</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <style media="screen">

      body {
        padding-top: 5rem;
        background-color: #7BBA58;
      }

      .starter-template {
        padding: 2rem 1rem;
        text-align: center;
      }

      .welcome-container>p.pull-right {
        text-align: right;
      }
      .register-container {
        background-color: #ffffff;
        /* border: 1px solid #000000; */
        padding: 50px 25px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }

      .text-for-regis {
        text-align: center;
        color: #cccccc;
      }
      .text-for-regis>a {}
      input.form-control.register-form-fix {
        border-radius: 0;
        /* margin-top: 30px; */
        margin-bottom: 30px;
        border: 0;
        background-color: #eeeeee;
      }
      button.register-btn-fix {
        border-radius: 0;
        margin-bottom: 30px;
      }
      .update-textarea-fix{
        min-height: 300px;
        overflow: scroll;
        border: 0;
        background-color: #eeeeee;
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
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="container main-content-container">
      <div class="">
        <h1 class="invisible">Bamboo is a self content managment platform.</h1>
        <br />
        <div class="welcome-container">
          <p class="pull-right">
            Welcome back, <b>Sijia</b> / <a href="">Log Out</a>
          </p>
        </div>

            <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <div class="row justify-content-md-center">
              <div class="col-md-12  ">
                <div class="register-container">
            <form name="form4" method="post" action="addresult.php">
              <div class="form-group">
                <label for="content_title">Title</label>
                <input type="text" class="form-control register-form-fix" id="content_title" name ="content_title" placeholder="Content Title" >
              </div>
              <div class="form-group">
                <label for="content_text">Text</label>
                <textarea class="form-control update-textarea-fix" id="content_text" name ="content_text" placeholder="Please input your content" row="50"></textarea>
              </div>
              <div class="form-group">
                <label for="content_comment">Comment</label>
                <input type="text" class="form-control register-form-fix" id="content_comment" name ="content_comment" placeholder="Comments" >
              </div>

              <button class="btn btn-success btn-block register-btn-fix" type="submit" name="Submit" value="Add">Add to Content</button>
            </form>

          </div>
        </div>
      </div>
    </main>
    <!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>

</html>
