<?php
mod('form');
$form = form_create('Upload Map', 'default', 'process_form', 'post');
function process_form()
{
	global $form, $root, $userid;
	$f = $_FILES['file'];
	$mapname = explode('.', $f['name']);
	$mapname = $mapname[0];
	if(preg_match('/^[a-z0-9_]+$/', $mapname))
	{
		$result = db_query('SELECT shortname FROM maps WHERE shortname="'.$mapname.'"');
		if(mysql_num_rows($result) == 0)
		{
			if(!move_uploaded_file($f['tmp_name'], $root.'/uploads/maps/'.$mapname.'.map'))
			{
				form_add_error($form, 'Error uploading file.');
			}
			else
			{
				db_query('INSERT INTO maps(shortname, owner, name, details, date) VALUES("'.$mapname.'", "'.$userid.'", "'.e_mysql($_POST['name']).'", "'.e_mysql($_POST['details']).'", "'.time().'")');
				header('Location: /map/'.$mapname);
			}
		}
		else
			form_add_error($form, 'A map with this name already exists.');
	}
	else
		form_add_error($form, 'The name can only contain letters, numbers, and underscores.');
}
form_add_param($form, 'File', 'file', 'file;map;20000000', '', 100, 14);
form_add_param($form, 'Name', 'name', 'string', '', 100, 76);
form_add_param($form, 'Details', 'details', 'textarea', '', 100, '10x76');
form_process();
$headhtml = '<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />';
output_header("Upload Map");
output_block_start("Upload Map");
form_display($form);
output_block_end();
output_footer();
?>