<?php
if($_GET['redirect'])
{
	echo '<script>
	window.top.location="/welcome";
	</script>';
	exit;
}
output_header('Registration completed');
output_block_start('Registration completed');
echo '<p>Welcome to Vexillum! Your username is now registered and you may participate in our forums.</p>';
output_block_end();
output_footer();
?>