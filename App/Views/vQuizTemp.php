<?php
//print_r($data);
//echo  $data["table"];
if($data['error']) {
	echo $data['error_msg'];
	exit;
}
$table = $data["table"];
$data = $data["msg"];
if (count($data) == count($data, COUNT_RECURSIVE)) 
	$headers = $data;
else
	$headers = array_keys($data[0]);
?>
<div class="container">
	<div class='ctitle'><?=strtoupper($table)?></div>
	<?php
	if (count($data) < count($data, COUNT_RECURSIVE)) 
	foreach($data as $row){
		foreach($row as $col=>$val){
			echo $col.": ".$val."<br>";
		}
		echo "<br>";
		$option = $this->model($this->Model)->getOpt();
		$optTable = $option['table'];
		$option = $option['msg'];
		print_r($option);
		echo "<ul>";
		if (count($option) < count($option, COUNT_RECURSIVE)) 
		foreach($option as $opt) {
			echo "<li>";
			foreach($opt as $col=>$val) {
				echo $val;
			}
			echo "</li>";
		}
		echo "</ul>";
	} //else {
		?>
		<form id='input' method='post' action='?class=<?=get_class($this)?>/simpan' enctype='multipart/form-data'> <!-- ?class=<=get_class($this)?> -->
			<input type='hidden' name='table' value='<?=$table?>'></input>
			<?php
			foreach($headers as $header){
				//if($header!=$_GET['key']) 
				echo "<label for='$header'>".strtoupper($header)."</label>";
				echo "<input value='";
				//if(isset($_GET['indek'])) echo $data[$_GET['indek']][$header];
				echo "' id='$header' name='$header' type=";
				//if($header==$_GET['key']) echo "'hidden'"; else 
				echo "'text'";
				echo "></input>";
			}
			?>
			<a href='Submit' class='formbutton'><button type='submit'>Simpan</button></a>
			<a href='?class=<?=get_class($this)?>/batal' class='formbutton'><button type='button'>Batal</button></a>					
		</form>
		<?php
		$opt = array_keys($option);
		foreach($opt as $title) {
			echo "<input  type='text' name='$title'>";
		}
	//}
	?>
</div>