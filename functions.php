<?php

error_reporting(1);
ini_set('display_errors', 1);


function show_header($gsec,$section,$tags = "0",$id = "0") {
     global $sock,$site_path;
	if ($tags == 0) {
		$meta_t = $gsec."[]".$section;
	}
	else {
		$meta_t = $section;
	}
     $meta_tags = get_meta_tag($meta_t,$tags,$id);
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns= "http://www.w3.org/1999/xhtml">
	<head>
        <base href="'.$site_path.'">
     <meta http-equiv= "Content-Type" content= "text/html; charset=ISO-8859-1" />
     <meta name= "author" content= "Giovanni Buzzin Osirys"/>
     <meta name= "description" content= "'.$meta_tags[0].'"/>
     <meta name= "keywords" content= "'.$meta_tags[1].'" />
     <title>'.$meta_tags[2].'</title>
     <script type ="text/javascript" src="'.$site_path.'/funcs.js"></script>

     <link href= "'.$site_path.'/graphic/style.css" rel= "stylesheet" type= "text/css" />';

	//echo '<link href= "./LoadingPanel.JS/Scripts/LoadingPanel.JS.css" rel= "stylesheet" type= "text/css" />';
	echo '<link rel="shortcut icon" href="favicon.ico" />';
/*
	echo '
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobjectt.js">
	</script>*/
/*
	echo '<script type="text/javascript" src="LoadingPanel.JS/Scripts/LoadingPanel.JS.js"></script>

		<script type ="text/javascript">
			ajaxloadingpanel.init({
								rootfolder: "", overlay: "#3b3b3b",text: "Loading Data",
								font: "normal 12px \'Segoe UI\', \'Trebuchet MS\', Arial, Verdana, Serif",
								color: "#fff", textalign: "center", msgwidth: 200, msgheight: 46,
								msgbackground: "#3b3b3b", spinnerposition: "center", overlayopacity: 6,
								spinnerurl: "/graphic/loading_ajax.gif", roundedcorners: "6px 6px 6px 6px", dropshadowspread: 10,
								dropshadowcolor: "#000000", borderwidth: 1, bordercolor: "#fff"
							});
		</script>';
*/

// echo "<script type=\"text/javascript\">
//
//   var _gaq = _gaq || [];
//   _gaq.push(['_setAccount', 'UA-21737053-1']);
//   _gaq.push(['_trackPageview']);
//
//   (function() {
//     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
//     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
//   })();
//
// </script>";



echo '</head>
<body onload="init()">';
echo '<div id="loading"></div>';

echo '     <div id = "site">
          <div id = "header">
               <div id = "logo"></div>';
                echo '    <div id = "nav">
                         <ul>';
/*
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=home"><img src= "./graphic/menu_home.jpg">home</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=security"><img src= "./graphic/menu_security.jpg">security</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=softwares"><img src= "./graphic/menu_softwares.jpg">softwares</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=documents"><img src= "./graphic/menu_documents.jpg">documents</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=portfolio"><img src= "./graphic/menu_portfolio.jpg">portfolio</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=services"><img src= "./graphic/menu_services.jpg">services</a></li>
                              <li><a onmouseover="this.style.color=\'#15ADFF\';" onmouseout="this.style.color=\'#FFFFFF\';" href="?page=about_me"><img src= "./graphic/menu_aboutme.jpg">about me</a></li>
*/
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
           </ul></div></div><div id= "container">';
echo '<div id="loading_pan"><p>Loading Data ..</p><img alt="loading" id="imgload" src="'.$site_path.'/graphic/12.gif"/></div>';
//echo '<div id="loading-panel-js-modal-overlay" unselectable="on" style="background-color: rgb(59, 59, 59); opacity: 0.6; display: none;"></div>';
//echo '<div id="loading"></div>';
//echo '<img id="loader_sm" src="./graphic/11.gif">';
//echo '<div id="loading_pan"><p>Loading Data ..</p><img id="imgload" src="./graphic/12.gif"></div>';
//echo '<div id="loading-panel-js" unselectable="on" style="border: 1px solid rgb(255, 255, 255); font: 12px/46px \'Segoe UI\',\'Trebuchet MS\',Arial,Verdana,Serif; -moz-border-radius: 6px 6px 6px 6px; -moz-box-shadow: 0pt 0pt 10px rgb(0, 0, 0); text-align: center; color: rgb(255, 255, 255); background-color: rgb(59, 59, 59); background-image: url(&quot;LoadingPanel.JS/LoadingIndicators/Loading_00.gif&quot;); background-position: center center; width: 200px; height: 46px; margin-left: -100px; margin-top: -23px; visibility: hidden;">Contacting Server. Please, wait...</div>';
//echo '<div id="loading-panel-js" unselectable="on"></div>';

}

function show_footer() {
     global $ajax,$site_path;
     if ($ajax == 0) {




          echo '</div><div id = "footer">
			<div id="footer_a">';
/*
<div id="footer_a_a">
<script type="text/javascript" src="http://codice.shinystat.com/cgi-bin/getcod.cgi?USER=yosirys"></script>
<noscript>
<a href="http://www.shinystat.com/it" target="_top">
<img src="http://www.shinystat.com/cgi-bin/shinystat.cgi?USER=yosirys" alt="Contatori visite gratuiti" border="0" /></a>
</noscript>
</div>
*/
	echo	'<a  href="http://www.apache.org/" target="_blank"><img alt="apache powered" src= "'.$site_path.'/graphic/apache_powered.png"/></a>
		<a  href="http://www.php.net/" target="_blank"><img alt="php powered" src= "'.$site_path.'/graphic/php5_powered.png"/></a>
		<a  href="http://en.wikipedia.org/wiki/Ajax_%28programming%29" target="_blank"><img alt="ajax powered" src= "'.$site_path.'/graphic/ajax-powered.png"/></a>
		<a  href="http://www.mysql.com/" target="_blank"><img alt="mysql powered" src= "'.$site_path.'/graphic/mysql_powered.jpg"/></a>
</div>';
/*
echo '<div id="footer_a_b">


</div>
*/
echo '			<div id="footer_b">
			<p>&copy; y-Osirys.com - All rights reserved - Giovanni Buzzin, Osirys - Web Developer, '.
			'Programmer, Security Researcher, Ethical Hacker</p></div>
			</div></div></body></html>';
     }
}

function secure($var,$kind) {
     if ($kind == 1) {
          if (!is_int($var)) {
               $var = intval($var);
          }
     }
     elseif ($kind == 2) {
          $var = mysql_real_escape_string($var);
     }
     return($var);
}

function get_meta_tag($spage,$tags,$id,$ajax = "0") {
     global $sock;
	$no = 0;
     if ($tags != 0) {
          if (preg_match('/^web_services$|^security_services$|^software_engineering$/',$spage)) {
               $spage = "services";
          }
          $query = "SELECT tag_description,tag_keywords,title FROM ".$spage." WHERE id = ".$id;
     }
     else {
		if (preg_match('/(.+)\[\](.+)/', $spage, $matches)) {
			$main = $matches[1];
			$litt = $matches[2];
		}
          $query = "SELECT tag_description,tag_keywords,tag_title FROM meta WHERE title = '".$litt."' AND main_sec ='".$main."'";
     }
     $res = mysql_query($query, $sock);
	if ($res) {
		$re = mysql_fetch_array($res);
		if (($num = mysql_num_rows($res)) > 0) {
			$m_description = $re[0];
			$m_keywords    = $re[1];
			$title         = $re[2];
		}
		else {
			$no = 1;
		}
	}
	else {
		$no = 1;
	}
	if ($no == 1) {
		$m_description = $m_keywords = $title = "";
	}
     if ($ajax == 0) {
          $meta_tags = array($m_description,$m_keywords,$title);
     }
     else {
          $meta_tags = "(1)".$m_description."(/1)(2)".$m_keywords."(/2)(3)".$title."(/3)";
     }
     return($meta_tags);
}

function show_pages($tot,$to_show,$pg,$from) {
	global $site_path;
     if (preg_match("/([^,]+),([^,]+)/",$from,$from_)) {
          $page = $from_[1];
          $spage= $from_[2];
     }
     else {
          return(0);
     }
     $tot_pags = $tot/$to_show;
     if (!is_integer($tot_pags)) {
          $tot_pags = preg_replace('/([0-9]+)\.([0-9]+)/','$1',$tot_pags);
          $tot_pags++;
     }
     if ($tot_pags > 1) {
          $ss = 0;
          $ee = 0;
          $no = 0;
          if ($pg > 0) {
               if (($pg >= 1)&&($pg <= $tot_pags)) {
                    if ($tot_pags > 5) {
                         if (($pg == 1)||($pg == 2)) {
                              $s = 1;
                              $e = 5;
                              $ee = 1;
                         }
                         elseif (($pg == $tot_pags)||($pg == ($tot_pags - 1))) {
                              $s = $tot_pags - 4;
                              $e = $tot_pags;
                              $ss = 1;
                         }
                         else {
                              $s = $pg - 2;
                              $e = $pg + 2;
                              if ((($pg + 2) < $tot_pags)&&(($pg - 2) > 1)) {
                                   $ss = 1;
                                   $ee = 1;
                              }
                              elseif ((($pg + 2) == $tot_pags)||(($pg - 2) == 1)) {
                                   if (($pg + 2) == $tot_pags) {
                                        $ss = 1;
                                   }
                                   elseif (($pg - 2) == 1) {
                                        $ee = 1;
                                   }
                              }
                         }
                    }
                    elseif ($tot_pags <= 5) {
                         $s = 1;
                         $e = $tot_pags;
                    }
               }
               else {
                    if ($tot_pags > 5) {
                         $s = 1;
                         $e = 5;
                         $ee = 1;
                    }
                    elseif ($tot_pags <= 5) {
                         $s = 1;
                         $e = $tot_pags;
                    }
               }
          }
          else {
               $no = 1;
               if ($tot_pags > 5) {
                    $s = 1;
                    $e = 5;
                    $ee = 1;
               }
               elseif ($tot_pags <= 5) {
                    $s = 1;
                    $e = $tot_pags;
               }
          }
          $str = "Pages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          if ($ss == 1) {
               $str .= "<a href=\"".$site_path."/".$page."/".$spage."/pg0/\" onclick =\"loadPage('page=$page,subsec=$spage,id=null,pg=0,meta=off','get');return false;\">start&nbsp;&nbsp;&nbsp;&nbsp;</a>";
          }
          for ($i = $s; $i <= $e; $i++) {
               if ($i == 1) {
                    $p = 0;
               }
               else {
                    $p_ = $i - 1;
                    $p = $to_show*$p_;
               }
               if (($i == $pg)||(($no == 1)&&($i == 1))) {
                    $str .= "<a href=\"".$site_path."/".$page."/".$spage."/pg".$p."/\" onclick =\"loadPage('page=$page,subsec=$spage,pg=$p,meta=off','get');return false;\"><b>$i</b></a>&nbsp;&nbsp;";
               }
               else {
                    $str .= "<a href=\"".$site_path."/".$page."/".$spage."/pg".$p."/\" onclick =\"loadPage('page=$page,subsec=$spage,pg=$p,meta=off','get');return false;\">".$i."</a>&nbsp;&nbsp;";
               }
          }
          if ($ee == 1) {
               $p_ = $tot_pags - 1;
               $p = $p_*$to_show;
               $str .= "<a href=\"".$site_path."/".$page."/".$spage."/pg".$p."/\" onclick =\"loadPage('page=$page,subsec=$spage,pg=$p,meta=off','get');return false;\">&nbsp;&nbsp;end</a>";
          }
          return($str);
     }
     else {
          return(0);
     }
}



function mysql_connection($param) {
    global $server,$user,$password,$db,$sock;
    if ($param == 1) {
        $sock = mysql_connect($server, $user, $password) or die(mysql_error());
        mysql_select_db($db) or die(mysql_error());
        return($sock);
    }
    elseif ($param == 0) {
        mysql_close($sock);
    }
}

function increment($sec,$id,$d = "0") {
	global $db,$sock;
	$time  = time();
	$ip    = $_SERVER['REMOTE_ADDR'];
	$date  = date("Y-m-d");
	if ($d == 0) {
		$wh = " AND what=0";
		$col = "views";
	}
	elseif ($d == 1) {
		$wh = " AND what=1";
		$col = "downloads";
	}
	if (preg_match('/^s-/',$sec)) {
		$sec = preg_replace('/^s-/', '', $sec);
	}

	$query = "SELECT * FROM logs WHERE ip='".$ip."' AND `date`='".$date."' AND id=".$id." AND section='".$sec."'".$wh." LIMIT 0,1";

	//echo "A: $query<br />";
	$res   = mysql_query($query,$sock);
	$res2  = mysql_fetch_array($res);
	if (($num = mysql_num_rows($res)) > 0) {//echo "l'ip ha già click/downl lo stesso giorno<br />";
		$t = 0;
		$oldtime = $res2['time'];
		$t_p = $time - $oldtime;
		if ($t_p >= 1800) {//echo "Passata 1 ora, procedo<br />";
			$ok = 1;
			$k = 1;
		}
		else {//echo "Meno di un ora, blocco<br />";
			$ok = 0;
		}
     }
	else {//echo "l'ip NON ha già click/downl lo stesso giorno<br />";
		$query = "SELECT * FROM logs WHERE id=".$id." AND ip='".$ip."' AND section='".$sec."'".$wh." LIMIT 0,1";
		$res   = mysql_query($query,$sock);
		$res2  = mysql_fetch_array($res);
		if (($num = mysql_num_rows($res)) > 0) {//echo "l'ip ha già clickato/downl in passato, in altri giorni<br />";
			$ok = 1;
			$k = 2;
			$oldtime = $res2['time'];
			$olddate = $res2['date'];
			$t = 0;
		}
		else {//echo "l'ip NON HA MAI clickato/downl in passato<br />";
			$ok = 1;
			$t = 1;
		}
     }
	//if ($ok != 1) {echo "non aggiorno<br />";}
     if ($ok == 1) {
		if ($t == 1) {//echo "Aggiorno non c'era prima<br />";
			$query = "SELECT $col from ".$sec." WHERE id=".$id;
			$res_ = mysql_query($query, $sock);
			if ($res_) {
				$re = mysql_fetch_array($res_);
				if ($re[$col] == 0) {//echo "nessuno esistito mai lcick<br />";
					$num_ = 1;
				}
				else {
					//echo "qualche altro gheizz ha clickato<br />";
					$num_ = $re[$col] + 1;
				}
			}
			$query = "UPDATE ".$sec." SET $col =$num_ WHERE id =".$id;//echo "Up 1 : $query<br />";
			mysql_query($query, $sock);
			$query = "INSERT INTO logs (ip,date,id,section,time,what) VALUES ('".$ip."','".$date."','".$id."','".$sec."','".$time."','".$d."')";
			mysql_query($query, $sock);
		}
		else {//echo "Aggiorno c'era prima<br />";
			$query = "SELECT $col from ".$sec." WHERE id=".$id;
			$res_ = mysql_query($query, $sock);
			if ($res_) {
				$re = mysql_fetch_array($res_);
				$num_ = $re[$col] + 1;
				$query = "UPDATE ".$sec." SET $col = ".$num_." WHERE id =".$id;//echo "jjj: $query<br />";
				mysql_query($query, $sock);
				if ($k == 1) {
					$query = "UPDATE logs SET time = ".$time." WHERE logs.ip = '".$ip."' AND logs.date = '".$date.
							"' AND logs.id =".$id." AND logs.section = '".$sec."' AND logs.time = '".$oldtime.
							"' AND logs.what ='".$d."' LIMIT 1";
				}
				elseif ($k == 2) {
					$query = "UPDATE logs SET time = ".$time.", date = '".$date."' WHERE logs.ip = '".$ip."' AND logs.date = '".$olddate.
							"' AND logs.id =".$id." AND logs.section = '".$sec."' AND logs.time = '".$oldtime.
							"' AND logs.what ='".$d."' LIMIT 1";
				}//echo "Up 3 : $query<br />";
				mysql_query($query, $sock);
			}

		}
     }
}


function show_error() {
	global $site_path;
	echo "<img align=\"center\" class=\"warn\" alt=\"Error\" src= \"".$site_path."/graphic/warning_lol.png\"/>";


}




function content_db($page,$spage,$id = "null") {
     global $server,$user,$password,$db,$sock,$id,$pg,$ajax,$com,$to_show,$site_path;

     if (preg_match('/^s-(.+)/',$spage,$sss)) {
          $spage = $sss[1];
		$spage_ = "s-".$sss[1];
          $s_r = 1;
     }
	elseif (preg_match('/^m-(.+)/',$spage,$sss)) {
		$s_r = 2;
		$spage = $sss[1];
		$spage_ = "m-".$sss[1];
	}
     else {
          $s_r = 0;
		$spage_ = $spage;
     }

     if ($ajax == 0) {
          $partA = "<div id=\"container_r_content\">";
          $partAZ = "</div>";
          $partB = "<div id=\"opt_bar\">";
          $partBZ = "</div>";
          $partC = "<div id=\"opt_bar_i\">";
          $partCZ = "</div>";
     }
     else {
          $partA = "[container_r_content]";
          $partAZ = "[/container_r_content]";
          $partB = "[opt_bar]";
          $partBZ = "[/opt_bar]";
          $partC = "[opt_bar_i]";
          $partCZ = "[/opt_bar_i]";
     }

     if (($page == "services")||($page == "about_me")) {
		$p_ = 0;
          if ($spage != $page) {
			$query = "SELECT content FROM texts WHERE title = '".$spage."'";
          }
          else {
               $query = "SELECT content FROM texts WHERE title = '".$page."'";
          }
          $res = mysql_query($query, $sock);
		if ($res) {
			$re = mysql_fetch_array($res);
		}
		else {
			$re['content'] = "";
		}
          echo $partA."<div id=\"container_r_content_c\">".$re['content']."</div>".$partAZ;
          if ($page == "services") {
               $stz = "<p><i>If you require any additional information on this service, feel free to contact me
                         </i><a style =\"text-decoration: none;\" href=\"#pm=ON\" onclick=\"showElement('insert_pm');
                         return false;\"><img alt=\"msg\" class=\"space3\"  src= \"".$site_path."/graphic/msg.png\"/></a></p>";
			if ($spage == "services_home") {
				echo "<div id=\"opt_bar_i\" style=\"display: none;background-color: #EBEBEB;margin: 0px 15px 0px 15px;height: 22px;width: 800px;text-decoration:none;\"></div><div id=\"insert_pm\"></div>";
			}
			else {
				echo $partC.$stz.$partCZ;
				$p_ = 1;
			}
          }
          elseif ($page == "about_me") {
               $stz = "<p><i>If you need any further information, a free consult, or you are just interested to
                         contact me, send me a pm</i><a style =\"text-decoration: none;\" href=\"#pm=ON\" onclick=\"showElement('insert_pm');
                         return false;\"><img alt=\"msg\" class=\"space3\"  src= \"".$site_path."/graphic/msg.png\"/></a></p>";
               echo $partC.$stz.$partCZ;
			$p_ = 1;
          }
		if (isset($_POST['sendcomment'])) {
               if ((strlen($_POST['author']) > 0)&&(strlen($_POST['email']) > 0)&&(strlen($_POST['subject']) > 0)&&(strlen($_POST['content']) > 0)) {
                    $author  = $_POST['author'];
                    $email   = $_POST['email'];
                    $subject  = $_POST['subject'];
                    $content = $_POST['content'];
                    $com = "(author)".$author."(/a)(email)".$email."(/e)(subject)".$subject."(/s)(content)".$content."(/c)";
                    send_pm($com);
               }
               else {
                    $err = "Dati mancanti nel form !";
                    pm($err,0);
               }
          }
          else {
               if ($p_ == 1) {
				pm(0,"-1");
			}
          }
     }
     elseif (($id == "null")&&(($page != "services")||($page != "about_me"))) {
		$l_a = 0;
		if ($spage == "live_auditing") {
			$l_a = 1;
			$to_show = 20;
		}
          if (((($spage != "exploits")&&($spage != "live_auditing"))&&($page == "security"))||($s_r == 1)) {
               $qu = $spage." WHERE section_tag = 'security'";
          }
          else {
               $qu = $spage;
          }
          if ($pg != "null") {
               $query = "SELECT * FROM ".$qu." ORDER BY date DESC LIMIT ".$pg.",".$to_show;
          }
          else {
               $query = "SELECT * FROM ".$qu." ORDER BY date DESC LIMIT 0,".$to_show;
          }

          echo $partA;
          $res = mysql_query($query,$sock);

		if ($spage == "live_auditing") {
			echo "<div id=\"div_table\">";
			echo "<table class=\"table\">
					<tr class=\"header\">
					<td class=\"tddata\">date</td>
					<td class=\"tdtitle\">website</td>
					<td class=\"tdtype\">bug</td>
					<td class=\"tdreported\">reported</td>
					<td id =\"noborder\" class=\"tdfixed\">fixed</td>";
					#<td id=\"noborder\" class=\"tdviews\">views</td>
					echo "</tr><br />";
		}


          if (($res)&&(($tot = mysql_num_rows($res)) > 0)) {
               while ($re = mysql_fetch_array($res)) {
/*
				if (preg_match('/^s-(.+)/',$spage,$sss)) {
					$spage = $sss[1];
				}
				if (preg_match('/^m-(.+)/',$spage,$sss)) {
					$spage = $sss[1];
				}
*/
                    //$meta_tags = get_meta_tag($spage,1,$re['id'],1);
				$meta_tags = get_meta_tag($spage,1,$re['id'],1);
/*
                    if ($s_r == 1) {
                         $spage = "s-".$spage;
                    }
                    elseif ($s_r == 2) {
                         $spage = "m-".$spage;
                    }
*/
				if ($l_a == 1) {
						$over = "onmouseover=\"this.style.backgroundColor='#D8D5ED';\" onmouseout=\"this.style.backgroundColor='white';\"";
						#$link = "<a href=\"?page=$page&amp;subsec=$spage&amp;id=".$re['id']."\"
						#		onclick =\"loadPage('page=$page,subsec=$spage,id=".$re['id'].
						#		",meta=".$meta_tags."','get');return false;\">";
						$link = "<a href=\"#priv8\">";
						$img = "";
						if ($re['important'] == 1) {
							$img = "&nbsp;&nbsp;<img alt =\"star\" src= \"".$site_path."/graphic/star.gif\"/>";
						}
						echo "<tr $over>
							<td>$link".$re['date']."</a></td>
							<td>$link".$re['title']."$img</a></td>
							<td>$link".$re['type']."</a></td>
							<td>$link".$re['reported']."</a></td>
							<td id=\"noborder\">$link".$re['fixed']."</a></td>";
							#<td id=\"noborder\">$link".$re['views']."</a></td>
						echo "</tr></a>";
				}
				else {
					echo "
					<div class=\"element_listing\">
						<a onmouseover=\"this.style.backgroundColor='#D8D5ED';\" onmouseout=\"this.style.backgroundColor='#EBEBEB';\"
                         class=\"element_listing_a\" href=\"".$site_path."/$page/$spage_/id".$re['id']."\"
                         onclick =\"loadPage('page=$page,subsec=$spage_,id=".$re['id'].
                         ",meta=".$meta_tags."','get');return false;\">

                         <div class=\"element_listing_title_cont\"><p class=\"element_listing_title\">".$re['title']."</p></div>
                         <div class=\"element_listing_desc_cont\"><p class=\"element_listing_desc\">".$re['description']."</p></div>
                         <div class=\"element_listing_info_cont\"><div class=\"element_listing_info_cont_l\">
                         <p><i>Posted on ".$re['date']."</i></p></div><div class=\"element_listing_info_cont_r\"><p><i>";
					if ($spage_ == "live_auditing") {
						$str = "Type <b>".$re['type']."</b> - Reported ".$re['reported']." - Fixed ".$re['fixed'];
					}
					elseif ($spage_ == "exploits") {
						//$str = "";
						$str = "<b>".$re['vuln']."</b> Vuln - Softname <b>".$re['soft_name']."</b> - Version ".$re['version']." - Views ".$re['views'];
					}
					elseif (($spage_ == "videos")||($spage_ == "articles")||($spage_ == "s-videos")||($spage_ == "s-articles")) {
						if (strlen($re['section_tag']) < 1) {
							$pc = "";
						}
						else {
							$pc = " - Tag ".$re['section_tag'];
						}
						$str = "Views ".$re['views']." - Downloads ".$re['downloads'].$pc;
					}
					elseif (($spage_ == "softwares")||($spage_ == "s-softwares")||($spage_ == "m-softwares")) {
						if (strlen($re['section_tag']) < 1) {
							$pc = "";
						}
						else {
							$pc = " - Tag ".$re['section_tag'];
						}//$str = "";
						$str = "Language ".$re['language']." - Views ".$re['views']." - Downloads ".$re['downloads'].$pc;
					}
					elseif ($spage_ == "web_apps") {
						$str = "Language ".$re['language']." - Views ".$re['views']." - Downloads ".$re['downloads'];
					}

					echo $str."</i></p></div></div></a></div>";
				}
			}
			if ($l_a == 1) {
				echo "</table></div>";
			}

          }
          else {
               echo "<div id=\"alert\"><p><img alt=\"loading\" class=\"space1\" align=\"left\" src= \"".$site_path."/graphic/loading.gif\"/><b>I'm sorry, i'm currently updating my contents<br />Coming Soon</b></p></div>";
          }

          echo $partAZ;
          //if (((($spage != "exploits")&&($spage != "live_auditing"))&&($page == "security"))||($s_r == 1)) {
		//if (((($spage_ != "exploits")&&($spage_ != "live_auditing"))&&($page == "security"))) {
		if (preg_match('/^s-/', $spage_)) {
               //if ($s_r == 1) {
               //     $spage = preg_replace('/^s-/', '', $spage);
               //}
               $qu = $spage." WHERE section_tag = 'security'";
          }
		//elseif ($s_r == 2) {
		//	$spage = preg_replace('/^m-/', '', $spage);
		//	$qu = $spage;
		//}
          else {
               $qu = $spage;
          }

          $query_c = "SELECT * FROM $qu";//echo "jkj $query_c<br>";
          $to = mysql_query($query_c,$sock);
          if (($to)&&(($tot = mysql_num_rows($to)) > $to_show)) {
               if (isset($pg)) {
                    if ($pg == 0) {
                         $p = 1;
                    }
                    else {
                         $p = $pg/$to_show;
                         $p += 1;
                    }
                    $str = show_pages($tot,$to_show,$p,$page.",".$spage_);
               }
               else {
                    $str = show_pages($tot,$to_show,0,$page.",".$spage_);
               }
               echo $partB."<p>$str</p>".$partBZ;
          }
          else {
			if ($ajax == 0) {
				echo "<div id=\"opt_bar\" style=\"display: none;background-color: #272727;color: white;margin: 10px 15px 0px 15px;height: 20px;width: 800px;\"></div>";
			}
			else {
				echo $partB.$partBZ;
			}

          }
     }
     else {
		$z = 0;
          echo $partA;
          $query = "SELECT * FROM ".$spage." WHERE id =".$id;//echo $query;
          $res = mysql_query($query, $sock);// or die(mysql_error());

		if ($res) {
			$no = 0;
			$re = mysql_fetch_array($res);
			if (($num = mysql_num_rows($res)) > 0) {
				$res_found = 1;
			}
			else {
				$res_found = 0;
			}
		}
		else {
			$no = 1;
			$res_found = 0;
		}

		if ($res_found == 1) {

			if ($spage == "live_auditing") {
				$v = 0; // visualizzazione codice
				$str = "Posted on ".$re['date']." - Type <b>".$re['type']."</b> - Reported ".$re['reported']." - Fixed ".$re['fixed'];
			}
			elseif ($spage == "exploits") {
				if (strlen($re['rel_video']) > 2) {
					$video = $re['rel_video'];
					$z = 1;
				}
				$v = 0; // visualizzazione codice
				$str = "Posted on ".$re['date']." - Vuln <b>".$re['vuln']."</b> - Softname <a href=\"".$re['soft_link']."\" target=\"_blank\"><b>".$re['soft_name']."</b></a> - Version ".$re['version']." - Views ".$re['views'];
			}
			elseif (($spage_ == "videos")||($spage_ == "articles")||($spage_ == "s-videos")||($spage_ == "s-articles")) {
				if (preg_match('/videos/',$spage_)) {
					$v = 2; // visualizzazione player per il video
				}
				else {
					$v = 1; // se è pdf, e c'è il modulo, visualizza preview più possibilità download, se non c'è il modulo solo il downl
                              // se non è pdf mostra l'articolo a mò di codice
					if (strlen($re['rel_video']) > 2) {
						$video = $re['rel_video'];
						$z = 1;
					}
				}
				if (strlen($re['section_tag']) < 1) {
					$pc = "";
				}
				else {
					$pc = " - Tag ".$re['section_tag'];
				}
				$str = "Posted on ".$re['date']." - Views ".$re['views']." - Downloads ".$re['downloads'].$pc;
			}
			elseif (($spage_ == "softwares")||($spage_ == "s-softwares")||($spage_ == "m-softwares")) {
				if (strlen($re['rel_video']) > 2) {
					$video = $re['rel_video'];
					$z = 1;
				}
				if ($re['big'] == 1) {
					$v = 3; // descrizione + download, non visualizzazione diretta
				}
				else {
					$v = 0; // visualizzazione codice in quanto composto di un singolo file
				}
				if (strlen($re['section_tag']) < 1) {
					$pc = "";
				}
				else {
					$pc = " - Tag ".$re['section_tag'];
				}
				$str = "Posted on ".$re['date']." - Language ".$re['language']." - Views ".$re['views']." - Downloads ".$re['downloads'].$pc;
			}
			elseif ($spage == "web_apps") {
				if ($re['big'] == 1) {
					$v = 3; // descrizione + download, non visualizzazione diretta
				}
				else {
					$v = 0; // visualizzazione codice in quanto composto di un singolo file
				}
				$str = "Posted on ".$re['date']." - Language ".$re['language']." - Views ".$re['views']." - Downloads ".$re['downloads'];
			}


//echo "<div id=\"header_id_info\"><span id=\"title\">".$re['title']."</span><br /><span id=\"desc\">".$re['description']."</span><br /><span id=\"det\">".$str."</span></div>";

			if ($v == 0) {
				include("./geshi.php");
				//echo "<div id=\"header_id_info\"><p><b>".$re['title']."</b><br />".$re['description']."<br /><br /><i>".$str."</i></p></div>
				//     <div id=\"container_r_content_a\">";

				echo "<div id=\"header_id_info\">
						<div class=\"header_id_info_a\"><span class=\"info_a\">".$re['title']."</span></div>
						<div class=\"header_id_info_b\"><span class=\"info_b\">".$re['description']."</span></div>
						<div class=\"header_id_info_c\"><span class=\"info_c\">".$str."</span></div>
					</div>";


                         //<div class=\"element_listing_title_cont\"><p class=\"element_listing_title\">".$re['title']."</p></div>
                         //<div class=\"element_listing_desc_cont\"><p class=\"element_listing_desc\">".$re['description']."</p></div>
                         //<div class=\"element_listing_info_cont\"><div class=\"element_listing_info_cont_l\">
                         //<p><i>Posted on ".$re['date']."</i></p></div><div class=\"element_listing_info_cont_r\"><p><i>";


               //$id = intval($id);
				$sp = preg_replace('/\\\\\'/','',$spage);
				if (preg_match('/exploits/', $spage)) {
					$fff = $id.".txt";
				}
				else {
					$fff = $re['file_name'];
				}
				$file_c = "./".$sp."/".$fff;//echo "bb: $file_c<br>";

				if ((file_exists($file_c))&&(!preg_match('/\.\.\//', $file_c))) {
					echo "<div id=\"container_r_content_a\">";
					$cont = file_get_contents($file_c);

					$language = $re['language'];
					$geshi = new GeSHi($cont, $language);
					$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS,1);
					//$geshi->set_line_style('background: black;', 'background: blue;', true);

					if ($ajax == 1) {
						echo tras($geshi->parse_code());
					}
					else {
						echo $geshi->parse_code();
					}
					echo "</div>";
				}
				else {
					show_error();
				}

			}
			elseif ($v == 1) {
				if ($re['what'] == "pdf") {
                    /*
                    echo "<div id=\"header_id_info\"><p><b>".$re['title']."</b><br />".$re['description']."<br /><br /><i>".$str."</i></p></div>
                    <div id=\"container_r_content_a\">";
                    */
					echo "<div id=\"long_des\">
					<a href=\"\"><img alt=\"pdf\" style=\"margin-right:10px;\" align=\"left\" src= \"".$site_path."/graphic/pdf_icon.png\"/></a>
					<span class=\"titlebz\">".$re['title']."</span><br /><br /><span class=\"dex\">".$str."</span><br />
					<p>".$re['description']."</p>
					</div>";


				}
				else {
					//$id = intval($id);
					//echo "<div id=\"long_des2\">
					//<a href=\"\"><img style=\"margin-right:10px;\" align=\"left\" src= \"./graphic/pdf_icon.png\"></a>
					//<span class=\"titlebz\">".$re['title']
					//."</span><br /><span class=\"dex\">".$str."</span><p>".$re['description']."</p>
					//</div>";
					$file_c = "./articles/".$id.".txt";

					if ((file_exists($file_c))&&(!preg_match('/\.\.\//', $file_c))) {
						$cont = file_get_contents($file_c);
						//$cont = wordwrap($cont, 140, "<br />", true);
						echo "<div id=\"container_r_content_c\"><span class=\"titlebzz\">".$re['title'].
							"</span><span class=\"dexx\">".$str."</span><br /><br />
							<pre>$cont</pre></div>";
					}
					else {
						show_error();
					}
				}
				if ($z == 1) {
					echo "<div id=\"video_cont\"><span class=\"info_a\">Related Video</div></div>";
				}


			}
			elseif ($v == 2) { // player
					$vpath = $site_path."/videos/".$re['file_name'];
				echo "<span class=\"titlebz\">".$re['title']."</span><br /><span class=\"dex\">".$str."</span>";

					echo "<div id=\"jwplayerz\">";


					echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="480" height="270" id="player1" name="player1"
							<param name="movie" value="'.$site_path.'/jwplayer/player.swf">
							<param name="allowfullscreen" value="true">
							<param name="allowscriptaccess" value="always">
							<param name="flashvars" value="file='.$vpath.'&autostart=false">
							<embed id="player1"
								name="player1"
								src="'.$site_path.'/jwplayer/player.swf"
								width="785"
								height="350"
								allowscriptaccess="always"
								allowfullscreen="true"
								flashvars="file='.$vpath.'&autostart=false"
							/>
						</object></div>';
					echo "<div id=\"long_dez\"><p>".$re['presentation']."</p></div>";


			}
			elseif ($v == 3) { //layout descrizione + pulsante download per roba che è in più file ...
				if (strlen($re['presentation']) > 2) {
					$des = $re['presentation'];
				}
				else {
					$des = $re['description'];
				}


                    echo "<div id=\"long_des\">
                    <span class=\"titlebz\">".$re['title']
                    ."</span><br /><span class=\"dex\">".$str."</span><br /><br /><p>$des</p>
                    </div>";
			}

			echo $partAZ;
			if (isset($_POST['sendcomment'])) {
				if ((strlen($_POST['author']) > 0)&&(strlen($_POST['email']) > 0)&&(strlen($_POST['content']) > 0)) {
					$author  = $_POST['author'];
					$email   = $_POST['email'];
					$content = $_POST['content'];
					$com = "(author)".$author."(/a)(email)".$email."(/e)(content)".$content."(/c)(z)".$z."(/z)";
					send_comment($spage,$id,$com);
				}
				else {
					$err = "Dati mancanti nel form !";
					comments($re['comments'],$spage,$id,$z,$err);
				}
			}
			else {
				comments($re['comments'],$spage,$id,$z);
			}
		}
		else {
			show_error();
			echo $partAZ;
		}

     }
}

function get_populars($query,$page,$spage,$n) {
     global $db,$sock,$site_path;
     if (preg_match('/^(s|m)-(.+)/',$spage,$sss)) {
          $spage = $sss[2];
	}

     $res = mysql_query($query, $sock) ;
     if (($res)&&(($num = mysql_num_rows($res)) > 0)) {
          $c = 0;
          while ($re = mysql_fetch_array($res)) {
               $c++;
               $meta_tags = get_meta_tag($spage,1,$re['id'],1);
               if ($n == 1) {
                    //$a = "<img align=\"left\" src= \"./graphic/gif_".$spage.".jpg\"> ";
				$a = "# ";
               }
               else {
                    $a = $c." - ";
               }

			if (preg_match('/^live_auditing$/',$spage)) {
				echo $a."<b>".$re['title']."</b><br />";
			}
			else {
				echo $a."<a href=\"".$site_path."/$page/$spage/id".$re['id']."\"
                    onclick =\"loadPage('page=$page,subsec=$spage,id=".$re['id'].
                    ",meta=".$meta_tags."','get');return false;\"><b>".$re['title']."</b></a><br />";
			}

          }
     }
     else {
		if ($n != 1) {
			echo "Contents in update<br />";
		}
     }
}

function enc($way,$what) {
	if ($way == "decode") {
		$enc = preg_replace("'([\S,\d]{2})'e","chr(hexdec('\\1'))",$what);
	}
	elseif ($way == "encode") {
		$enc = preg_replace("'(.)'e","dechex(ord('\\1'))",$what);
	}
	return $enc;
}

function comments($stat,$spage,$id,$z,$err = "0") {
     global $db,$sock,$ajax,$site_path;
     if ($ajax == 0) {
          $partA = "<div id=\"opt_bar\">";
          $partAZ = "</div>";
          $partAA = "<div id=\"jwplayer\">";
          $partAAZ = "</div>";
          $partB = "<div id=\"comments_show\">";
          $partBZ = "</div>";
          $partC = "<div name=\"insert_comment\" id=\"insert_comment\">";
          $partCZ = "</div>";
     }
     else {
          $partA = "[opt_bar]";
          $partAZ = "[/opt_bar]";
          $partAA = "[jwplayer]";
          $partAAZ = "[/jwplayer]";
          $partB = "[comments_show]";
          $partBZ = "[/comments_show]";
          $partC = "[insert_comment]";
          $partCZ = "[/insert_comment]";
     }
     $echo = "";
     if ($stat == 1) {
          $query = "SELECT * FROM comments WHERE section = '".$spage."' and id = ".$id;//echo "hh $query<br>";
          $cres = mysql_query($query,$sock);
          if (($cres)&&(($nr = mysql_num_rows($cres)) > 0)) {
               $nnr = $nr;
          }
          else {
               $nnr = 0;
          }
          $comments = "<a href=\"#com=ON\" onclick=\"showElement('comments_show','insert_comment'); return false;\">ON(".$nnr.")</a>

                         ";
     }
     else {
          $comments = "OFF";
     }
	$cpic = "<img alt =\"Comments\" class=\"downlz\" align=\"left\" src=\"".$site_path."/graphic/comments.png\"/>";
	$vgo = 0;
	if (preg_match('/^softwares$|^exploits$|^articles$|^videos$/',$spage)) {
		if (($z == 1)||(preg_match('/video/',$spage))) {
			if ($z == 1) {
				$query = "SELECT rel_video FROM $spage WHERE id=".$id;//echo "nnnn $query<br>";
				$qva = "rel_video";
			}
			else {
				$query = "SELECT file_name FROM videos WHERE id=".$id;
				$qva = "file_name";
			}
			$res = mysql_query($query, $sock);
			if ($res) {
				$re = mysql_fetch_array($res);
				$vname = $re[$qva];
				$vvfile = enc("encode","videos/".$vname);
			}
			else {
				$vvfile = "";
				$vname = "";
			}
			$vdownl = "<td class=\"kiooo\">Video</td><td class=\"kioo\"><a href=\"".$site_path."/download/$vvfile/$spage/id$id\"><img alt =\"Download file\" class=\"downlzz\" align=\"left\" src=\"".$site_path."/graphic/downlz.png\"/></a></td>";
		}
		else {
			$vvfile = "";
			$vdownl = "";
		}
		if (!preg_match('/video/',$spage)) {
			if (preg_match('/exploits/',$spage)) {
				$file = enc("encode","$spage/$id.txt");
			}
			else {
				$query = "SELECT file_name FROM $spage WHERE id=".$id;
				$res = mysql_query($query, $sock);
				if ($res) {
					$re = mysql_fetch_array($res);
					$file = enc("encode",$spage."/".$re['file_name']);
				}
				else {
					$file = "";
				}
			}
			$downl = "<td class=\"kiooo\">File(s)</td><td class=\"kioo\"><a href=\"".$site_path."/download/$file/$spage/id$id\"><img alt =\"Download file\" class=\"downlzz\" align=\"left\" src=\"".$site_path."/graphic/downlz.png\"></a></td>";
		}
		else {
			$downl = "";
		}
		$gdow = "<table class=\"toptt\"><tr><td>Downloads&nbsp;&nbsp;&nbsp;&nbsp</td>".$vdownl.$downl."</tr></table>";
	}
	else {
		$gdow = "<table class=\"toptt\"><tr><td>Downloads&nbsp;&nbsp;&nbsp;OFF</td></tr></table>";
	}

	if ($z == 1) {
		$videoo = "<img alt =\"Comments\" class=\"downlz\" src=\"".$site_path."/graphic/watch.png\"/>";
		$videot = "<a href=\"#video=watch\" onclick=\"showElement('jwplayer'); return false;\">ON</a>";
	}
	else {
		if (preg_match('/video/',$spage)) {
			$videoo = "";
			$videot = "";
		}
		else {
			$videoo = "<img alt =\"Comments\" class=\"downlz\" src=\"".$site_path."/graphic/watch.png\"/>";
			$videot = "OFF";
		}
	}
     //echo $partA."<p> $cpic $comments $videoo $downl</p>".$partAZ;

	echo $partA;
	echo "<div id=\"barva\"><table class=\"topt\"><tr><td>$cpic</td><td class=\"kio\">$comments</td><td>$videoo</td><td class=\"kio\">$videot</td></tr></table></div>";
	//echo "<div id=\"barba\">$gdow</div>";
	echo "<div id=\"barba\">$gdow</div>";
	echo $partAZ;

	if ($z == 1) {
				$idf = "qw";
				$vpath = $site_path."/videos/".$vname;
				echo $partAA;


				echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="480" height="270" id="player1" name="player1"
						<param name="movie" value="'.$site_path.'/jwplayer/player.swf">
						<param name="allowfullscreen" value="true">
						<param name="allowscriptaccess" value="always">
						<param name="flashvars" value="file='.$vpath.'&autostart=false">
						<embed id="player1"
							name="player1"
							src="'.$site_path.'/jwplayer/player.swf"
							width="600"
							height="350"
							allowscriptaccess="always"
							allowfullscreen="true"
							flashvars="file='.$vpath.'&autostart=false"
						/>
					</object>';
				echo $partAAZ;


	}



     if ($stat == 1) {
          $string = "";
          if ($nr > 0) {
               while ($re = mysql_fetch_array($cres)) {
                    $string .= "<div class=\"comment_list\"><p><b><i>".$re['author']."</i></b> >  ".$re['content']."<br /><br /><i>Posted on ".$re['date']."</i></p></div>";
               }
          }
          else {
               $string .= "<div class=\"comment_list\"><p>No comments so far</p></div>";
          }
     }
     else {
          $string = "";
     }
     echo $partB.$string.$partBZ;

     if ($stat == 1) {echo "<br />";
          echo $partC.
          "<form enctype=\"multipart/form-data\" action=\"#insert_comment\" method=\"post\" name=\"insert_comment\">
		<p><b>Discussion Post</b></p>";
          if ($err != "0") {
               echo "<br /><b><font color=\"red\">$err</font></b><br />";
          }
          else {
               echo "<br />";
          }

          echo "<div id=\"insert_comment_l\"><div id=\"insert_comment_l_l\"><p>Author<br /><br />E-Mail<br /></p></div>
			<div id=\"insert_comment_l_r\"><input class=\"form\" type=\"text\" id=\"author\" name=\"author\" onblur=\"validateForm(this.form);\"/><br />
			<input class=\"form\" type=\"text\" id=\"email\" name=\"email\" onblur=\"validateForm(this.form);\"/></div></div>";
     echo     "<div id=\"insert_comment_r\"><div id=\"insert_comment_r_l\"><textarea class=\"textarea\" name=\"content\" cols=\"50\" rows=\"2\" onblur=\"validateForm(this.form);\"></textarea></div>".
          "<div id=\"insert_comment_r_r\"><input class=\"botton_send\" type=\"submit\" name =\"sendcomment\" value=\"Send\" onclick=\"sendComment(this.form,'$spage','$id','$z'); return false;\"/></div></div></form>".$partCZ;
     }
     else {
          echo "<br />";
     }
}

function pm($m = "0",$s) {
     global $sock,$ajax,$site_path;
     if ($ajax == 0) {
          $partA = "<div id=\"insert_pm\">";
          $partAZ = "</div>";
     }
     else {
          $partA = "[insert_pm]";
          $partAZ = "[/insert_pm]";
     }

     echo $partA."<form enctype=\"multipart/form-data\" action=\"#insert_pm\" method=\"post\" name=\"insert_pm\">
          <p><b>Send me a PM</b>, I will reply as soon as possible</p>";
     if ($m != "0") {
          if ($s == 1) {
               $c = "black";
          }
          else {
               $c = "red";
          }
          echo "<p><b><font color=\"".$c."\">$m</font></b></p>";
     }
	else {
		echo "<br />";
	}

     echo "<div id=\"insert_comment_l\"><div id=\"insert_comment_l_l\"><p>From<br /><br />E-Mail<br /><br />Subject</p></div>
		<div id=\"insert_comment_l_r\"><input class=\"form\" type=\"text\" id=\"author\" name=\"author\" onblur=\"validateForm(this.form, 'pm');\"/><br />
		<input class=\"form\" type=\"text\" id=\"email\" name=\"email\" onblur=\"validateForm(this.form, 'pm');\"/><br />
		<input class=\"form\" type=\"text\" id=\"subject\" name=\"subject\" onblur=\"validateForm(this.form, 'pm');\"/></div></div>";
	echo        "<div id=\"insert_comment_r\"><div id=\"insert_comment_r_l\"><textarea class=\"textarea\" name=\"content\" cols=\"50\" rows=\"2\" onblur=\"validateForm(this.form, 'pm');\"></textarea></div>".
          "<div id=\"insert_comment_r_r\"><input class=\"botton_send\" type=\"submit\" name =\"sendcomment\" value=\"Send\" onclick=\"sendPm(this.form); return false;\"/></div></div></form>";
          echo $partAZ;
}

function send_comment($spage,$id,$com) {
     global $sock,$ajax;
     if (preg_match("/^\(author\)([^\[]+)\(\/a\)\(email\)([^\[]+)\(\/e\)\(content\)([^\[]+)\(\/c\)\(z\)([^\[]+)\(\/z\)$/",$com,$matches)) {
          $author = mysql_real_escape_string(htmlspecialchars($matches[1]));
          $email = mysql_real_escape_string(htmlspecialchars($matches[2]));
          $content = mysql_real_escape_string(htmlspecialchars($matches[3]));
		$z = $matches[4];
          $date = date("Y-m-d");
          $query = "INSERT INTO comments (section, id, author, email, website, date, content)".
                   "VALUES ('$spage','$id','$author','$email','','$date','$content')";
          $res = mysql_query($query,$sock) or mysql_error();
		if ($res) {
			$rows = mysql_affected_rows($sock) or mysql_error();
			$no = 1;
			if ($rows > 0) {
				$no = 0;
				comments("1",$spage,$id,$z);
			}
		}
          else {
			$no = 1;
		}
		if ($no == 1) {
               $err = "Some error occurred while inserting your comment, please try again later";
               comments("1",$spage,$id,$z,$err);
          }
     }
}

function send_pm($com) {
     global $sock,$ajax;
     $dmail = "osirys@autistici.org";
     $date = date("Y-m-d");

     if (preg_match("/^\(author\)([^\[]+)\(\/a\)\(email\)([^\[]+)\(\/e\)\(subject\)([^\[]+)\(\/s\)\(content\)([^\[]+)\(\/c\)$/",$com,$matches)) {
          $author = mysql_real_escape_string(htmlspecialchars($matches[1]));
          $email = mysql_real_escape_string(htmlspecialchars($matches[2]));
          $subject = mysql_real_escape_string(htmlspecialchars($matches[3]));
          $content = mysql_real_escape_string(htmlspecialchars($matches[4]));
          $date = date("Y-m-d");
          $query = "INSERT INTO inbox (`id`, `date`, `from`, `subject`, `email`, `content`)".
                   "VALUES ('null','$date','$author','$subject','$email','$content')";
          $res = mysql_query($query,$sock) or mysql_error();
		if ($res) {
			$rows = mysql_affected_rows($sock) or mysql_error();
		}
		else {
			$rows = 0;
		}
          $header = "To: Ricevente <$dmail>\n";
          $header .= "From: Inviante <$email>\n";
          $content = wordwrap($content, 70);
          if (mail($dmail,$subject,$content,$header)) {
               $esent = 1;
          }
          else {
               $esent = 0;
          }
          if (($rows > 0)||($esent == 1)) {
               $mess = "Your message has succesfully been sent. Thank you, I'll give you a reply as soon as possible.";
               pm($mess,1);
          }
          else {
               $err = "Some error occurred while sending your message, please try again later";
               pm($err,0);
          }
     }
}




function tras($string) {
     $string = preg_replace("/\[/", '_!_!!_!', $string);
     $string = preg_replace("/\]/", '!_!!_!_', $string);
     return($string);
}

?>
