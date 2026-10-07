<div class='container'>
<?php
	if(!$data["error"]){
		if(isset($data["msg"])){
			//print_r($data['msg']);
			$data = $data['msg'];
			$headers = array_keys($data[0]);
			?>
			<form method='post' action='?class=<?=get_class($this)?>' class='form-data'>
				<?php
				foreach($headers as $header){
					echo "<label for='$header'>".strtoupper($header)."</label>";
					echo "<input value='".$data[$_GET['indek']][$header]."' id='$header' name='$header' type='text'></input>";
				}
				?>
				<input type='submit' name='submit' value='Submit' class='btn btn-secondary'/>
				<input type='cancel' name='submit' value='Cancel' class='btn btn-primary'/>
			</form>
			<?php
			//echo "<br><br><a href='?class=".get_class($this)."&edit=ok&key=".$_GET['key']."&value=".$_GET['value']."' class='crud2'>Simpan</a>";
			//echo "<a href='?class=".get_class($this)."' class='crud2'>Batal</a>";
			//header("location:?class=".get_class($this));
		}
			
	}
?>
</div>