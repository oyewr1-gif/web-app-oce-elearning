<?php
	$files = array_diff(scandir('public/documents/evaluation'), array('.', '..'));
	//var_dump($files);
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
  <?php
	foreach($files as $item){
		echo "<li><a href='?class=Ebook&data=public/documents/evaluation/".$item."'>".$item."</a></li>";
	}
	echo "<iframe src='https://docs.google.com/forms/d/e/1FAIpQLSfAQB8lZqQ9jUybDzZaWEGa6dUddncwDfZ7VrdC3TJmSaRx_w/viewform?embedded=true' width='800' height='640' frameborder='0' marginheight='0' marginwidth='0'>Loadingz/iframe>";
	
  ?>
</ul> 