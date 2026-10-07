<?php
if($data['error'])
	echo $data['error_msg'];
else {
	//var_dump($data);
	$table=$data['table'];
	$data=$data['msg'];
	if (count($data) == count($data, COUNT_RECURSIVE)) 
		$headers = $data;
	else
		$headers = array_keys($data[0]);
	echo "
	<div class='container'>
	<a href='?class=".get_class($this)."&edit=ya&key=$headers[0]'><button>Tambah Data</button></a><br/>
	<div style='overflow-x: auto'>
	<table>";
	echo "<tr>";
	$k = $v = array();
	foreach($headers as $header){
		echo "<td>".strtoupper($header)."</td>";
	}
	echo "</tr><tr>";
	$indek=0;
	foreach($data as $rows){
		echo "<tr>";
		foreach($rows as $row=>$isi){
			echo "<td>".$isi."</td>";
			$k[]=$row;
			$v[$row]=$isi;
		}
		$key=$k[0];
		echo "<td><a href='?class=".get_class($this)."&edit=ya&key=$k[0]&value=$v[$key]&indek=$indek' class='crud2'>Edit</a>";
		echo "<a href='?class=".get_class($this)."&hapus=ya&key=$k[0]&value=$v[$key]' class='crud2'>Hapus</a>";
		echo "</tr>";
		$indek++;
	}
	echo "<table><div>
	</div>";
	if(!empty($_GET)) 
		if(isset($_GET["hapus"])){
		if($_GET["hapus"]=='ya'){
			//print_r($_GET);
			echo "<div class='popup'><br>";
			echo "Hapus ".$_GET['key']." = ".$_GET['value']." ?";
			echo "<br><br><a href='?class=".get_class($this)."&hapus=ok&key=".$_GET['key']."&value=".$_GET['value']."' class='crud2'>Hapus</a>";
			echo "<a href='?class=".get_class($this)."' class='crud2'>Batal</a>";
			echo "</div>";
			//header("location:?class=".get_class($this));
		}
		if($_GET["hapus"]=="ok"){
			//header("location:?class=".get_class($this));
			$resp = $this->model($this->Model)->del($_GET['key'], $_GET['value']);
			//print_r($resp);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
			
		}
		}
		
		if(isset($_GET["edit"])){
		if($_GET["edit"]=='ya'){
			//print_r($_GET);
			?>
			<div class='popup-form'><br>
				<form method='post' action='?class=<?=get_class($this)?>'>
					<?php
					foreach($headers as $header){
						if($header!=$_GET['key']) echo "<label for='$header'>".strtoupper($header)."</label>";
						echo "<input value='";
						if(isset($_GET['indek'])) echo $data[$_GET['indek']][$header];
						echo "' id='$header' name='$header' type=";
						if($header==$_GET['key']) echo "'hidden'"; else echo "'text'";
						echo "></input>";
					}
					//echo "<br><br><button type='submit' name='submit' class='btn btn-primary'><a href='?class=".get_class($this)."&edit=ok&key=".$_GET['key']."&value=".$_GET['value']."' class='crud2'>Simpan</a></button>";
					echo "<button type='submit' name='submit' value='submit'>Simpan</button>";
					echo "<a href='?class=".get_class($this)."'><button>Batal</button></a>";
					?>
					<!--<input type='submit' name='submit' value='Submit' class='btn btn-primary'/>
					<input type='cancel' name='submit' value='Cancel' class='btn btn-secondary'/>
					-->
				</form>
			<?php
			echo "</div>";
			//header("location:?class=".get_class($this));
		}
			
		}
		if(isset($_POST["submit"])){
			//header("location:?class=".get_class($this));
			//$resp = $this->model($this->Model)->del($_GET['key'], $_GET['value']);
			//print_r($resp);
			//if(!$resp['error'])
				//header("location:?class=".get_class($this));
			unset($_POST['submit']);
			print_r($_POST);
			$resp = $this->model($this->Model)->insert($table, $_POST);
			//print_r( $resp);
			//$resp = $this->model($this->Model)->del($_GET['key'], $_GET['value']);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
		}
}
//var_dump($data);
?>