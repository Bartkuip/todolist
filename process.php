<?php

session_start();

$id = 0;
$update = false;
$name = '';

// inloggen op phpmyadmin, localhost, naam, login, database naam
$mysqli = new mysqli('localhost', 'root', 'admin', 'crud') or die(mysqli_error($mysqli));


if (isset($_POST['open'])){

}

 if (isset($_POST['save'])){
	$name = $_POST['name'];



	$mysqli->query("INSERT INTO data (name) VALUES('$name')") or
			die($mysqli->error);


	$_SESSION['message'] = "Opgeslagen!";
	$_SESSION['msg_type'] = "success";

	header('Location:index.php');
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error());

	$_SESSION['message'] = "Verwijderd!";
	$_SESSION['msg_type'] = "danger";
	header('Location:index.php');
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die ($mysqli->error());
	if (count($result)==1){
		$row = $result->fetch_array();
		$name = $row['name'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];

	$mysqli->query("UPDATE data SET name='$name' WHERE id=$id") or 
			 die($mysqli->error);

	$_SESSION['message'] = "Geupdate!";
	$_SESSION['msg_type'] = "warning";

	header('Location:index.php');
}

?>