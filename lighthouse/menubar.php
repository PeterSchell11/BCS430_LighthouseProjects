<?php
// menubar.php - Navigation Bar

// Comments
// This program is included in the other scripts

// Output
	echo "<table align='center' cellpadding='5' frame='border' style='$menu_style'><tr>";
	foreach($pages as $key => $value) {
		if (($key == 'logon') AND ($logon)) $key = 'logoff';
		if (in_array($key, $restricted) AND (!$logon)) continue;
		if (in_array($key, $role_pages) AND ($role != $role_value)) continue;
		echo "<td><a href='$pgm?p=$key'>
			  <button style='color:$menu_color; background-color:$value; font-weight:bold;'>" . ucfirst($key) . "</button>
			  </a></td>\n";
		}
	echo "</tr></table><p>";
?>