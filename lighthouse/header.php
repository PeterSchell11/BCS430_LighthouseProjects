<?php
// header.php - Webpage Heading

// Output
	echo "<!doctype HTML><html><body style='$page_style'>
		  <table width='$width' align='center'>
		  <tr><td align='center'>
		  <p style='$header_style'>$title
		  <br>Welcome $user";
	if ($role != NULL) echo ", $role"; 
?>