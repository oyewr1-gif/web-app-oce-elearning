<?php
	$files = array_diff(scandir('public/documents/apersepsi'), array('.', '..'));
	//var_dump($files);
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
  <?php
	foreach($files as $item){
		$mime = mime_content_type("public/documents/apersepsi/$item");
		if(strstr($mime, "application/")){
			echo "<li><a href='?class=Ebook&data=public/documents/apersepsi/".$item."'>".$item."</a></li>";		
			//echo "<li><a href='https://docs.google.com/viewer?url=http://oce-media.s-net.id:888/elearning/public/documents/apersepsi/$item' target='_blank'>$item</a></li>";
		} else
			echo "<li><a href='?class=Ebook&data=public/documents/apersepsi/".$item."'>".$item."</a></li>";		
	}
	//echo "<iframe src='https://docs.google.com/viewer?url=http://oce-media.s-net.id:888/elearning/public/documents/apersepsi/Bagaimana%20Memulai%20Bisnis.ppt'></iframe>";
	//echo "<li><a href='?class=Ebook&data=https://docs.google.com/viewer?url=http://oce-media.s-net.id:888/elearning/public/documents/apersepsi/Bagaimana%20Memulai%20Bisnis.ppt&embedded=true'>Bagaimana Memulai Bisnis</a></li>";
	echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/E2t9npEYWC8' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
	echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/0eBjex_a3vM' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
	echo "<iframe width='756' height='478' src='https://www.youtube.com/embed/rkN19lD6rnM' title='ILUSTRASI PROSES BISNIS' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
	//echo "<iframe src='https://docs.google.com/forms/d/e/1FAIpQLSfAQB8lZqQ9jUybDzZaWEGa6dUddncwDfZ7VrdC3TJmSaRx_w/viewform?embedded=true' width='800' height='640' frameborder='0' marginheight='0' marginwidth='0'>Loadingz/iframe>";
	
  ?>
</ul> 