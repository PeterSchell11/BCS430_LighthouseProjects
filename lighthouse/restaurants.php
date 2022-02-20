<?php
// albums.php - Show Student Information, LOGON required
// Written by:  Prof. Kaplan, November 2021

// Includes
	include('image_resize.php'); 

// Variables
	$td1	= "width='15%' align='right'";
	$td2	= "width='85%' align='left'";
	$table	= 'albums';
	$pgm2	= 'website.php?p=albums';

// Get Input
	if(isset($_POST['inrow']))	$inrow = $_POST['inrow'];	else $inrow = NULL;
	if($inrow == 'Select')		$inrow = NULL;

// Output
// Student Dropdown
	
	$query = "SELECT rowid, album
			  FROM $table
			  ORDER BY album";
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "QUERY FAILED [$query]" . mysqli_error($mysqli);
	echo "<div align='center' style='font-weight:bold;'>Album Information</div>
		  <p><form action='$pgm2' method='POST'>
		  <table align='center'><tr><td>
		  Select an Album: <select name='inrow' onchange='this.form.submit()'>
		  <option>Select</option>";
	 
	while(list($rowid, $album) = mysqli_fetch_row($result)) {
		if ($rowid == $inrow) $se = 'SELECTED'; else $se = NULL;
		echo "<option value='$rowid' $se>$album</option>\n";
		}
	echo "</select></table></form>";	
	
// Student Information
	if ($inrow != NULL) {
		$query = "SELECT album, song, year, review, picture
				  FROM $table
				  WHERE rowid = '$inrow'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) echo "QUERY FAILED [$query]" . mysqli_error($mysqli);
		
		list($album, $song, $year, $review, $picture) = mysqli_fetch_row($result); 
		echo "<p><table width='$width' align='center' border='frame' rules='all' cellpadding='5'>
			  <tr><td $td1>ROWID	</td><td $td2>$inrow				</td></tr>
			  <tr><td $td1>Album	</td><td $td2>$album				</td></tr>
			  <tr><td $td1>Songs	</td><td $td2>$song 				</td></tr>
			  <tr><td $td1>Year		</td><td $td2>$year 				</td></tr>
			  <tr><td $td1>Review	</td><td $td2>$review 				</td></tr>
			  <tr><td $td1>Picture	</td><td $td2>$picture 				</td></tr>
			  </table>";
		if ($picture != NULL) {
			list($new_width, $new_height) = image_resize($picture, 250, 250);
			$pic = "<img src='$picture' width='$new_width' height='$new_height'>"; 
			}
		else $pic = '<b>Picture not on file</b>'; 
		echo "<p><table align='center' frame='border'><tr><td>$pic</td></tr></table>";
		}
?>
<!DOCTYPE html>
<html>
<body>


	<style>
body {
  background-image: url('get_back.jpg');
  background-repeat: repeat;
  background-attachment: fixed;
  background-size: 50% 100%;
}
</style>

</body>
</html>