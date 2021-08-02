<?php

error_reporting(0);
ini_set('display_errors','Off');

include("./functions.php");
include("./config.php");
$sock = mysql_connection(1);

if (isset($_GET['params'])) {
     $ajax = 1;
     $rest = urldecode($_GET['params']);
     $a = 0;
     if (preg_match("/^page=([^,]+),subsec=([^,]+),id=([^,]+),pg=([^,]+)$/",$rest,$matches)) {
          $a = 1;
          $page  = secure($matches[1],2);
          $spage = secure($matches[2],2);
          $id    = secure($matches[3],1);
          $pg    = secure($matches[4],1);
     }
     if ($a == 1) {
          require($page.".php");
     }
     else {
          require("./home.php");
     }
}
elseif (isset($_POST['post'])) {
     $ajax = 1;
     $bad = 0;
     if ($_POST['post'] == "1") {
          if ((isset($_POST['subsec']))&&(isset($_POST['id']))&&(isset($_POST['com']))) {
               $spage = secure($_POST['subsec'],2);
               $id    = secure($_POST['id'],1);
               $com   = secure($_POST['com'],2);
               if (preg_match('/zzz/',$spage)) {
                    send_pm($com);
               }
               else {
                    send_comment($spage,$id,$com);
               }
          }
          else {
               $bad = 1;
          }
     }
     else {
          $bad = 1;
     }
     if ($bad == 1) {
          // error
     }
}

mysql_connection(0);        

?>