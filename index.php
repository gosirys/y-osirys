<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./config.php");
include("./functions.php");

$sock = mysql_connection(1);

$page   = isset($_GET['page'])    ? secure($_GET['page'],2)    : "";
$spage  = isset($_GET['subsec'])  ? secure($_GET['subsec'],2)  : "null";
$search = isset($_POST['search']) ? secure($_POST['search'],2) : "";
$id     = isset($_GET['id'])      ? secure($_GET['id'],1)      : "null";
$pg     = isset($_GET['pg'])      ? secure($_GET['pg'],1)      : "null";

/*
if (isset($_POST['search_submit'])) {
     if (strlen($search) > 0) {
          include("./search.php");
     }
     else {
          // 1 -> campo mancante
          show_error("search",1);
     }
}
*/

if (strlen($page) > 0) {
     if (preg_match("/^home$|^services$|^portfolio$|^security$|^softwares$|^documents$|^about_me$/",$page)) {
          $ajax = 0;
          $com  = "off";
          include($page.".php");
     }
     else {
          include("./home.php");
     }
}
else {
     include("./home.php");
}

show_footer();
mysql_connection(0);

?>
