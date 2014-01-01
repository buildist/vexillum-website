<?php
if(!defined('NOT_IN_FORUM'))
{
	define('NOT_IN_FORUM', 1);
	require_once('../inc/init.php');
	
	include($GLOBALS['templates_path'].'/'.$GLOBALS['config']['template'].'/main.php');
	echo '<link rel="stylesheet" href="/resources/style.css"/>';
}
?>
<?php
global $headhtml;
if(isset($headhtml))
	echo $headhtml;
?>