<?php
mod('form');
$comments_type = 0;
$comments_id = 0;
function init_comments($content_type, $content_id)
{
	$GLOBALS['comments_type'] = $content_type;
	$GLOBALS['comments_id'] = $content_id;
	mod('pager');
	$GLOBALS['cp'] = pager_init(10);
	$GLOBALS['cf'] = form_create('Post Comment', 'default', 'post_comment', 'post');
	form_add_param($GLOBALS['cf'], '', 'message', 'textarea', '', null, '10x76');
	form_process();
}
function post_comment()
{
	global $comments_type, $comments_id, $userid;
	db_query("INSERT INTO sitecomments(userid, date, text, content_id, content_type ) VALUES($userid, \"".time()."\", \"".e_mysql($_POST['message'])."\", $comments_id, $comments_type)");
}
function show_comment($row)
{
	output_comment($row['userid'], player_link($row['userid'], get_username($row['userid'])), get_username($row['userid']), parse_date($row['date']), e_html($row['text']));
}
function show_comments()
{
	global $comments_type, $comments_id, $cp, $cf;
	output_block_start('Comments');
	pager_display($cp, 'SELECT * FROM sitecomments WHERE content_type="'.$comments_type.'" AND content_id="'.$comments_id.'" ORDER BY date DESC', 'show_comment');
	pager_pagelinks($cp);
	form_display($cf);
	output_block_end();
}
?>