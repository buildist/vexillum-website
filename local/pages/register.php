<?php
if($userid > 0)
header('Location: /');
output_header();
output_block_start('Register');
?>
Note: Registration is not required to play Vexillum! You only need to register if you want to post on the forums or prevent other people from taking your username.<br/>
<iframe src="/forum/member.php?action=register" frameborder="no" width="100%" height="1000" style="overflow-y:hidden" scrolling="no"></iframe>
<?php
output_block_end();
output_footer();
?>