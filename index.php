<?php

// -- simgr --
$conf['s3'] = null;



// -----------
$resource = addslashes($_GET['r']);

$get = explode('-_-', $resource ); 
$xdi = explode('x', $get[0]);
$dim = $xdi[0];
$ext = explode('.', $resource );



// -- dimension case
if($dim < 768 ) {
	$name = 'xs';
} elseif($dim >= 768 && $dim < 992) {
	$name = 'sm';
} elseif($dim >= 992 && $dim < 1200) {
	$name = 'md';
} else {
	$name = 'lg';
}



// -- extension case for header
$type = strtolower($ext[1]);
if($type === 'png') {
  header("Content-type: image/png");
} elseif($type === 'jpg' || $type === 'jpeg') {
  header("Content-type: image/jpg");
}



$file   = $name.'_'.$get[1];
$stream = $get[1];
if(is_file('img/'.$file)) {
	$stream = $file;
  echo file_get_contents('img/'.$stream);
} // else create it



die();
