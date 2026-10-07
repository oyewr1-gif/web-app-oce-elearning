<?php
//var_dump($data);
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
//var_dump($data);
?>
	<div style='overflow-x: auto'>
	<input type='text' id='myInput' onkeyup='myListTable(2)' placeholder='Search for quiz title..'>
	<ul id="myUL">
	<table id='idTable'>
		<?php
		echo "<tr>";
		foreach($headers as $title ) {
			echo "<th>".strtoupper($title)."</th>";
		}
		echo "</tr>";
		if (count($data) < count($data, COUNT_RECURSIVE)) 
		foreach($data as $row){
			echo "<li><tr>";
			foreach($row  as $col=>$val) {
				if(strcmp($col,$headers[1]))
					echo "<td>$val</td>";
				else {
					echo "<td><a href=?class=".get_class($this)."/showQuiz/".$headers[0]."/".$row[$headers[0]].">$val</a></td>";
				}
			}
			echo "</tr></li>";
		}
		?>
	</table>
	</ul>
	</div>
<?php 
if(!empty($_GET)) {
	
} 
	
?>