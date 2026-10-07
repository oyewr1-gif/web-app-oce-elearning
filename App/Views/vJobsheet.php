<?php
	if($data['error']) {
		print_r($data);
		exit;
	}
	$table=$data['table'];
	$data=$data['msg'];
	
?>
<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
  <?php
	foreach($data as $item){
		echo "<li><a href='?class=cQuiz&data=".$item['link']."'>".$item['title']."</a></li>";
	}
  ?>
</ul> 