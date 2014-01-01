<?php
function error_page($msg)
{
	if(function_exists('output_message'))
		output_message('Error', $msg);
	global $templates_path;
	echo ($msg);
	die();
}
?>