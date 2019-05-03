<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: home.php');
}
?>

<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {
    $title = $_POST['content_title'];
    $text = $_POST['content_text'];
    $comment = $_POST['content_comment'];
    $loginId = $_SESSION['id'];

    // checking empty fields
    if(empty($title) || empty($text) || empty($comment)) {
        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if(empty($text)) {
            echo "<font color='red'>Text field is empty.</font><br/>";
        }

        if(empty($comment)) {
            echo "<font color='red'>Comment field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO content_table(content_title, content_text, content_comment, user_id) VALUES('$title','$text','$comment','$loginId')");

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='home.php'>View Result</a>";
    }
}
?>
</body>
</html>
