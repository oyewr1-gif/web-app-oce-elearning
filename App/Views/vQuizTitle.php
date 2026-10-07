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
//var_dump($_GET);
?>
<div class='title'><?=get_class($this)?></div>
	<a href='?class=<?=get_class($this)?>&edit=ya&key=<?=$headers[0]?>'><button>Tambah Data</button></a><br/>
	<div style='overflow-x: auto'>
	<input type='text' id='myInput' onkeyup='myListTable(1)' placeholder='Search for quiz title..'>
	<table id='idTable'>
		<?php
		echo "<tr>";
		foreach($headers as $title ) {
			echo "<th>".strtoupper($title)."</th>";
		}
		echo "<th>Action</th>";
		echo "</tr>";
		if (count($data) < count($data, COUNT_RECURSIVE)) 
		foreach($data as $row){
			echo "<tr>";
			foreach($row  as $col=>$val) {
				if(strcmp($col,$headers[1]))
					echo "<td>$val</td>";
				else 
					echo "<td><a href=?class=".get_class($this)."/showQuiz/".$headers[0]."/".$row[$headers[0]].">$val</a></td>";
			}
			echo "<td><a href='?class=".get_class($this)."&hapus=ya&key=$headers[0]&value=".$row[$headers[0]]."' class='crud2'>Hapus</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	</div>
<?php
if(!empty($_GET)) {
	if(isset($_GET["hapus"])){
		if($_GET["hapus"]=='ya'){
			//print_r($_GET);
			echo "<div class='popup' id='id01'><br>";
			echo "Hapus ".$_GET['key']." = ".$_GET['value']." ?";
			//echo "<br><br><a href='?class=".get_class($this)."&hapus=ok&key=".$_GET['key']."&value=".$_GET['value']."' class='crud2'>Hapus</a>";
			echo "<br><br><a href='?class=".get_class($this)."/hapus/$table/".$_GET['key']."/".$_GET['value']."' class='crud2'>Hapus</a>";
			echo "<a href='?class=".get_class($this)."' class='crud2'>Batal</a>";
			echo "</div>";
			//header("location:?class=".get_class($this));
		}
	}
	if(isset($_GET["edit"])) {
		if($_GET["edit"]=='ya') {
			?>
			<div class='popup-form' id='id01'>
				<?php //var_dump($_GET); ?>
				<form id='input' method='post' action='?class=<?=get_class($this)?>/simpan'>
					<input type='hidden' name='table' value='<?=$table?>'>
					<?php
					foreach($headers as $header) {
						if($header!=$_GET['key']) {
							echo "<label for='$header'>".strtoupper($header)."</label>";
							echo "<input name='$header' type='text' />";
						} else 
							echo "<input name='$header' type='hidden' />";
					}
				?>
					<button type='submit'>Simpan</button>
					<a href='?class=<?=get_class($this)?>'><button type='button'>Batal</button></a>
				</form>
			</div>
			<?php
		}
	}
}
?>

