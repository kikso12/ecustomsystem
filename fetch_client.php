<?php
include('connectdb.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM clients ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nom LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nif LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id ASC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	
	$sub_array[] = $row["id"];
	$sub_array[] = $row["nom"];
	$sub_array[] = $row["nif"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-round btn-sm update"><span class="fa fa-edit"></button></button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-round btn-sm delete"><span class="fa fa-trash"></button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>