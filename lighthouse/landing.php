<?php
// landing.php - Check that program was called by WEBSITE.PHP
// Check if called by WEBSITE.PHP, if not redirect to HOME page
	if (!isset($landing)) {
		header('Location: website.php');
		exit;
		}
?>