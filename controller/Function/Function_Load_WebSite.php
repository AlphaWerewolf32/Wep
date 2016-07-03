<?php
function F_PreLoad_WebSite($IsConnectedToDB, $IsMaintenance, $IsAdmin){
	if($IsConnectedToDB){
		if($IsMaintenance){
			if($IsAdmin){
				F_Load_WebSite($IsMaintenance, $IsAdmin);
			}else{
				require($config['MainDirectory']."view/maintenance.php");
				//AFFICHER UNE PAGE PROPRE INDIQUANT QUE LE SITE EST EN MAINTENANCE ET QUE SEUL LES ADMINISTRATEURS PEUVENT Y ACCEDER;
			}
		}else{
			F_Load_WebSite($IsMaintenance, $IsAdmin);
		}
	}else{
		require($config['MainDirectory']."view/BDD_error.php");
		//AFFICHER UNE PAGE PROPRE INDIQUANT UNE ERREUR AVEC LA BASE DE DONNEES SANS DONNER D'INFORMATIONS SUPPLEMENTAIRES========================================================
		
	}
}

Function F_Load_WebSite($IsMaintenance, $IsAdmin){
	
		$config = GetConfig();
		//echo $config['Version'];
		
		//INCLUDE DE TOUTE LES FONCTIONS AU FORMAT "/^(Function_)(.*)\.php$/" DU DOSSIER "model"
		$Cache_Directory = $config['MainDirectory'] . "model";
		$Cache_Opendir = opendir($Cache_Directory);
		while($Cache_File = readdir($Cache_Opendir)){
			if(is_file($Cache_Directory.'/'.$Cache_File) && $Cache_File !='/' && $Cache_File !='.' && $Cache_File != '..'){
				if(preg_match("/^(Function_)(.*)\.php$/", $Cache_File) == true) {
					include $Cache_Directory.'/'.$Cache_File;
				}
			}
		}
		closedir($Cache_Opendir);
		
		require('controller/API/JSONAPI.php');
		
		require($config['MainDirectory']."view/Load.php");
		
		if($_GET["R"] == "InitAll"){
			if($IsAdmin){
				if(F_InitAll($config, $MySQL_connection, $_GET["U"], $_GET["P"])){
					echo("<br>Génération des tables terminée avec succès.");
				}else{
					echo("<br>Password / Username invalide");
				}
			}
			
		}
		
		
		
}
?>