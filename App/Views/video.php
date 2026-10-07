<?php
	header('Content-Type: video/mp4');
	readfile($_GET['img']);
?>