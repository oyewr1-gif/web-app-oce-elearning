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
		<link href="public/css/dropdown.css" rel="stylesheet">
		<link href="public/css/contents.css" rel="stylesheet">
		
	</head>
	<body>
		<header class='container-fluid'>
		<div class="topnav" id="myTopnav">
			<a class="dropdown" href="/elearning" >
			<div class="logo-image">
				<img src="public/image/logo-transp-navbar.png" class="img-responsive">
			</div>
			</a>
			<div class="dropdown">
				<button class="dropbtn">Library
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=Library">E-Book</a>
					<a href="?class=Videos">Videos</a>
				</div>
			</div> 
			<div class="dropdown">
				<button class="dropbtn">Teacher
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=Announcement">Announcement</a>
					<a href="?class=Evaluation">Evaluation</a>
				</div>
			</div> 
			<div class="dropdown">
				<button class="dropbtn">Student
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="?class=Library">Module</a>
					<a href="?class=Jobsheet">Job Sheet</a>
					<a href="?class=Quiz">Quiz</a>
				</div>
			</div> 
			<a href="#about">About</a>
			<div class='login-container'>
				<?php if(isset($_SESSION['username'])){ ?><
					<form method='get' action='?class=logout'>
						<?= $_SESSION('username')?>
						<button value='Logout'></button>
					</form>
				<?php } else { ?>
					<form method='post' action='?class=cLogin'>
						<input class='input' type='text' name='username' placeholder='username'></input>
						<input class='input' type='password' name='password' placeholder='password'></input>
						<button type='submit'>Logout</button>
					</form>
						
					<?php } ?>
			</div>
			<a href="javascript:void(0);" class="icon"onclick="myFunction()">&#9776;</a>
		</div>
		</header>
		
		
		