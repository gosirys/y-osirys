<?php


error_reporting(0);
ini_set('display_errors','Off');

include("./config.php");
include("./functions.php");

global $site_path;
$sock = mysql_connection(1);


	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns= "http://www.w3.org/1999/xhtml">
	<head>
     <meta http-equiv= "Content-Type" content= "text/html; charset=ISO-8859-1" />
     <meta name= "author" content= "Giovanni Buzzin Osirys"/>
     <title>Missing</title>
     <script type ="text/javascript" src="'.$site_path.'/funcs.js"></script>
	
     <link href= "'.$site_path.'/graphic/style.css" rel= "stylesheet" type= "text/css" />';

	echo '<link rel="shortcut icon" href="http://www.y-osirys.com/favicon.ico" />';


echo '</head>
<body onload="init()">';
echo '<div id="loading"></div>';

echo '     <div id = "site">
          <div id = "header">
               <div id = "logo"></div>';
                echo '    <div id = "nav">
                         <ul>';

	$navs = array("home","security","softwares","documents","services","about_me");
	$navs_ = array();
	foreach ($navs as $k => $v) {
		if (preg_match("/$gsec/i", $v)) {
			$navs_[] = $v."_hover.jpg";
		}
		else {
			$navs_[] = $v.".jpg";
		}
	}
	echo '<li><a href="'.$site_path.'/home/"><img alt="home" src= "'.$site_path.'/graphic/'.$navs_[0].'"/></a></li>
           <li ><a href="'.$site_path.'/security/"><img alt="security" src= "'.$site_path.'/graphic/'.$navs_[1].'"/></a></li>
           <li ><a href="'.$site_path.'/softwares/"><img alt="softwares" src= "'.$site_path.'/graphic/'.$navs_[2].'"/></a></li>
           <li ><a  href="'.$site_path.'/documents/"><img alt="documents" src= "'.$site_path.'/graphic/'.$navs_[3].'"/></a></li>
           <li ><a  href="'.$site_path.'/services/"><img alt="services" src= "'.$site_path.'/graphic/'.$navs_[4].'"/></a></li>
           <li ><a href="'.$site_path.'/about_me/"><img alt="about me" src= "'.$site_path.'/graphic/'.$navs_[5].'"/></a></li>
           </ul></div></div><div id= "container"><img align="center" class="warnC" alt="Error" src= "'.$site_path.'/graphic/warning_lol.png"/>';


show_footer();

?>