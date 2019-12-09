<?php 
//https://www.php.net/manual/tr/function.mysqli-connect.php
require_once "../db.php";




if(!$_GET["User"]){
	if ($result = $link->query("SELECT * FROM user ")) {
		while ($row = mysqli_fetch_assoc($result)) {
	        echo '<a href="?User='.($row["User"]).'">'.$row[Host].' | '.$row[User].' ----> details</a><br>';
	    }
	    $result->close();
	}
}else {


	if(!$_POST){
		$User = mysqli_real_escape_string($link, $_GET['User']);
		if ($result = $link->query("SELECT * FROM user WHERE User = '$User'")) {
			while ($row = mysqli_fetch_assoc($result)) {
		        echo '<form action="" method="post"><a href="?User='.($row["User"]).'">'.$row[Host].' | '.$row[User].' ----> view passowrd --> </a><input name="view" type="hidden" value="'.base64_encode("veri|".$row[User]).'"><input type="submit" value="View"></form><br>';
		    }
		    $result->close();
		}
	}else {
		$View = base64_decode($_POST["view"]);
		$a = explode("|",$View);
		
		$b = trim($a[1]);
		
		if ($result = $link->query("SELECT * FROM user WHERE User = '$b'")) {
			while ($row = mysqli_fetch_assoc($result)) {
		        foreach($row as $x){
		        	echo $x."<br>";
		        }
		    }
		    $result->close();
		}

	}
echo '<a href="javascript:history.back()">Go Back</a>';
}
echo '';

mysqli_close($link);
?>