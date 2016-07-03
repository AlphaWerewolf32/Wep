<?php
function GetConfig(){
	// Configurations |==>
	$config['MainDirectory'] = $_SERVER["DOCUMENT_ROOT"] . "/";
	$config['Cryptkey'] = "552b584a2e242979e065c315dea3d876"; //md5(sha1("MyPassword.php-TW-POI"))
	$config['Maintenance'] = scesc;
	//$config['QueriesMethod'] = "*";
	$config['MySQL_Host'] = "localhost";
	$config['MySQL_Username'] = "team-wolf_kd6d";
	$config['MySQL_Password'] = "MyPassword.php";
	$config['MySQL_Base'] = "team-wolf_kd6d";
	$config['Admin_Host'][0] = "78.222.225.92";
	$config['Admin_Host'][1] = "90.113.29.183";
	$config['Admin_Host'][2] = "90.0.4.131";
	$config['Admin_Host'][3] = "192.168.1.12";
	$config['Admin_Username'] = "AlphaWerewolf";
	$config['Admin_Password'] = "d5eZm6aqg5mkmtGsy8Y=";   // ADMIN PASSWORD == 'BJ-540-ES'
	$config['Version'] = "InDev";
	$config['JSONAPI_Host'] = "";
	$config['JSONAPI_Port'] = "";
	$config['JSONAPI_Username'] = "";
	$config['JSONAPI_Password'] = "";
	$config['JSONAPI_Salt'] = "salt";
	
	$config['SRV_Name'] = "OlrikPVP";
	$config['SRV_IP'] = "Unknow";
	$config['SRV_Description'] = "Serveur full PVP, 1V1, faction, faction hardcore en développement";
	
	// <==|
	
	return $config;
}

$config = GetConfig();

if($config['Version'] !== "InDev") {
	error_reporting(~E_ALL);
}

//INCLUDE DE TOUTE LES FONCTIONS AU FORMAT "/^(Function_)(.*)\.php$/" DU DOSSIER "controller/Function"
$Cache_Directory = $config['MainDirectory'] . "controller/Function";
$Cache_Opendir = opendir($Cache_Directory);
while($Cache_File = readdir($Cache_Opendir)){
	if(is_file($Cache_Directory.'/'.$Cache_File) && $Cache_File !='/' && $Cache_File !='.' && $Cache_File != '..'){
		if(preg_match("/^(Function_)(.*)\.php$/", $Cache_File) == true) {
			include $Cache_Directory.'/'.$Cache_File;
		}
	}
}
closedir($Cache_Opendir);

$MySQL_connection = new mysqli($config['MySQL_Host'],$config['MySQL_Username'],$config['MySQL_Password']);
if($MySQL_connection->connect_error) {
	$IsConnectedToDB = false;
}else{
	mysqli_set_charset($MySQL_connection, 'utf8');
	$IsConnectedToDB = true;
}

function GetMySQL(){
	return $MySQL_connection;
}

$C_Admin_Host = count($config['Admin_Host']);
$SC_Admin_Host = 0;
$User_IP = F_GetIP();
$IsAdmin = false;
while($SC_Admin_Host < $C_Admin_Host && $IsAdmin == false){
	if($User_IP == $config['Admin_Host'][$SC_Admin_Host]){
		$IsAdmin = true;
	}
	$SC_Admin_Host++;
}

if($IsAdmin){
	if($config['Maintenance'] == true){
		F_PreLoad_WebSite($IsConnectedToDB, true, true);
	}else{
		F_PreLoad_WebSite($IsConnectedToDB, false, true);
	}
}else{
	if($config['Maintenance'] == true){
		F_PreLoad_WebSite($IsConnectedToDB, true, false);
	}else{
		F_PreLoad_WebSite($IsConnectedToDB, false, false);
	}
}
?>