<?php
$GLOBALS['root'] = dirname(dirname(__FILE__));
$GLOBALS['local'] = $GLOBALS['root'] .'/local';
$GLOBALS['inc'] = $GLOBALS['root'] .'/inc';
$GLOBALS['templates_path'] = $GLOBALS['local'] .'/templates';
require($GLOBALS['local'] .'/config.php');

if(!isset($noForum))
	$noForum = false;
if(!$noForum)
{
	if(!defined('IN_MYBB'))
	{
		chdir($GLOBALS['root']."/forum/");
		define("IN_MYBB", 1);
		require("./global.php");
		require_once "inc/class_parser.php";
		$parser = new postParser;
		chdir($GLOBALS['root']);
	}

	$username = $mybb->user['username'];
	$userid = $mybb->user['uid'];
	$currentuser = $mybb->user;
	$key = $mybb->user['loginkey'];
	$link = $db->read_link;
}
else
{
	$link = mysql_connect($config['mysql_server'], $config['mysql_user'], $config['mysql_pass']);
	mysql_select_db($GLOBALS['config']['mysql_db'], $link);
}

function mod($name)
{
	global $inc, $root, $local, $templates_path, $config, $userid;
	require_once($inc.'/functions.'.$name.'.php');
}
mod("core");
mod("input");
mod("error");
mod("database");
mod("data");
mod("js");
?>