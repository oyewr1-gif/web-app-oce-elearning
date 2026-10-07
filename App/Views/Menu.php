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
		<link rel='icon' href='public/image/oce-media Rev2.png'>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<!--Material Icons --> 
		<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />  
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		-->
		<!-- menu CSS --> 
		<!--
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-colors.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-rtl.min.css">
		<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-icons.min.css">
		<link href="public/css/font-awesome.min.css" rel="stylesheet">
		<script src="App/js/jquery.min.js"></script>
		-->
		<link href="public/css/login-modal.css" rel="stylesheet">
		<link href="public/css/login.css" rel="stylesheet">
		<link href="public/css/table.css" rel="stylesheet">
		<link href="public/css/dropdown.css" rel="stylesheet">
		<link href="public/css/contents.css" rel="stylesheet">
		<link href="public/css/font-awesome.min.css" rel="stylesheet">
	</head>
<body>
	<header class='container-fluid'>
		<div class="topnav" id="myTopnav">
			<a class="dropdown" href=<?=ROOT_DIR?> >
			<div class="logo-image">
				<img src="public/image/logo-transp-navbar.png" class="img-responsive">
			</div>
			</a>
			<?php
			//print_r($data);
			if(isset($data))
			if(!$data['error']){
			$menu = $data['msg'];
			foreach($menu as $item){ 
				echo "<div class='dropdown'>";
					//echo "<a href='".$item['link_menu']."'>".$item['text_menu']."<a>";
					if($item['parent_id']=='0'){
						$parent = $item['id_menu'];
						echo "<button class='dropbtn'>".$item['text_menu']." 
							<i class='fa fa-caret-down'></i>
							</button>";
					} 
			?>
					<div class="dropdown-content">
						<?php
						foreach($menu as $item){
							if($item['parent_id']==$parent){
								//echo $parent."<br>";
								//if($parent=='2'){
								echo "<a href='?class=".$item['link_menu']."'>".$item['text_menu']."</a>";
							}
						} 
						//<a href="?class=Library">E-Book</a>
						//<a href="?class=Videos">Videos</a>
						?>
					</div>
				</div>
				<?php 
			}
				?>
				<div class='login-container'>
				<?php if(isset($_SESSION['username'])){ ?>
					<form method='post' action='?class=cLogin'>
						<?= $_SESSION['username']?>
						<button value='Logout'class='button'>Logout</button>
					</form>
				<?php } else { ?>
					<form method='post' action='?class=cLogin'>
						<input class='input' type='text' name='uname' placeholder='username'></input>
						<input class='input' type='password' name='pwd' placeholder='password'></input>
						<button type='submit' class='button'>Login</button>
					</form>
				<?php 
				} ?>
				</div>
				<?php
			}
			?>
			<a href="javascript:void(0);" class="icon"onclick="myFunction()">&#9776;</a> 		
		</div>
	</header>
	<div class='container'>
<?php
	/*
	var_dump($menu);
	echo "<nav id='menu'>";
	$menu = $data['msg'];
	foreach($menu as $item){
		echo "<a href='".$item['link_menu']."'>".$item['text_menu']."<a>";
	}
	echo "</nav>";
	*/
?>
