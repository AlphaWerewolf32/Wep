<?php
function Function_GetBrowser(){
	$Cache_User_Agent = $_SERVER['HTTP_USER_AGENT'];
	if(empty($Cache_User_Agent))
	return array('nav' => 'NC', 'name' => 'NC', 'version' => 'NC');
	$Cache_Navs = array(
	'MSIE 8' => array('nav' => 'IE8', 'name' => 'Internet Explorer'),
	'MSIE 7' => array('nav' => 'IE7', 'name' => 'Internet Explorer'),
	'MSIE 6' => array('nav' => 'IE6', 'name' => 'Internet Explorer'),
	'MSIE 5.5' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'MSIE 5' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'MSIE 4' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'MSIE 3' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'MSIE 2' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'MSIE' => array('nav' => 'IE', 'name' => 'Internet Explorer'),
	'Firefox/3' => array('nav' => 'Firefox', 'name' => 'Mozilla Firefox'),
	'Firefox/2' => array('nav' => 'Firefox', 'name' => 'Mozilla Firefox'),
	'Firefox/1' => array('nav' => 'Firefox', 'name' => 'Mozilla Firefox'),
	'Firefox' => array('nav' => 'Firefox', 'name' => 'Mozilla Firefox'),
	'Opera/9' => array('nav' => 'autre',    'name' => 'Opéra'),
	'Opera 9' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera/8' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera 8' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera/7' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera 7' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera/6' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera 6' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Opera' => array('nav' => 'autre', 'name' => 'Opéra'),
	'Chrome/2' => array('nav' => 'Chrome', 'name' => 'Google Chrome'),
	'Chrome/1' => array('nav' => 'Chrome', 'name' => 'Google Chrome'),
	'Chrome/0' => array('nav' => 'Chrome', 'name' => 'Google Chrome'),
	'Chrome' => array('nav' => 'Chrome', 'name' => 'Google Chrome'),
	'ELinks' => array('nav' => 'autre', 'name' => 'ELinks'),
	'Firebird' => array('nav' => 'autre', 'name' => 'Firebird'),
	'Konqueror/4' => array('nav' => 'autre', 'name' => 'Konqueror'),
	'Konqueror/3' => array('nav' => 'autre', 'name' => 'Konqueror'),
	'Konqueror' => array('nav' => 'autre', 'name' => 'Konqueror'),
	'Links' => array('nav' => 'autre', 'name' => 'Links'),
	'Lynx' => array('nav' => 'autre', 'name' => 'Lynx'),
	'midori' => array('nav' => 'autre', 'name' => 'Midori'),
	'Minimo' => array('nav' => 'autre', 'name' => 'Minimo'),
	'Netscape/8' => array('nav' => 'autre', 'name' => 'Netscape'),
	'Netscape/7' => array('nav' => 'autre', 'name' => 'Netscape'),
	'Netscape' => array('nav' => 'autre', 'name' => 'Netscape'),
	'OffByOne' => array('nav' => 'autre', 'name' => 'OffByOne'),
	'OmniWeb' => array('nav' => 'autre', 'name' => 'OmniWeb'),
	'iCab' => array('nav' => 'autre', 'name' => 'iCab'),
	'amaya' => array('nav' => 'autre', 'name' => 'Amaya'),
	'Nokia' => array('nav' => 'autre', 'name' => 'Nokia'),
	'Safari' => array('nav' => 'Safari', 'name' => 'Safari')
	);
	foreach($Cache_Navs as $Cache_ID_Nav => $Cache_Content_Nav){
		$Cache_Num = substr($Cache_ID_Nav, -1);
			if(strpos($Cache_User_Agent, $Cache_ID_Nav)){
			$Cache_Content_Nav['version'] = is_numeric($Cache_Num) ? $Cache_Num : 'NC';
			return $Cache_Content_Nav;
		}
	}
}
?>