<?php 
$sql = "SELECT * FROM users";

$statement = $connection->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();


?>