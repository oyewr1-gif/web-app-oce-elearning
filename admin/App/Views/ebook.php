<div class="container" style='margin-top:20px;'>
	<!--
	<embed class="ebook" type="application/pdf" src="public/documents/Prinsip Dasar Sistem WLAN.pdf"></embed>
	<object class="ebook" data="public/documents/<?=$data?>"></object>
	-->
	<?php
		$data = $_GET["data"];
		//echo $data."<br>";
		if(file_exists($data)) {
			$mime = mime_content_type($data);
			if(strstr($mime, "video/")){
				// this code for video
				//echo $data."<br> - ".$mime."<br>";
				echo "<video width='320px' height='240px' controls>";
					echo "<source src='".$data."' type='video/mp4'>";
					echo "Browser anda tIdak mendukung video";
				echo "</video>";
			}else if(strstr($mime, "image/")){
				// this code for image
			}else 
			echo "<iframe class='ebook' src='".$data."'></iframe>";
		}
		
	?>
	
	
</div>