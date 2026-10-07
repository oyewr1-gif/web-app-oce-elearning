<?php
//var_dump($data);
if($data['error']) {
	print_r($data);
	exit;
}
$data = $data['msg'];
$header = array_keys($data);
echo "<table style='width: auto;'><tr>";
foreach($data as $rows) {
	echo "<tr>";
	foreach($rows as $col=>$val) {
		echo "<td>$val</td>";
	}
	echo "</tr>";
}
echo "</table></tr>";

?>