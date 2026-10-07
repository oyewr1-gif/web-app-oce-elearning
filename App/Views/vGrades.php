<?php
//var_dump($data);
//echo "<br>";
$answer = $data['answer'];
$ans = $data['ans'];
$title = $data['title'];
//var_dump($answer);
echo "<br>";
//var_dump($ans);
//var_dump($data['title']);
echo "<div class='nav'>";
if(isset($data['grades'])) 
	echo "<div class='add'>Score: ".count($data['grades'])." of ".count($ans)."</div>";
echo "<div class='nav'><a href='?class=".get_class($this)."'><button type='button'>Keluar</button></a></div>";
echo "<a><button type='button' style='background-color: green;' onclick='toSpreadsheet();'>to Spreadsheet</button></a>";
echo "<div class='nav'><a href='?class=".get_class($this)."/showRekap/".$title['title_id']."'><button type='button' style='background-color: green;'>Rekap Nilai</button></a></div>";
echo "<input type='text' id='myInput' onkeyup='myListTable(2)' placeholder='Search for nama..'>";
echo "</div>";
echo "<table id='idTable'>";
foreach($title as $col=>$val) 
	echo "<tr><th colspan='8'>$val.</th></tr>";
if(isset($data['grades'])) 
	echo "<tr><th colspan='8'>Score: ".count($data['grades'])." of ".count($ans)."</th></tr>";
foreach($answer[0] as $row=>$val)
	echo "<th>".strtoupper($row)."</th>";
echo "<th>Correct</th>";
foreach($answer as $rows) {
	echo "<tr>";
	if(isset($rows['quiz_id']))
	foreach($rows as $col=>$val) {
		if($col=='user_id') {
			echo "<td><a href='?class=".get_class($this)."/showAnswer/".$rows['title_id']."/$val'> $val</a></td>";
			//echo "<td>".$data['user'][$val]."</td>";
		} else
			if($col=='ans') {
				if(isset($data['key']))
					if($val != $data['key'][$rows['quiz_id']])
						echo "<td style='background-color: red'>$val</td>";
					else
						echo "<td>$val</td>";
				else 
					echo "<td>$val</td>";
			} else
				echo "<td>$val</td>";
	}
	if(isset($rows['quiz_id']))
		if(isset($data['key'])) echo "<td>".$data['key'][$rows['quiz_id']]."</td>";
	echo "</tr>";
}
echo "</table>";
echo "<div class='add'>Keys:</div>";
echo "<table>";
foreach($ans[0] as $row=>$val)
	echo "<th>".strtoupper($row)."</th>";
foreach($ans as $rows) {
	echo "<tr>";
	foreach($rows as $col=>$val) {
		echo "<td>$val</td>";
	}
	echo "</tr>";
}
echo "</table>";

?>