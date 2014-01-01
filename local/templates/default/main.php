<?php
	function output_clear()
	{
		echo '<div class="clear"></div>';
	}
	function output_header($title)
	{
		global $username, $userid, $mybb;
		if(!defined('HEADER'))
		{
			include("tpl_header.php");
			define('HEADER', 1);
		}
	}
	function output_footer()
	{
		include("tpl_footer.php");
	}
	function output_form_start($f, $show_id, $show_token, $errors, $method, $fileupload, $params, $style)
	{
		$form_id_input = '';
		$form_id_input .= $show_id ? '<input type="hidden" name="form_id" value="'.$f.'"/>' : '';
		$form_id_input .= $show_token ? '<input type="hidden" name="_t" value="'.form_token().'"/>' : '';
		
		include("tpl_form_start_$style.php");
	}
	function output_form_field($name, $field, $style)
	{
		include("tpl_form_field_$style.php");
	}
	function tpl_form_input($name, $field)
	{
		$type = explode(';', $field['type']);
		$type = $type[0];
		$input_tag = '<input type="text" name="'.$name.'" value="'.$field['value'].'" size="'.$field['size'].'" maxlength="'.$field['size'].'"/>';
		switch($type)
		{
			case 'string':
			return $input_tag;
			case 'file':
			return '<input type="file" name="'.$name.'"/>';
			case 'textarea':
			$size = explode('x', $field['size']);
			return '<textarea rows="'.$size[0].'" cols="'.$size[1].'" name="'.$name.'">'.$field['value'].'</textarea>';
		}
	}
	function output_form_end($submit, $style)
	{
		include("tpl_form_end_$style.php");
	}
	function output_block_start($t, $id='')
	{
		$notitle = $t == '';
		echo '<div class="block'.($notitle ? '  notitle' : '').'"'.($id == '' ? '' : ' id="'.$id.'"').'>
<div class="btitle">'.$t.'</div>
<div class="bcontents">
<div class="bcontents_t">
<div class="bcontents_text">
';
	}
	function output_block_end()
	{
		echo '</div></div><div class="bcontents_b"></div></div>
</div>';
	}
	function output_messagebox($text)
	{
		echo '<div class="message">'.$text.'</div>';
	}
	function output_comment($author, $author_url, $author_name, $date, $text)
	{
		include('tpl_comment.php');
	}
	function output_map_page($short_name, $name, $author_name, $author_url, $date, $downloads, $description)
	{
		echo '
		<div id="game_page">
		<div id="gameimage" style="background-color:black">
			<iframe scrolling="no" width="450" height="300" src="/inc/map_preview.php?m='.$short_name.'&w=450&h=300"></iframe>
			<div id="gameimage_top">
			'.$name.'
			</div>
			<div id="gameimage_bottom">
				By <a href="'.$author_url.'">'.$author_name.'</a>'.$extra.' &middot; Updated on '.$date.' &middot; '.$downloads.' downloads
			</div>
		</div>
		<div id="gameoptions" class="b_box">
			<div class="bcontents">
				<div id="gamedescription">
				'.$description.'
				</div>
				<a href="/map/'.$short_name.'?download"><img src="/resources/download.png" alt="Download" /></a>
			</div>
		</div>
		</div>';
	}
	function output_message($title, $msg)
	{
		clear_buffer();
		output_header($title);
		output_block_start($title);
		echo $msg;
		output_block_end();
		output_footer();
		exit;
	}
?>