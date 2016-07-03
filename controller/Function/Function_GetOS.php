<?php
function F_GetOS() {
	include $Main_Directory . "Global_Variables.php";
	if (preg_match_all("#Windows NT (.*)[;|\)]#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		if ($version[1][0] == '6.1')
		{
			return 'Windows Seven';
		}
		elseif($version[1][0] == '6.0')
		{
			return 'Windows Vista';
		}
		elseif($version[1][0] == '5.1')
		{
			return 'Windows XP';
		}
		elseif($version[1][0] == '5.2')
		{
			return 'Windows Server 2003';
		}
		else
		{
			return 'Windows ' . $version[1][0];
		}
	}
	elseif (preg_match_all("#Mac (.*);#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		return 'Mac ' . $version[1][0];
	}
	elseif (preg_match("#Windows 98#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Windows 98';
	}
	elseif (preg_match("#Mac#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Mac';
	}
	elseif (preg_match("#SunOS#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'SunOS';
	}
	elseif (preg_match("#Fedora#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Fedora';
	}
	elseif (preg_match("#Haiku#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Haiku';
	}
	elseif (preg_match("#Ubuntu#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Linux Ubuntu';
	}
	elseif (preg_match("#FreeBSD#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'FreeBSD';
	}
	elseif (preg_match("#Linux#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Linux';
	}
	elseif (preg_match("#LauncherOlrikPVP#", $_SERVER["HTTP_USER_AGENT"]))
	{
		return 'Launcher';
	}
	else {
		return 'Unknow';
	}
}
?>