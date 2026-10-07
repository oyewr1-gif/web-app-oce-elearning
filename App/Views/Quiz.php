<?php
//var_dump($data);
if($data['quizs']['error']) {
	echo $data['quizs']['error_msg'];
	exit;
}
$userid = $data['userid'];
$title = $data['title']['msg'][0];
$quizs = $data['quizs']['msg'];
//$opts = $data['opts']['msg'];
$title_id = $title['title_id'];
$titlekey = array_keys($title);
?>
<div class='nav'> 
	<a href='?class=<?=get_class($this)?>/batal'><button type='button'>Keluar</button></a>
</div>
<h2>Title:</h2>
<div class='quiztitle'>
<ul id='myUL'>
	<?php
	foreach($title as $col=>$val) {
		echo "<li>".strtoupper($col).": $val</li>";
	}
	?>
</ul>
</div>
<h2>Quiz:</h2>
<?php
$noquiz = 1;
foreach($quizs as $rows) {
	$quizid = $rows['quiz_id'];
	//var_dump($rows);
	$key = array_keys($rows)[0];
	$val = $rows[$key];
	//echo "$key = $val<br>";
	$opts = $this->model($this->Model)->getOpts($key, $val)['msg'];
	$jawab = $this->model($this->Model)->query('quiz_answer', "quiz_id='".$rows['quiz_id']."' and user_id='$userid'")['msg'][0];
	if(isset($jawab['ans'])) $ansid=$jawab['ans_id']; else $ansid=0;
	?>
	<div class='quiz'>
	<?=$noquiz?>.
	<label for=<?=$quizid ?>'><?=$rows['quiz_txt'] ?>'</label>
	<div class='quizopt'>
	<ul id="myUL">
	<?php
	$idx = 1;
	foreach($opts as $opt) {
		$optid = $opt['opt_id'];
		echo "<li><label><input type='radio' "; 
		if($optid==$jawab['ans']) echo " checked "; 
		echo " onclick='saveAnswer($ansid,$quizid,$userid,$optid,$title_id)' ";
		//echo " onclick='pesan()' ";
		//echo " onclick='alert(\"ans=\"+$ansid+\", quiz= \"+$quizid+\", opt=\"+".$opt['opt_id']."+\", user= \"+$userid)' ";
		echo " id='$quizid' ";
		echo " name='$quizid' ";
		echo " value='".$opt['opt_text']."'>";
		echo $opt['opt_text'];
		echo "</input></label></li>";
		$idx++;
	}
	?>
	<label id='postid' value='no saved'>Jawab: <?= $jawab['ans'] ?></label>
	</ul>
	</div>
	</div>
	<?php
	$noquiz++;
}
?>

