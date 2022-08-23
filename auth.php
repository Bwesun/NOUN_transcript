<?php
session_start();

include('header.php');

$_SESSION['role'] = 'User Role';

if($_SESSION['role']){
	echo "<script type='text/javascript'>
    alert('Access Granted!!!');
    window.open('https://www.transcriptapp.nou.edu.ng','_self')</script>";
}

?>
