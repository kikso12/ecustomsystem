<?php
include('connectdb.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO clients (nom, rccm, type_client, id_nat, nif, 
            regime, adresse, contact) VALUES (:nom, :rccm, :type_client, :id_nat, :nif, :regime, :adresse, :adresse)");
		$result = $statement->execute(
			array(
				':nom'	=>	$_POST["nom"],
				':rccm'	=>	$_POST["rccm"],
                ':type_client'	=>	$_POST["type_client"],
                ':id_nat'	=>	$_POST["id_nat"],
                ':nif'	=>	$_POST["nif"],
                ':regime'	=>	$_POST["regime"],
                ':adresse'	=>	$_POST["adresse"],
                ':contact'	=>	$_POST["contact"]
                
			)
		);
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE clients
			SET nom = :nom, rccm = :rccm, type_client = :type_client, id_nat = :id_nat, nif = :nif, regime = :regime, adresse = :adresse, contact = :contact WHERE id = :id");
		$result = $statement->execute(
			array(
				':nom'	=>	$_POST["nom"],
				':rccm'	=>	$_POST["rccm"],
                ':type_client'	=>	$_POST["type_client"],
                ':id_nat'	=>	$_POST["id_nat"],
                ':nif'	=>	$_POST["nif"],
                ':regime'	=>	$_POST["regime"],
                ':adresse'	=>	$_POST["adresse"],
                ':contact'	=>	$_POST["contact"],
				':id'			=>	$_POST["id"]
			)
		);
	}
}

?>