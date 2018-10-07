<?php
# Step 1 : Gunakan function ni untuk track web session bagi seseorang visitor.
session_start();

# Step 2 : Declare file yg mengandungi PHP variables untuk configuration files.
$config_file = 'config.php';

# Step 3 : Cek sama ada file config tu wujud atau tak.
if(file_exists($config_file)) # Jika file berkenaan wujud, buat benda dalam kurungan { } ni.
{
	include $config_file;
	$mysqli_connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password); # Connect ke MySQL server menggunakan PHP variables dalam configuration files.
	
	if($mysqli_connect) # Kalau boleh connect, teruskan buat benda kat bawah ni.
	$mysqli_select_db = mysqli_select_db($mysqli_connect, $mysql_db_name); # Select DB yg nak digunakan.
	else
	die('Unable to use DB '.$mysql_db_name); # Kalau tak boleh connect, display error message kat browser.
}
else # Kalau tak wujud, buat benda kat bawah ni.
die('File '.$config_file.' does not existed.'); # Display error message kat browser.
?>
