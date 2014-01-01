<?php
if(!function_exists('getimagesizefromstring')) {
    function getimagesizefromstring($data)
    {
        $filename = tempnam('/tmp', 'img');
        file_put_contents($filename, $data);
        return getimagesize($filename);
    }
}
function sendCacheHeaders()
{
	global $filename;
	session_cache_limiter('none');
	header('Cache-control: max-age='.(60*60*24*365));
	header('Expires: '.gmdate(DATE_RFC1123,time()+60*60*24*365));
	header('Last-Modified: '.gmdate(DATE_RFC1123,filemtime($filename)));
}
function chbo($num) {
    $data = dechex($num);
    if (strlen($data) <= 2) {
        return $num;
    }
    $u = unpack("H*", strrev(pack("H*", $data)));
    $f = hexdec($u[1]);
    return $f;
}
$map = str_replace(array('..', '/'), '', $_GET['m']);
if(isset($_GET['t']))
	$imagename = '../uploads/mapimages/'.$map.'_t.jpg';
else
	$imagename = '../uploads/mapimages/'.$map.'.jpg';
if(!file_exists($imagename))
{
	$filename = '../uploads/maps/'.$map.'.map';
	if(!file_exists($filename))
		exit;
	$fh = fopen($filename, 'rb');

	$magic = unpack('i', fread($fh, 4));
	$magic = $magic[1];

	$data = fread($fh, filesize($filename) - 4);
	$zfilename = 'map_'.rand(0, 1000);
	$tmp = '/tmp/'.$zfilename.'.7z';
	file_put_contents($tmp, $data);
	shell_exec(dirname(__FILE__).'/7z/7z e '.$tmp.' -o/tmp');
	fclose($fh);

	$fh = fopen('/tmp/'.$zfilename, 'rb');
	$nlength = unpack('c', fread($fh, 1));
	$nlength = $nlength[1];
	$name = fread($fh, $nlength);
	$images = array();
	$sizes = array();
	while(!feof($fh))
	{
		$nlength = unpack('c', fread($fh, 1));
		$nlength = $nlength[1];
		$name = fread($fh, $nlength);
		$datalength = unpack('I', fread($fh, 4));
		$datalength = ($datalength[1]);
		fread($fh, 4);
		$imagedata = fread($fh, $datalength);
		$sizes[$name] = @getimagesizefromstring($imagedata);
		$im = @imagecreatefromstring($imagedata);
		if(!$im)
			break;
		$images[$name] = $im;
	}
	$im = $images['main.jpg'];
	$s = $sizes['main.jpg'];
	if(isset($_GET['t']))
	{
		$scaled = imagecreatetruecolor(140, 80);
		imagecopyresampled($scaled, $im, 0, 0, $s[0]/2-210, $s[1]/2-120, 140, 80, 420, 240);
		$im = $scaled;
	}
	imagejpeg($im, $imagename);
}
sendCacheHeaders();
header('Content-type: image/jpeg');
echo file_get_contents($imagename);
?>