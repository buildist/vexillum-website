<?php
mod("pager");
mod("form");

$gp = pager_init(30);

$searchform = form_create('Search', 'inline', null, 'get');
form_add_param($searchform, 'Value', 'search', 'string', '', 100, 14);

$search = p_string('search');
$sort = p_string('sort', 1);

if(!empty($_GET["search"]))
	$where = ' WHERE "'.time().'" - lastupdate < 45 AND public=1 AND (name LIKE "%'.e_mysql($search).'%" OR ip LIKE "%'.e_mysql($search).'%")	';
else
	$where = ' WHERE "'.time().'" - lastupdate < 45 AND public=1';
switch($sort)
{
	case 1:
		$order = "players DESC, name DESC";
	break;
	case 2:
		$order = "name DESC";
	break;
}

function showSortLink($id, $name)
{
	global $search, $sort, $left;
	if($sort == $id)
		echo '<strong>';
	echo '<li><a href="'.self(array('sort'=>$id)).'">'.$name.'</a></li>';
	if($sort == $id)
		echo '</strong>';
	echo "\n";
}

function show_left()
{
	global $searchform;
	output_block_start('Search');
	form_display($searchform);
	output_block_end();
	output_block_start('Sort by');
	echo '<ul>';
	showSortLink(1, "Player Count");
	showSortLink(2, "Name");
	echo '</ul>';
	output_block_end();
}

function display_server($row)
{
	echo '<div class="game"><strong>'.$row['name'].'</strong><br/>Players: '.$row['players'].'/'.$row['maxplayers'].'<br/>Map: '.$row['map'].'<br/>IP: '.$row['ip'].':'.$row["port"].'</div>';
}

output_header('Servers');
output_block_start('Servers');
pager_display($gp, "SELECT * FROM servers$where ORDER BY $order", 'display_server');
output_clear();
output_block_end();
output_footer();
?>