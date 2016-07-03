<?php
function F_Encrypt($private_key, $str_to_crypt) {
	$private_key = md5($private_key);
	$letter = -1;
	$new_str = '';
	$strlen = strlen($str_to_crypt);

	for ($i = 0; $i < $strlen; $i++) {
		$letter++;
		if ($letter > 31) {
			$letter = 0;
		}
		$neword = ord($str_to_crypt{$i}) + ord($private_key{$letter});
		if ($neword > 255) {
			$neword -= 256;
		}
		$new_str .= chr($neword);
	}
	return base64_encode($new_str);
}
?>