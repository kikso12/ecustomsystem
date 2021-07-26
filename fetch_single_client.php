<?php
include('connectdb.php');
include('function.php');
if(isset($_POST["id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM clients WHERE id = '".$_POST["id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id"] = $row["id"];
		$output["nom"] = $row["nom"];
		$output["rccm"] = $row["rccm"];
        $output["type_client"] = $row["type_client"];
        $output["id_nat"] = $row["id_nat"];
        $output["nif"] = $row["nif"];
        $output["regime"] = $row["regime"];
        $output["adresse"] = $row["adresse"];
        $output["contact"] = $row["contact"];
	}
	echo json_encode($output);
}
?>
