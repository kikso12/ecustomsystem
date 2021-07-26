<?php

function get_total_all_records()
{
	include('connectdb.php');
	$statement = $pdo->prepare("SELECT * FROM clients");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>