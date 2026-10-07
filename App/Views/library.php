<input type="text" id="myInput" onkeyup="myList()" placeholder="Search for book..">
<ul id="myUL">
<?php
	$files = array_diff(scandir('public/documents/ebook/'), array('.', '..'));
	//var_dump($files);
	if(!$data['error']) {
		$table=$data['table'];
		$data = $data['msg'];
		foreach($data as $item){
			//echo "<li><a href='video.php?img=".$item['link']."'>".$item['title']."</a></li>";
			echo "<iframe width='560' height='315' src='".$item['link']."' title".$item['title']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
		}
	}
?>
<?php
	
	foreach($files as $item){
		echo "<li><a href='?class=Ebook&data=public/documents/ebook/".$item."'>".$item."</a></li>";
	}
  ?>
</ul> 