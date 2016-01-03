<?php
namespace YABA;

require_once('includes/includes.inc.php');

session_start();

if(!logged_in()){
  header('Location: index.php');
  exit();
}
$pages = [
  'newpost',
];
$page = array_key_exists('page', $_GET)?$_GET['page']:'newpost';

if($_SERVER['REQUEST_METHOD'] == "GET") {
  load_page($page);
} else {
  call_user_func("YABA\\$page");
}

function newpost() {
  $title = $_POST['post_title'];
  $text = $_POST['post_text'];
  $category = $_POST['post_category'];
  $author = $_SESSION['user_id'];
  
  add_post($title, $text, $category, $author);
}

?>
