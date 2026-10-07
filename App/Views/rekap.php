<div class='nav'>
	<a href='?class=<?=get_class($this)?>/batal'><button type='button'>Keluar</button></a>
	<a><button type='button' style='background-color: green;' onclick='toSpreadsheet();'>Export</button></a>
</div>
<table border='1' id="idTable" class="table2excel" >
<?php
echo "<tr>";
echo "<th style='text-align:center;' rowspan='3'>NAMA</th><th style='text-align:center;' colspan='".(count($data['answer'][0])-1)."'>QUIZ ID</th>";
echo "<th rowspan='3'>SCORE</th>"; 
echo "</tr>";
echo "<tr>";
foreach($data['ans'] as $col=>$val) 
	echo "<th  style='text-align:center;'>".$col."</th>"; 
echo "</tr>";
echo "<tr>";
foreach($data['ans'] as $col=>$val) 
	echo "<th>".$val."</th>"; 
echo "</tr>";
foreach($data['answer'] as $rows) {
	echo "<tr>";
	foreach($rows as $col=>$val) {
		if(($val==$data['ans'][$col]) || ($col=='NAMA'))
			echo "<td>$val</td>";
		else
			echo "<td style='background-color: red'>$val</td>";
	}
	for($i=0; $i<=count($data['ans'])-count($data['grades'][$rows['NAMA']])-1; $i++) 
		echo "<td></td>";
	echo "<td>". count(array_intersect($data['grades'][$rows['NAMA']],$data['ans']))."</td>";
	echo "</tr>";
}
//var_dump($data['answer']);
?>
</table>