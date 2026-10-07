<?php
	$files = array_diff(scandir('public/documents/jobsheet'), array('.', '..'));
	//var_dump($files);
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
  <?php
	foreach($files as $item){
		echo "<li><a href='?class=Ebook&data=public/documents/jobsheet/".$item."'>".$item."</a></li>";
		//https://docs.google.com/forms/d/e/1FAIpQLScOxCXNWSDj7WQQYeVln6h7Do1-m7T-XfP0rQrT-kNqw9KbYA/viewform?usp=sf_link		
	}
	//echo "<iframe src='https://docs.google.com/forms/d/e/1FAIpQLScOxCXNWSDj7WQQYeVln6h7Do1-m7T-XfP0rQrT-kNqw9KbYA/viewform?embedded=true' width='640' height='761' frameborder='0' marginheight='0' marginwidth='0'>Loading…</iframe>";
  ?>
</ul> 