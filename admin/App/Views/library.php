<?php
	$files = array_diff(scandir('public/documents/ebook/'), array('.', '..'));
	//var_dump($files);
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
  <?php
	foreach($files as $item){
		echo "<li><a href='?class=Ebook&data=public/documents/ebook/".$item."'>".$item."</a></li>";
	}
  ?>
</ul> 