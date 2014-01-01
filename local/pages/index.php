<?php
output_header('Home');
if(isset($_GET["r"]))
{
	setcookie("referer", $_GET["r"], 0, '/', '.2dworlds.org');
}
if(isset($_GET['2']))
{
	echo '<div class="message">2DWorlds is no longer being updated or maintained, but I\'m now working on Vexillum instead. Try it out!</div>';
}
output_block_start("");
?>
<div id="homepage">
<div id="vid">
<!--<img src="screenshot<?php echo rand(1, 6)?>.jpg" width="100%" alt="Screenshot" id="slideshow"/>-->
<iframe width="100%" height="100%" src="http://www.youtube.com/embed/g-VFNvZIwUw" frameborder="0" allowfullscreen></iframe>
</div>
<div id="intro">
<p>
Vexillum is a free multiplayer Capture the Flag game with guns, swords, and ninja rope! Work together with your team to capture the enemy's flag while protecting yours. Destroyable terrain and multiple weapon types ensure that every match will be different. Make custom maps and host your own server for maximum fun!
</p>
<div style="width: 380px; height:44px; position: relative; bottom: -80px;">
<a href="/download"><img src="/resources/download.png" alt="Download"/></a> <div style="float: right"><a href="http://www.indiedb.com/games/vexillum" title="View Vexillum on Indie DB" target="_blank"><img src="http://media.indiedb.com/images/global/indiedb.png" alt="IndieDB" /></a>
<a href="http://www.facebook.com/vexillumctf" title="Facebook Page" target="_blank"><img src="/resources/facebook.png" alt="Facebook" /></a></div></div>
</div>
</div>

<?php

output_block_end();
output_block_start("Screenshots");
?>
<a href="/resources/screenshot1.jpg" rel="lightbox" title=""><img src="/resources/screenshot1.jpg" width="300px"/></a>
<a href="/resources/screenshot2.jpg" rel="lightbox" title=""><img src="/resources/screenshot2.jpg" width="300px"/></a>
<a href="/resources/screenshot3.jpg" rel="lightbox" title=""><img src="/resources/screenshot3.jpg" width="300px"/></a>
<a href="/resources/screenshot4.jpg" rel="lightbox" title=""><img src="/resources/screenshot4.jpg" width="300px"/></a>
<a href="/resources/screenshot5.jpg" rel="lightbox" title=""><img src="/resources/screenshot5.jpg" width="300px"/></a>
 <?php
 output_block_end();
output_footer();
?>