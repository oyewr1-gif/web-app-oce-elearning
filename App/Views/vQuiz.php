<?php
//var_dump($data);
if($data['quizs']['error']) {
	echo $data['quizs']['error_msg'];
	exit;
}
$title = $data['title']['msg'][0];
$quizs = $data['quizs']['msg'];
//$opts = $data['opts']['msg'];
$title_id = $title['title_id'];
$titlekey = array_keys($title);
?>
<div class='nav'> 
	<a href='?class=<?=get_class($this)?>/batal'><button type='button'>Keluar</button></a>
	<a href='?class=<?=get_class($this)?>/toSpreadsheet/title_id/<?=$title_id?>'><button type='button' style='background-color: green;'>to Spreadsheet</button></a>
</div>
<div class='container'>
<h2>Title:</h2>
<div class='quiztitle'>
<form method='post' action='?class=<?=get_class($this)?>/simpanquiz'>
	<input type='hidden' name='table' value='quiz_title'>
	<?php
	foreach($title as $col=>$val) {
		//echo "$val.<br>";
		if($col==$titlekey[0])
			echo "<input type='hidden' name='$col' value='$val' />";
		else 
			echo "<input type='text' name='$col' value='$val' placeholder='$col' />";
	}
	?>
	<button type='submit'>Simpan</button>
</form>
</div>
<h2>Quiz:</h2>
<?php
$noquiz = 1;
foreach($quizs as $rows) {
	?>
	<div class='quiz'>
	<?=$noquiz?>.
	<form method='post' action='?class=<?=get_class($this)?>/simpanquiz'>
		<input type='hidden' name='table' value='quiz'>
		<input type='hidden' name='quiz_id' value='<?=$rows['quiz_id'] ?>' />
		<input type='hidden' name='title_id' value='<?=$title_id?>' />
		<input type='text' name='quiz_txt' value='<?=$rows['quiz_txt'] ?>' placeholder='input quiz text here ....' required  />
		<button type='submit'>Save</button>
	</form>
	<div class='quizopt'>
	<?php
	//var_dump($rows);
	$key = array_keys($rows)[0];
	$val = $rows[$key];
	//echo "$key = $val<br>";
	$opts = $this->model($this->Model)->getOpts($key, $val)['msg'];
	echo "<form method='post' action='?class=".get_class($this)."/simpanquiz'>";
	foreach($opts as $opt) {
		$ans = $this->model($this->Model)->getAns('quiz_id', $val)['msg'][0];
		if(isset($ans['ans_id'])) $ansid=$ans['ans_id']; else $ansid=0;
		//var_dump($ans);
		?>
		<input type='hidden' name='table' value='quiz_option'>
		<input type='hidden' name='opt_id' value='<?=$opt['opt_id']?>' />
		<input type='hidden' name='quiz_id' value='<?=$val ?>' />
		<input type='radio' name='ans_id' id='<?=$ansid?>' value='<?=$opt['opt_id']?>' 
		onclick='saveAns(<?=$ansid?>, <?=$val?>,<?=$opt['opt_id']?>, <?=$title_id?>)'
		<?php
		if($ans['ans']==$opt['opt_id']) echo "checked";
		?>
		/>
		<input type='text' id=<?=$opt['opt_id']?> name='opt_text' value='<?=$opt['opt_text'] ?>' 
		onchange='saveOpt(<?=$opt['opt_id']?>,<?=$rows['quiz_id'] ?>)' /> 
	<?php
	}
	?>
		<input type='hidden' name='table' value='quiz_option'>
		<input type='hidden' name='opt_id'  />
		<input type='hidden' name='quiz_id' value='<?=$val ?>' />
		<input type='text' name='opt_text' placeholder='input option text here ....' required />
		<button type='submit'>Add</button>
	</form>
	</div>
	</div>
	<?php
	$noquiz++;
}
?>
</div>
<div class='container'>
<div class='quiztitle'>
<h2>INPUT QUIZ</h2>
<form method='post' action='?class=<?=get_class($this)?>/simpanquiz'>
	<input type='hidden' name='table' value='quiz'>
	<input type='hidden' name='title_id' value='<?=$title_id?>' placeholder='title_id' />
	<input type='text' name='quiz_txt' placeholder='input quiz text here ....' required />
	<a href=''><button type='submit'>Add</button></a>
	
</form>
<!--<div class="controls">
	<button class="add1" onclick="add()"><i class="fa fa-plus"></i>Add</button>
	<button class="remove1" onclick="remove()"><i class="fa fa-minus"></i>Remove</button>
</div>-->
</div>
</div>
