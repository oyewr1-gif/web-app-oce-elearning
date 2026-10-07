<?php
session_name('elearning_session');
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
	var
	<header class='container-fluid'>
		<div class="topnav" id="myTopnav">
			<a class="dropdown" href="../admin" >
			<div class="logo-image">
				<img src="public/image/logo-transp-navbar.png" class="img-responsive">
			</div>
			</a>
			<?php
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
				<?php if(isset($_SESSION['username'])){ ?><
					<form method='get' action='?class=logout'>
						<?= $_SESSION('username')?>
						<button value='Logout'></button>
					</form>
				<?php } else { ?>
					<form method='post' action='?class=login'>
						<input class='input' type='text' name='username' placeholder='username'></input>
						<input class='input' type='password' name='password' placeholder='password'></input>
						<button type='submit'>Login</button>
					</form>
						
					<?php } ?>
			</div>
			<a href="javascript:void(0);" class="icon"onclick="myFunction()">&#9776;</a> 		
		</div>
	</header>
	
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
