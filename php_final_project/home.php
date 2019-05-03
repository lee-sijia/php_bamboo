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
      a.link-in-button-normal{
        text-decoration: none;
        padding:10px 15px;
        background-color: #6c757d;
        color: #ffffff;
        margin-left: 10px;


      }
      a.link-in-button-danger{
        text-decoration: none;
        padding:10px 15px;
        background-color: #dc3545;
        color: #ffffff;
        margin-left: 10px;
      }
      a.add-button-style{
        display: inline-block;
        text-align: left;
        margin-left: 0;
        margin-top: 20px;
        margin-bottom: 20px;
      }
      button.search-reset-button{
        margin-left: 10px;
      }
      .search-container{
        position: relative;
      }
      .search-container>.form-control{
        border-radius: 0;
      }
      #livesearch{


        /* background-color: #ffffff; */
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
        <h1>Bamboo is a self content managment platform.</h1>
        <br />
        <div class="welcome-container">
          <p class="pull-right">
            Welcome back, <b><?php echo $_SESSION['name'] ?></b> / <a href="logout.php">Log Out</a>
          </p>
        </div>
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <a href="edit.php">Detail</a> </li>
          </ol>
        </nav> -->
        <!-- form here is the searh form -->
        <form class="form-inline my-2 my-lg-0 search-container" action="" method="post" >
          <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" type="search" id="keyword">

          <button class="btn btn-secondary my-2 my-sm-0" type="submit" data-toggle="tooltip" data-placement="right" title="You can input the key words to search content" name="Submit" value="Search" onkeyup="showResult(this.value)">Search</button>
          <button class="btn btn-secondary my-2 my-sm-0 search-reset-button" type="submit"  title="You can input the key words to search content" name="Submit" value="Search">Reset</button>
        </form>
        <a href="add.php" class="link-in-button-normal add-button-style">Add a content</a>
        <br />
        <div id="livesearch">
          Search Result (Click to see detail):
          <ul id="content">

          </ul>
        </div>
        <?php
        //including the database connection file
        include_once("connection.php");
        if (isset($_POST['Submit'])) {
          $search=$_POST['search'];
          $searchres= mysqli_query($mysqli, "SELECT * FROM content_table WHERE user_id=".$_SESSION['id']." && (content_title like '%{$search}%'|| content_text like '%{$search}%' || content_comment like '%{$search}%')");
          if (mysqli_num_rows($searchres)>0){
            $result = $searchres;
          } else {
            echo "No Content Found<br><br>";
            $result = $searchres;
          }
        } else {
          $result = mysqli_query($mysqli, "SELECT * FROM content_table WHERE user_id=".$_SESSION['id']." ORDER BY content_id DESC");
        }
        ?>
        <!-- from here is the main content -->
        <div class="">
          <?php
           while($res = mysqli_fetch_array($result)) {
               // echo "<tr>";
               // echo "<td>".$res['name']."</td>";
               // echo "<td>".$res['qty']."</td>";
               // echo "<td>".$res['price']."</td>";
               // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
               echo "<div class=''>";
               echo "<div class='jumbotron'>";
               echo "<h1 class='display-4'>".$res['content_title']."</h1>";
               echo "<p class='lead'>".$res['content_text']."</p>";
               echo "<hr class='my-4'>";
               echo "<p >".$res['content_comment']."</p>";
               echo "<div  role='group'>";
               echo "<a type='' class='link-in-button-normal' href='edit.php?id=".$res['content_id']."'>Edit</a>";
               echo "<a type='' class='link-in-button-danger' href='delete.php?id=".$res['content_id']."' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
           }
           ?>
        </div>
      </div>
    </main>
    <!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
      $('#keyword').on('input', function() {

        var searchKeyword = $(this).val();

        if (searchKeyword.length >= 3) {
          // console.log("1"+searchKeyword);
          $.post('search.php', {keywords: searchKeyword}, function(data) {
            // console.log("2"+data);
            $('ul#content').empty()
            $.each(data, function() {
              $('ul#content').append('<li><a href="edit.php?id=' + this.content_id + '">' + this.content_title + '</a></li>');
            });
          }, "json");
        }
      });
    });
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })
      </script>
  </body>

</html>
