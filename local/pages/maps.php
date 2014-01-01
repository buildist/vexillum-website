<?php
mod("pager");
mod("form");

$gp = pager_init(30);

$searchform = form_create('Search', 'inline', null, 'get');
form_add_param($searchform, 'Value', 'search', 'string', '', 100, 14);

$search = p_string('search');
$sort = p_string('sort', 1);

if(!empty($_GET["search"]))
	$where = ' WHERE (name LIKE "%'.e_mysql($search).'%" OR details LIKE "%'.e_mysql($search).'%")	';
else
	$where = '';
switch($sort)
{
	case 1:
		$order = "downloads DESC, name DESC";
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
	showSortLink(1, "Downloads");
	showSortLink(2, "Name");
	echo '</ul>';
	output_block_end();
}

function display_map($row)
{
	echo '<div class="game" style="background-image:url(/inc/map_image.php?m='.$row['shortname'].'&t)"><div class="gamecaption"><a href="/map/'.$row['shortname'].'"><strong>'.$row['name'].'</strong></a></div></div>';
}

output_header('Maps');
output_block_start('Maps (<a href="/upload_map">Add Your Map</a>)');
pager_display($gp, "SELECT * FROM maps$where ORDER BY $order", 'display_map');
output_clear();
output_block_end();
output_footer();
?>