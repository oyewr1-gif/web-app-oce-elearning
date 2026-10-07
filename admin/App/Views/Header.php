<?php
session_name('elearning_session');
ob_start();
session_start();	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<Title>Oce-Media Pembelajaran</Title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<!--Material Icons --> 
		<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />  -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- menu CSS --> 
		<!--
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-colors.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-rtl.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-icons.min.css">
		-->
		<link href="../public/css/login.css" rel="stylesheet">
		<link href="../public/css/login-modal.css" rel="stylesheet">
		<link href="../public/css/dropdown.css" rel="stylesheet">
		<link href="../public/css/contents.css" rel="stylesheet">
		<link href="../public/css/table.css" rel="stylesheet">
		
	</head>
	<body>
		<?php
		if(isset($_SESSION['admin'])){?>
		<header class='container-fluid'>
		<div class="topnav" id="myTopnav">
			<a class="dropdown" href="../admin" >
			<div class="logo-image">
				<img src="../public/image/logo-transp-navbar.png" class="img-responsive">
			</div>
			</a>
			<div class="dropdown">
				<button class="dropbtn">Menu
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=adminMenu">CRUD</a>
					<a href="?class=Videos">Videos</a>
				</div>
			</div> 
			<div class="dropdown">
				<button class="dropbtn">Contents
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=adminContent">CRUD</a>
					<a href="?class=Videos">Videos</a>
				</div>
			</div> 
			<div class="dropdown">
				<button class="dropbtn">Users
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=adminUser">CRUD</a>
					<a href="?class=Videos">Videos</a>
				</div>
			</div> 
			<div class='login-container'>
				<form>
					<a href='?class=cLogout'><button type="button" class="cancelbtn">Logout</button></a>
				</form>
			</div>
			<a href="javascript:void(0);" class="icon"onclick="myFunction()">&#9776;</a>
		</div>
		</header>
		<?php } ?>
		