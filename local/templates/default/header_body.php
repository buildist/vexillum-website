<body>
<noscript><div class="sitemessage">This site requires JavaScript to be enabled in your browser settings to work properly.</div></noscript>
	<div id="container">
		<div id="header">
			<div id="logo"><a href="/"></a></div>
			<div id="login">
<?php
if($mybb->user['uid'])
{
	echo '<div class="head" ></div> Logged in as '.$mybb->user['username']." &middot; <a class=\"linkbutton\" href=\"{$mybb->settings['bburl']}/member.php?action=logout&amp;logoutkey={$mybb->user['logoutkey']}\"> {$lang->welcome_logout} 
<img src=\"/resources/logout.png\" width=\"16\" height=\"16\" alt=\"\"/></a>";
}
else
{
?>
<form id="loginform" action="/forum/member.php" method="post">
    <input type="hidden" name="action" value="do_login" />
    <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"];?>" />
    <input type="hidden" name="remember" value="yes"/>
    <div id="loginfields" style="display:none">
        <input type="text" id="username" name="username" size="16"/> 
        <input type="password" id="password" name="password" size="10"/>
    </div>
    <input type="submit" name="submit" id="loginbutton" value="Log in"/>
    <a href="/register" class="linkbutton">Create an account</a>
</form>
<?php
}
?>
</div>
<div id="tabs">
</div>
<div id="nav">
				<ul>
<?php
if(!function_exists('showNavLink'))
{
    function showNavLink($url, $name, $extra="")
    {
        $class = stristr($_SERVER["REQUEST_URI"], $url) ? ' class="active"' : '';
        echo '<li'.$class.'><a href="'.$url.'"'.$extra.'>'.$name.'</a></li>';
    }
}
showNavLink('/forum/forumdisplay.php?fid=4', 'News');
showNavLink('/screenshots', 'Screenshots');
showNavLink('/servers', 'Servers');
showNavLink('/maps', 'Custom Maps');
showNavLink('/download', 'Download');
showNavLink('/forum/', 'Forum');
showNavLink('/credits', 'Credits');
?>
</ul>
<div id="likebutton">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fvexillumctf&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font=lucida+grande&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=490346647650001" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
</div>
			</div>
		</div>
		<div id="main">
		<div id="page_bg"></div>
			<div id="page">
			<div id="page_left">
			<?php if(function_exists('db_query')) {
output_block_start("Beta Info")			
?>
<p>
Vexillum is currently unfinished, but we've released it early so everyone can try it. The final game will have more maps and weapons and fewer bugs! Please report any bugs you find on the forums.
</p>
<?php
output_block_end();
}
?>
			<?php if(function_exists('show_left')) show_left(); ?>
			<div id="left_soldier">
			</div>
			</div>
			<div id="page_right">