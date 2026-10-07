<?php
	$files = array_diff(scandir('public/documents/video/'), array('.', '..'));
	//var_dump($files);
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for videos..">
<ul id="myUL">
  <?php
	foreach($files as $item){
		echo "<li><a href='?class=Ebook&data=public/documents/video/".$item."'>".$item."</a></li>";
		//echo "<video width='320' height='240' controls>";
		//	echo "<li><source src='/mnt/sda3/MULTIMEDIA/Video/TIK/".$item."' type='video/mp4'></li>";
		//echo "</video>";
	}
	//echo "<video width='320px' height='240px' controls muted>";
	//	echo "<li><source src='/elearning/public/videos/".$item."' type='video/mp4'></li>";
	//	echo "Browser anda tIdak mendukung video";
	//echo "</video>";
	//echo "<br>".$item."<br>";
	
	echo "<br>";
	echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/cmTmXSoOST4' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
	//echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/QCBWhRGQTuk' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
	//echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/u0nLmgN1n4w' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
  ?>
</ul> 