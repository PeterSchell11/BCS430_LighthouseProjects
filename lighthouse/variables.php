<?php
// variables.php - Website Variables

// Variables
	$pgm 			= 'website.php'; 
	$pages			= array('home' 			=> 'lightblue', 
							'about' 		=> 'lightgreen',
							'locations'		=> 'red',
							'calendar'		=> 'brown', 
							'donate' 		=> 'yellow',
							'logon' 		=> 'pink');
	$restricted		= array('upload', 'update');
	$role_pages 	= array('admin');
	$role_value 	= 'Admin';	
	$shutdown		= FALSE;
	$width			= '400'; 
	
// Appearance
	$title			= 'Lighthouse Project'; 
	$footer 		= 'Thanks for visiting'; 
	$page_bgcolor 		= 'lightgray'; 
	$page_style		= "background-color:$page_bgcolor;";
	$header_color	= 'blue'; 
	$header_bgcolor = 'white';
	$header_style	= "color:$header_color; background-color:$header_bgcolor; font-weight:bold;";
	$footer_color	= "green"; 
	$footer_bgcolor = 'white';	
	$footer_style	= "color:$footer_color; background-color:$footer_bgcolor; font-weight:bold;";
	$menu_style		= 'background-color:black;';
	$menu_color		= 'black'; 
?>