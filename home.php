<?php

error_reporting(0);
ini_set('display_errors','Off');

global $server,$user,$password,$db,$sock,$id,$spage,$pg,$ajax,$com,$site_path;
          
show_header("home","home");
$cv = enc("encode","texts/cv.pdf");
echo "<div id = \"container_l\"><div id =\"container_l_a\"><div class=\"nav_title_cont\">
	<img alt =\"user\" class=\"space45\" src= \"".$site_path."/graphic/user.png\"/><span class=\"vc\"><b>About Me</b></span>
	</div><p><img alt=\"Giovanni Buzzin\" class=\"spic\" align=\"left\" src= \"".$site_path."/graphic/me.jpg\"/><br /><b>Cv</b>
	<a href=\"".$site_path."/download/$cv/no1\"><img alt=\"cv\" class=\"space455\" src= \"".$site_path."/graphic/cv.png\"/></a><br /><br />
	<b>who ></b> Giovanni Buzzin, \"Osirys\"<br /><br /><b>whoami ></b> Web Developer, Programmer, Security Researcher, Ethical Hacker<br />
	<br /><b>languages ></b> (x)HTML, CSS, PHP, Javascript, Ajax, MySQL, Bash, Perl, Python<br /><br /><b>Mail  ></b>
	osirys[at]autistici[dot]org<br /><b>Skype ></b> gosirys</p></div><div id=\"container_l_b\"><div class=\"nav_title_cont\">
	<img alt=\"stat\" class=\"space45\" src= \"".$site_path."/graphic/stat.png\"/><span class=\"vc\"><b>Statistics</b></span></div><table class=\"stable\">";

$queryz = array("Exploits" => "exploits",
                "Softwares" => "softwares",
                "WebApps Dev" => "web_apps",
                "WebSites" => "web_apps",
                "Articles" => "articles",
                "Videos" => "videos");

foreach ($queryz as $k => $v) {
     $query = "SELECT * FROM ".$v;
     $res = mysql_query($query, $sock);
     $nr = mysql_num_rows($res);
     echo "<tr><td class=\"statnumb\"><b>$nr</b></td><td class=\"statname\">$k</td></tr>";
}

echo "</table></div></div>";

$query = "SELECT content FROM texts WHERE title = 'home_welcome'";
$res = mysql_query($query, $sock);
$re = mysql_fetch_array($res);

echo "<div id=\"container_r\"><div id=\"container_r_content\"><div id=\"welcome\">".$re['content']."</div>";

$query = "SELECT content FROM texts WHERE title = 'home_serv'";
$res = mysql_query($query, $sock);
$re = mysql_fetch_array($res);

echo "<div id=\"home_middle\"><div id=\"home_middle_l\"><div class=\"nav_title_cont_h\">
	<img alt=\"services\" class=\"space45\" src= \"".$site_path."/graphic/servzz.png\"/><span class=\"vc\"><b>Services</b></span>
	</div>".$re['content']."</div><div id=\"home_middle_r\"><div class=\"nav_title_cont_h\">
	<img alt=\"stat\" class=\"space45\" src= \"".$site_path."/graphic/stat.png\"/><span class=\"vc\"><b>Recently added</b></span>
	</div><div id=\"home_middle_r_cont\" onmouseover=\"copyspeed=pausespeed\" onmouseout=\"copyspeed=marqueespeed\">
	<div id=\"home_middle_r_cont2\"><p>";

$arr   = array();
$query = array(
               "SELECT * FROM exploits ORDER BY id DESC LIMIT 0,10",
               "SELECT * FROM softwares ORDER BY id DESC LIMIT 0,10",
               "SELECT * FROM articles  ORDER BY id DESC LIMIT 0,10",
               "SELECT * FROM web_apps  ORDER BY id DESC LIMIT 0,10",
               "SELECT * FROM videos ORDER BY id DESC LIMIT 0,10");

foreach ($query as $k => $v) {
     $res = mysql_query($v, $sock);
     while ($re = mysql_fetch_array($res)) {

          if ($k == 0) {
               $spage = "exploits";
          }
          elseif ($k == 1) {
               $spage = "softwares";
          }
          elseif ($k == 2) {
               $spage = "articles";
          }
          elseif ($k == 3) {
               $spage = "web_apps";
          }
          elseif ($k == 4) {
               $spage = "videos";
          }
          $var = "!_".$spage."_!_".$re['id']."_!_".$re['title']."_!";
          $arr[$var] = strtotime($re['date']);
     }
}

arsort($arr);
array_splice($arr, 15);
foreach ($arr as $k => $v) {
     if (preg_match('/!_(.+)_!_([0-9]+)_!_(.+)_!/',$k,$m)) {
          $spage = $m[1];
          $id = $m[2];
          $title = $m[3];
     }//echo "hh $spage<br>";
     $b = date ("Y-m-d", $v);
     $ap = $spage;
     $ap = preg_replace('/_/', ' ', $ap);
     $meta_tags = get_meta_tag($spage,1,$id,1);

	if (preg_match('/live_auditing|exploits/',$spage)) {
		$page = "security";
	}
	elseif (preg_match('/articles|videos/',$spage)) {
		$page = "documents";
	}
	elseif (preg_match('/softwares|web_apps/',$spage)) {
		$page = "softwares";
		$spage = "m-softwares";
	}

	if (preg_match('/live/',$spage)) {
		$downll = "<b>$title</b> in <a href=\"".$site_path."/$page/$spage/\" onclick =\"loadPage('page=$page,".
            "subsec=$spage,meta=off','get');return false;\"><b>$ap</b></a>";
	}
	else {
		$downll = "<a href=\"".$site_path."/$page/$spage/id".$id."\"
             onclick =\"loadPage('page=$page,subsec=$spage,id=$id,".
             "meta=".$meta_tags."','get');return false;\"><b>$title</b></a> in
             <a href=\"".$site_path."/$page/$spage/\" onclick =\"loadPage('page=$page,".
            "subsec=$spage,meta=off','get');return false;\"><b>$ap</b></a>";
	}
     $str = "<img alt=\"az\" class=\"space\" align=\"left\" src=\"".$site_path."/graphic/az.png\"/> Added $downll on <i>$b</i><br /><br />";
     echo $str;
}

echo "</p></div></div></div></div>";

$hquery = "SELECT * FROM softwares WHERE id=10";
$meta_tags = get_meta_tag("softwares",1,10,1);
$res = mysql_query($hquery, $sock);
$re = mysql_fetch_array($res);
$pc = " - Tag ".$re['section_tag'];
$str = "Posted on ".$re['date']." - Language ".$re['language']." - Views ".$re['views']." - Downloads ".$re['downloads'].$pc;

echo "<div id=\"home_high\"><p id=\"titlez\">Highlighted</p><div id=\"sof_high\"><div id=\"sof_highA\">
	<img alt=\"software\" style=\"margin-left: 11px; margin-top: 5px;\" src=\"".$site_path."/graphic/exec.jpg\"/></div><div id=\"sof_highB\">
	<span class=\"titlel\"><a href=\"".$site_path."/softwares/s-softwares/id10\" onclick =\"loadPage('page=softwares,".
	"subsec=s-softwares,id=10,meta=".$meta_tags."','get');return false;\"><b>".$re['title']."</b></a></span><br />
	<p>".$re['description']."</p><p>$str</p></div></div></div></div>";
echo "</div>";
/*
echo "<script type=\"text/javascript\">
		document.write('<div id=\"opt_bar\"></div>');
		document.write('<div id=\"jwplayer\"></div>');
	</script>
	<noscript>
		<div id=\"opt_bar\" style=\"display: none;background-color: #272727;color: white;margin: 10px 15px 0px 15px;height: 20px;width: 800px;\"></div>
		<div id=\"jwplayer\" style=\"display: none;margin-left: 15px;padding-bottom: 15px;border-bottom: 1px solid #B3B3B3;margin-top: 10px;height: auto;width: 800px;\"></div>
	</noscript>";


echo "<div id=\"comments_show\"></div><div id=\"insert_comment\"></div></div>";*/


?>