<?php
	//var_dump($data);
	if($data['error']) {
		print_r($data);
		exit;
	}
	if(isset($_GET['doc2']))
		$doc = $_GET['doc2'];
	if(isset($_GET['link2']))
		$link2 = $_GET['link2'];
	$table=$data['table'];
	$category=$data['category'];
	$data=$data['msg'];
	echo "<div class='title'>$category</div>";
	if(!empty($doc)) {
		$doc = "public/documents/$category/$doc";
		if(file_exists($doc)) {
			$mime = mime_content_type($doc);
			if(strstr($mime, "video/")){
				// this code for video
				//echo $doc."<br> - ".$mime."<br>";
				echo "<video width='640px' height='400px' controls>";
				echo "<source src='".$doc."' type='video/mp4'>";
				echo "Browser anda tIdak mendukung video";
				echo "</video>";
				echo "<br>".basename($doc);
			}else 
				if(strstr($mime, "image/")){
					// this code for image
					echo "<img src='$doc'>";
					echo "<br>".basename($doc);
				} else {
					//Open offline document file
					echo "<br>".basename($doc);
					echo "<iframe class='ebook' src='".$doc."'></iframe>";
					
				}
		} else echo "File '$doc' doesn't exist";
	} else 
		if(!empty($link2)) {
			//Open online document link 
			echo "<iframe class='link' src='$link2' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen>Loadingż</iframe>";
		} else {
	$files = array_diff(scandir("public/documents/$category"), array('.', '..'));
	//var_dump($files);
	echo "<input type='text' id='myInput' onkeyup='myList()' placeholder='Search for book..'>";
	echo '<ul id="myUL">';
	foreach($data as $item){
		echo "<li><a href='?class=".get_class($this)."/$category&link2=".$item['link']."'>".$item['title']."</a></li>";
	}
	foreach($files as $item){
		echo "<li><a href='?class=".get_class($this)."/$category&doc2=$item'>$item</a></li>";
	}
echo "</ul>"; 
	}
?>