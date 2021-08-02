 
 
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1); 
global $server,$user,$password,$db,$sock,$id,$spage,$pg,$ajax,$com;


if ($ajax == 0) {
     $partAA = "<div id=\"container_l_menu\">";
     $partAAZ = "</div>";
     $partA = "<div id =\"container_l_statiscs\">";
     $partAZ = "</div>";
     $partB = "<div id=\"opt_bar\">";
     $partBZ = "</div>";
}
else {
     $partAA = "[container_l_menu]";
     $partAAZ = "[/container_l_menu]";
     $partA = "[container_l_statiscs]";
     $partAZ = "[/container_l_statiscs]";
     $partB = "[opt_bar]";
     $partBZ = "[/opt_bar]";
}

if ((preg_match("/^webapps_development|websites_creation|websites_auditing|penetration_test|software_engineering$/",$spage))&&($id != "null")) {
     $idd = 1;
     increment($spage,$id);
     if ($ajax == 0) {
          show_header("portfolio",$spage,1,$id);
     }
     $wh = $spage;
}
elseif ((preg_match("/^webapps_development|websites_creation|websites_auditing|penetration_test|software_engineering$/",$spage))&&($id == "null")) {
     $idd = 1;
     if ($ajax == 0) {
          show_header("portfolio",$spage,0,$id);
     }
     $wh = $spage;
}
else {
     $idd = 0;
     if ($ajax == 0) {
          show_header("portfolio","portfolio");
     }
     $wh = "portfolio";
}

if ($ajax == 0) {
     echo "<div id = \"container_l\">";
}

echo $partAA."<ul>";
$arrz = array("Services" => "services", "WebApps Develop" => "webapps_development", "WebSites Creation" => "websites_creation", "WebSites Auditing" => "websites_auditing", "Penetration Test" => "penetration_test", "Software Engineering" => "software_engineering");


foreach ($arrz as $k => $v) {
     if ($wh == "$v") {
          $st = "class =\"bgh\"";
          if ($wh == "services") {
               $st2 = "href=\"?page=services&subsec=".$v."\"";   
          }
          else {
               $st2 = "href=\"?page=services&subsec=".$v."\" onClick =\"loadPage('page=services,subsec=".$v.",id=null,pg=null,meta=off','get');return false;\"";
          }
          
     }
     else {
          $st = "class =\"nn\" onMouseOver=\"this.style.backgroundColor='#D8D5ED'; this.style.color='white';\" onMouseOut=\"this.style.backgroundColor='white';
                    this.style.color='black';\"";
          if ($v == "services") {
               $st2 = "href=\"?page=services\"";
          }
          else {
               $st2 = "href=\"?page=services&subsec=".$v."\" onClick =\"loadPage('page=services,subsec=".$v.",id=null,pg=null,meta=off','get');return false;\"";
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
     $str = "<li ".$st."><a ".$st2."><img class=\"".$cl."\" align=\"left\" src= \"./graphic/".$pic."\">".$k."</a></li>";
     echo $str;
}
echo "</ul>".$partAAZ;



/*
echo $partA."<div id=\"container_l_statiscs_a\"><div class=\"nav_title_cont\"><p><b>Statistics</b></p></div><p>";
$numbers = array("live_auditing","exploits","softwares","articles","videos");
$c = 0;
foreach ($numbers as $k => $v) {
     $c++;
     if ($c > 2) {
          $query = "SELECT id FROM $v WHERE section_tag = 'services'";
     }
     else {
          $query = "SELECT id FROM $v";
     }
     $res = mysql_query($query,$sock);
     $num = mysql_num_rows($res);
     if ($c == 1) {
          $str = "vulnerable websites found";
     }
     elseif ($c == 2) {
          $str = "exploits";
     }
     elseif ($c == 3) {
          $str = "services tools";
     }
     elseif ($c == 4) {
          $str = "services articles";
     }
     elseif ($c == 5) {
          $str = "services videos";
     }
     echo $num." - ".$str."<br>";
}
echo "</p>";

if (!preg_match("/^live_auditing|exploits|softwares|articles|videos$/",$spage)) {
     echo "</div><div id=\"container_l_statiscs_b\"><div class=\"nav_title_cont\"><p><b>Top views > <img align=\"left\" src=\"./graphic/gif_services.jpg\">Security</b></p></div><p>";
     $cc = 0;
     foreach ($numbers as $k => $v) {
          $cc++;
          if ($cc > 2) {//echo "kkkkkkkkkkkkkkkkkkkkkkkkk<br>";
               $aa = "WHERE section_tag = 'services'";
          }
          else {
               $aa = "";
          }
          $query = "SELECT * FROM ".$v." ".$aa." ORDER BY views DESC LIMIT 0,1";//echo $query."<br>";
          get_populars($query,"services",$v,1);
     }
}
else {
     echo "</div><div id=\"container_l_statiscs_b\"><div class=\"nav_title_cont\"><p><b>Top views > $spage</b></p></div><p>";

     if (!preg_match("/^live_auditing|exploits$/",$spage)) {//echo "kkkkkkkkkkkkkkkkkkkkkkkkk<br>";
          $aa = "WHERE section_tag = 'services'";
     }
     else {
          $aa = "";
     }
     $query = "SELECT * FROM ".$spage." ".$aa." ORDER BY views DESC LIMIT 0,5";//echo $query."<br>";
     get_populars($query,"services",$spage,0);
}
echo "</p></div>".$partAZ;
*/


if ($ajax == 0) {
     echo "</div>";
}
                         
if ($spage == "null") {
     // mostra la home di services
     services_home();

}
elseif (preg_match("/^webapps_development|websites_creation|websites_auditing|penetration_test|software_engineering|non_classified$/",$spage)) {
     // mostra la home della subsec
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
     echo "<div id=\"container_r\"><div id=\"container_r_content\"><div id=\"welcome\"><p>
Benvenuto nella sezione relativa alla sicurezza informatica. Potrai trovare tutti gli exploit e advisory pubblicati, relativi
ad applicazioni web e software generali. Sono inoltre pubblicati i report di siti web sui quali ho trovato falle, per i siti
più importanti per motivi di privacy, il report non è disponibile al pubblico. La sezione illustra inoltre tutti i video, tool
e articoli pubblicati relativi alla sicurezza informatica. Buona navigazione
</p></div><div id=\"last_added\">";
echo "<p><b>Recently added</b><br><br>";
//<div class=\"nav_title_cont_add\"><p><b>Recently added</b></p></div><p>";


$arr   = array();
$query = array("SELECT * FROM live_auditing ORDER BY id DESC LIMIT 0,7",
               "SELECT * FROM exploits ORDER BY id DESC LIMIT 0,7",
               "SELECT * FROM softwares WHERE section_tag = 'services' ORDER BY id DESC LIMIT 0,7",
               "SELECT * FROM articles WHERE section_tag = 'services' ORDER BY id DESC LIMIT 0,7",
               "SELECT * FROM videos WHERE section_tag = 'services' ORDER BY id DESC LIMIT 0,7");

foreach ($query as $k => $v) {
     $res = mysql_query($v, $sock);
     while ($re = mysql_fetch_array($res)) {
          if ($k == 0) {
               $spage = "live_auditing";
          }
          elseif ($k == 1) {
               $spage = "exploits";
          }
          elseif ($k == 2) {
               $spage = "softwares";
          }
          elseif ($k == 3) {
               $spage = "articles";
          }
          elseif ($k == 4) {
               $spage = "videos";
          }
          $var = "!_".$spage."_!_".$re['id']."_!_".$re['title']."_!";
          $arr[$var] = strtotime($re['date']);
     }
}

arsort($arr);
array_splice($arr, 5);
foreach ($arr as $k => $v) {
     if (preg_match('/!_(.+)_!_([0-9]+)_!_(.+)_!/',$k,$m)) {
          $spage = $m[1];
          $id = $m[2];
          $title = $m[3];
     }
     $b = date ("Y-m-d", $v);
     $meta_tags = get_meta_tag($spage,1,$id,1);
     $spage = preg_replace('/_/', ' ',$spage);
     $str = "<img class=\"space\" align=\"left\" src=\"./graphic/az.png\"> Added <a href=\"?page=services&subsec=$spage&id=".$id."\"
             onClick =\"loadPage('page=services,subsec=$spage,id=$id,".
             "pg=null,meta=".$meta_tags."','get');return false;\"><b>$title</b></a> in
             <a href=\"?page=services&subsec=$spage\" onClick =\"loadPage('page=services,".
            "subsec=$spage,id=null,pg=null,meta=off','get');return false;\"><b>$spage</b></a> on <i>$b</i><br><br>";
     echo $str;
}






     echo "</p></div></div><div id=\"opt_bar_i\"></div><div id=\"insert_pm\"></div></div>";
}


?>