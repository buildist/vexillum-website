<?php
header('Content-type: text/plain');
require('../inc/init.php');
require_once MYBB_ROOT."inc/functions_user.php";
$user = mysql_real_escape_string($_GET["user"]);
$password = mysql_real_escape_string($_GET["pass"]);
if(username_exists($user))
{
	$user_array = validate_password_from_username($user, $password);
	if($user_array)
		echo '1';
	else
		echo '0';
}
else
	echo "0";
?>