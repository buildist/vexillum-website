<?php
$buffer_started = false;
function start_buffer()
{
	global $buffer_started;
	ob_start(OB_GZHANDLER);
	$buffer_started = true;
}
function clear_buffer()
{
	global $buffer_started;
	if($buffer_started)
		ob_clean();
}
?>