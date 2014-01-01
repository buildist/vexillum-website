<?php
mod('comments');

$result = db_query('SELECT * FROM maps WHERE shortname="'.e_mysql($map).'"');
if(mysql_num_rows($result) == 0)
{
	output_message('Error', 'Unknown map: '.e_html($map));
}

$row = mysql_fetch_array($result);
if(isset($_GET['download']))
{
	db_query('UPDATE maps SET downloads=downloads+1 WHERE id='.$row['id']);
	header('Location: /uploads/maps/'.$map.'.map');
	exit;
}
$owner_name = get_username($row['owner']);
init_comments(0, $row['id']);

output_header('Map: '.$row['shortname']);
output_map_page(e_html($map), e_html($row['name']), $owner_name, player_link($row['owner']), parse_date($row['date']), $row['downloads'], $row['details']);
show_comments();
output_footer();
?>