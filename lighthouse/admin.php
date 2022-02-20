<?php
// admin.php 

// Includes
	include('file_upload.php'); 

// Variables
	$table	= 'albums';
	$pgm2	= 'website.php?p=admin';
	$extns	= array('.gif', '.jpg', '.jpeg', '.png', '.webp'); 
	$max	= 1000000;
	$dir	= 'pictures'; 
	$input	= 'picture';
	$msg 	= NULL;

// Get Input
	if(isset($_POST['album']))	$album = $_POST['album'];	else $album = NULL;
	if($album == 'Select')		$album = NULL;
	
// Upload Picture
	if (isset($_POST['submit'])) {
		if(isset($_FILES[$input]['tmp_name'])) {
			list($rc, $filename) = upload($input, $dir, $album, $extns, $max);
			if ($rc == 0) {
				$query = "UPDATE $table SET picture = '$filename' WHERE rowid = '$album'";
				$result = mysqli_query($mysqli, $query);
				if (!$result) $msg =  "QUERY FAILED [$query]" . mysqli_error($mysqli); 
				else $msg = "File Uploaded, filename = $filename";
				}
			else $msg =  "$filename: return code $rc"; 
			}
		}
	else $msg = "Select an Album and upload a picture"; 
	
// Output
// Student Dropdown
	echo "<div align='center' style='font-weight:bold;'>Album Picture Upload</div>
		  <p><form action='$pgm2' method='POST' enctype='multipart/form-data'>
		  <table align='center'><tr><td>
		  Select an Album: <select name='album'>
		  <option>Select</option>";
	$query = "SELECT rowid, album
			  FROM $table
			  ORDER BY album";
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "QUERY FAILED [$query]" . mysqli_error($mysqli); 
	while(list($rowid, $album) = mysqli_fetch_row($result)) {
		if ($rowid == $album) $se = 'SELECTED'; else $se = NULL;
		echo "<option value='$rowid' $se>$album</option>\n";
		}
	echo "</select>
		  <p>Select a Picture: <input type='file' name='picture'>
		  <p><input type='submit' name='submit' value'Submit'>
		  </td></tr></table></form>
		  <p>MESSAGE: $msg";
?>