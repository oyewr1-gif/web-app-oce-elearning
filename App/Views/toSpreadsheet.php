<?php
if(!$data['title']['error']) {
	$title = $data['title']['msg'];	
} else {
	$title = $data['title']['error_msg'];
	exit;
}
if(!$data['quizs']['error']) {
	$quizs = $data['quizs']['msg'];	
} else {
	$quizs = $data['quizs']['error_msg'];
	exit;
}
//var_dump($title);
//echo "<br>";
//var_dump($data['quizs']);
$headers = array_keys($quizs[0]);
?>
<div class='nav'> 
	<a href='?class=<?=get_class($this)?>/batal'><button type='button'>Keluar</button></a>
	<a><button type='button' style='background-color: green;' onclick='toSpreadsheet();'>Export</button></a>
</div>
<table id="idTable" class="table2excel" border="0" cellspacing="0" cellpadding="5">
	<thead>
        <?php
		foreach($title[0] as $col=>$val) 
		echo "<tr><th colspan='3'>$val.</th></tr>";
		?>
		<tr>
          <th>NO.</th><th></th><th>Soal</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$no=1;
		foreach($quizs as $rows) {
			echo "<tr>";
			echo "<td>$no.</td><td></td><td>".$rows['quiz_txt']."</td>";
			/*foreach($rows as $col=>$val) {
				echo "<td>$val</td>";
			}*/
			echo "</tr>";
			$key = array_keys($rows)[0];
			$val = $rows[$key];
			$opts = $this->model($this->Model)->getOpts($key, $val)['msg'];
			$headers2 = array_keys($opts[0]);
			//foreach($headers2 as $col2=>$val2) echo "<th>$val2</th>";
			$abc = 'A';
			foreach($opts as $rowsOpt) {
				echo "<tr>";
				echo "<td></td><td>$abc.</td><td>".$rowsOpt['opt_text']."</td>";
				/*foreach($rowsOpt as $col2=>$val2) {
					echo "<td>$val2</td>";
				}*/
				echo "</tr>";
				$abc = chr(ord($abc)+1);
			}
			$no++;
		}
		?>
    </tbody>
</table>