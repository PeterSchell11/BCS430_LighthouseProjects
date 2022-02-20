<?php
// check_logon.php - Check LOGON status for Private Pages
// Check for Logon, if not Logged on, redirect to LOGON page
	if (!$logon) {
		header('Location: logon.php');
		exit;
		}
?>