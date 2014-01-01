<?php
$filename = htmlspecialcharS($_GET['m']);
$w = htmlspecialchars($_GET['w']);
$h = htmlspecialchars($_GET['h']);
?>
<html>
<head>
<title>Map Preview</title>
<body style="margin:0; padding:0;">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src='dragscrollable.js'></script>
</head>
<div id="frame" style="width:<?php echo $w; ?>px;height:<?php echo $h; ?>px; overflow: hidden;">
<div class="dragger" style="cursor:move">
<img src="map_image.php?m=<?php echo $filename; ?>" onload="scroll()"/>
</div>
</div>
<script>
$('#frame').dragscrollable({dragSelector: '.dragger:first', acceptPropagatedEvent: true});
function scroll()
{
	var frame = document.getElementById('frame');
	frame.scrollTop =frame.scrollHeight/2-<?php echo $h/2; ?>;
	frame.scrollLeft =frame.scrollWidth/2-<?php echo $w/2; ?>;
}
</script>
</body>