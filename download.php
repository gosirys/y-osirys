<?php

error_reporting(0);
ini_set('display_errors','Off');

require("./functions.php");
require("./config.php");

global $site_path;

$sock = mysql_connection(1);

$ok = 0;
$bad = 0;
$go_ = 0;

if (isset($_GET['no'])) {
	$no = 1;
}
else {
	$no = 0;
}

if (isset($_GET['file'])) {
	if ($no == 1) {
		$go_ = 1;
	}
	else {
		if ((isset($_GET['sec']))&&(isset($_GET['id']))) {
			$go_ = 1;
		}
	}
}

if ($go_ == 1) {
	$p_file = enc("decode",$_GET['file']);
	if (file_exists($p_file)) {
		if (!preg_match('/\.\./',$p_file)) {
			if (preg_match('/^videos|^exploits|^softwares|^articles|^texts/',$p_file)) {
				$ok = 1;
			}
		}
	}
	if ($ok == 1) {
		$encfile = $_GET['file'];
		$file = enc("decode",$encfile);
		if ($no == 0) {
			$id = secure($_GET['id'],1);
			$sec = secure($_GET['sec'],2);
			increment($sec,$id,1);
		}
		//$file_mime = mime_content_type($file);
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename= ".$file);
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . filesize($file));
		//header("Content-Type: $file_mime");
		readfile($file);
	}
	else {
		$bad = 1;
	}
}
else {
	$bad = 1;
}

if ($bad == 1) {
	header ("location: $site_path");
}

mysql_connection(0);

?> 
