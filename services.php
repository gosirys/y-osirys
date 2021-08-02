<?php

error_reporting(0);
ini_set('display_errors','Off');

global $server,$user,$password,$db,$sock,$id,$spage,$pg,$ajax,$com,$site_path;

if ($ajax == 0) {
     $partAA = "<div id=\"container_l_a\">";
     $partAAZ = "</div>";
     $partA = "<div id =\"container_l_b\">";
     $partAZ = "</div>";
     $partB = "<div id=\"opt_bar\">";
     $partBZ = "</div>";
}
else {
     $partAA = "[container_l_a]";
     $partAAZ = "[/container_l_a]";
     $partA = "[container_l_b]";
     $partAZ = "[/container_l_b]";
     $partB = "[opt_bar]";
     $partBZ = "[/opt_bar]";
}


if ((preg_match("/^web_services$|^security_services$/",$spage))&&($id != "null")) {
     $idd = 1;
     increment($spage,$id);
     if ($ajax == 0) {
          show_header("services",$spage,1,$id);
     }
     $wh = $spage;
}
elseif ((preg_match("/^web_services$|^security_services$/",$spage))&&($id == "null")) {
     $idd = 1;
     if ($ajax == 0) {
          show_header("services",$spage,0,$id);
     }
     $wh = $spage;
}
else {
     $idd = 0;
     if ($ajax == 0) {
          show_header("services","services");
     }
     $wh = "services";
}

if ($ajax == 0) {
     echo "<div id = \"container_l\">";
}

echo $partAA."<div id=\"container_l_menu\"><ul>";
$arrz = array("Services" => "services", "Web Development" => "web_services", "IT Security" => "security_services");


foreach ($arrz as $k => $v) {
     if ($wh == "$v") {
          $st = "class =\"bgh\"";
          if ($wh == "services") {
               $st2 = "href=\"".$site_path."/services/\"";   
          }
          else {
               $st2 = "href=\"".$site_path."/services/".$v."/\" onclick =\"loadPage('page=services,subsec=".$v.",meta=off','get');return false;\"";
          }
     }
     else {
          $st = "class =\"nn\" onmouseover=\"this.style.backgroundColor='#D8D5ED'; this.style.color='white';\" onmouseout=\"this.style.backgroundColor='white';
                    this.style.color='black';\"";
          if ($v == "services") {
               $st2 = "href=\"".$site_path."/services/\"";
          }
          else {
               $st2 = "href=\"".$site_path."/services/".$v."/\" onclick =\"loadPage('page=services,subsec=".$v.",meta=off','get');return false;\"";
          }
     }
     if ($v == "services") {
          $cl = "space11";
          $pic = "home1.png";
     }
     else {
          $cl = "space";
          $pic = "w.png";
     }
     $str = "<li ".$st."><a ".$st2."><img alt=\"$k\" class=\"".$cl."\" align=\"left\" src= \"".$site_path."/graphic/".$pic."\"/>".$k."</a></li>";
     echo $str;
}
echo "</ul></div>".$partAAZ;

if ($ajax == 0) {
     echo "</div>";
}
                         
if ($spage == "null") {
     services_home();

}
elseif (preg_match("/^web_services$|^security_services$/",$spage)) {
     if ($ajax == 0) {
          echo "<div id=\"container_r\">";
     }
     content_db($page,$spage);
     if ($ajax == 0) {
          echo "</div>";
     }
}


function services_home() {
     global $sock;
     echo "<div id=\"container_r\">";
	content_db("services","services_home");
	echo "</div>";
}


?>