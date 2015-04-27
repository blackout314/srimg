<?php

// -- simgr --

$conf['s3'] = null;

// -----------

$nam = '';
$get = explode('-_-', addslashes($_GET['r']));
$xdi = explode('x', $get[0]);
$dim = $xdi[0];

if($dim < 768 ) {
	$name = 'xs';
} elseif($dim >= 768 && $dim < 992) {
	$name = 'sm';
} elseif($dim >= 992 && $dim < 1200) {
	$name = 'md';
} else {
	$name = 'lg';
}

$file = $name.'_'.$get[1];
$stream = $get[1];
if(is_file('img/'.$file)) {
	$stream = $file;
} // else create it

header("Content-type: image/png");
echo file_get_contents('img/'.$stream);
die();

?>
