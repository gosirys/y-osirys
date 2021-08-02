<?php

error_reporting(0);
ini_set('display_errors','Off');

global $server,$user,$password,$db,$sock,$id,$spage,$pg,$ajax,$com,$site_path;

show_header("about_me","about_me");
$cv = enc("encode","texts/cv.pdf");

echo "<div id = \"container_l\">
		<div id=\"container_l_a\">
			<div class=\"nav_title_cont\">
				<img alt =\"user\" class=\"space45\" src= \"".$site_path."/graphic/user.png\"/>
				<span class=\"vc\"><b>About Me</b></span>
			</div>
			<p style=\"font-size: 11px;\">
				<img alt =\"Giovanni Buzzin\" class=\"spic\" align=\"left\" src= \"".$site_path."/graphic/me.jpg\"/><br />
				<b>Cv</b><a href=\"".$site_path."/download/$cv/no1\"><img alt =\"cv\" class=\"space455\" src= \"".$site_path."/graphic/cv.png\"/></a><br /><br />
				<b>who ></b> Giovanni Buzzin, \"Osirys\"<br /><br />
				<b>whoami ></b> Web Developer, Programmer, Security Researcher, Ethical Hacker<br /><br />
				<b>languages ></b> (x)HTML, CSS, PHP, Javascript, Ajax, MySQL, Bash, Perl, Python<br /><br />
				<b>Mail  ></b> osirys[at]autistici[dot]org<br />
				<b>Skype ></b> gosirys
			</p>
		</div>
		<div id=\"container_l_b\">
			<div class=\"nav_title_cont\">
				<img alt =\"stat\" class=\"space45\" src= \"".$site_path."/graphic/stat.png\"/><span class=\"vc\"><b>Statistics</b></span>
			</div>
			<table class=\"stable\">";

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

echo "<div id=\"container_r\">";

content_db("about_me","about_me");

echo "</div>";

?>