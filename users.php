<?php

/*
	Name: Simple API Example
	Author: Rudra Sarkar
	Email: rudrasarkar815@gmail.com
	twitter: @rudr4_sarkar
*/


// Content Type: JSON
header("Content-Type: application/json");

// How-To-Use: http://localhost/api/users/1

// Database Connection
$con = mysqli_connect("localhost", "root", "", "simple_api_example_sql") or die("Error " . mysqli_error($con));

// mysqli fix ;)
function mysql_fix_string($con, $string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
		return $con->real_escape_string($string);
}

// ID parameter
@$id = mysql_fix_string($con, $_GET['id']);

// SQL Query
$query = mysqli_query($con, "SELECT * FROM users WHERE id='" . @$id . "'");
$exec = mysqli_fetch_array($query);

// json_encode: Array To JSON
	echo json_encode(array(
		"ID"       => $exec['id'] ,
		"Name"     => $exec['name'],
		"Email"    => $exec['email'],
		"Country"  => $exec['country']
	));

?>