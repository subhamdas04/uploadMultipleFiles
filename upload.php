<?php 
if($_FILES['file']['name'] !=""){
	$temp = explode(".", $_FILES['file']['name']);
	$ext = end($temp);
	$ran = rand(000000, 999999);
	$name = "file" . $ran . "." . $ext;
	$location = "./files/" . $name;
	move_uploaded_file($_FILES['file']['tmp_name'], $location);
	echo $name;
}




 ?>