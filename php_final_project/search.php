<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>


<?php
include_once("connection.php");
$arr = array();
  if (!empty($_POST['keywords'])) {
     $keywords = $_POST['keywords'];
     $searchres= mysqli_query($mysqli, "SELECT content_id, content_title FROM content_table WHERE user_id=".$_SESSION['id']." && (content_title like '%{$keywords}%'|| content_text like '%{$keywords}%' || content_comment like '%{$keywords}%')");

     if (mysqli_num_rows($searchres) > 0) {
       while ($obj = $searchres->fetch_object()) {
        $arr[] = array('content_id' => $obj->content_id, 'content_title' => $obj->content_title);
       }
     }
  }
echo json_encode($arr);
// echo $searchres;
// echo $_POST['keywords'];
// echo json_encode($keywords);
?>
