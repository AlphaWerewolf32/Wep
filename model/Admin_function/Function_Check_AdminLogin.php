<?php
function F_Check_AdminLogin($config, $Username, $Password){
	if(F_Decrypt($Password, $config['Admin_Password']) == "Access granted" && $Username == $config['Admin_Username']){
		return true;
	}else{
		return false;
	}
}
?>