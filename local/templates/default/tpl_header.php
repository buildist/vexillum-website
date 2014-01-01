<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html<?php if(isset($html_attributes)) echo $html_attributes; ?>>
<head>
<title>Vexillum - <?php echo $title; ?></title>
<?php if(isset($html_head)) echo $html_head."\n";
include("header_head.php");?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<?php
show_js('vex'); 
show_css('resources/fonts');
show_css('resources/style'); 
show_css('lightbox/css/lightbox');
show_js('lightbox/js/lightbox');
?>
</head>
<body>
<?php include("header_body.php"); ?>
