<?php
// Database connexion info
$dbdetails =  $arrayName = array(
    'host' => "localhost",
    'user' => "root",
    'pass' => "",
    'db' => "ecustomsquote123",



);

// DB table to use
$table = 'douaneitems';

// Table's primary Key
$primaryKey = 'id';


$columns = array(
    array('db' => 'section_designation', 'dt' => 0),
    array('db' => 'chapitre_designation', 'dt' => 1),
    array('db' => 'designation_majeur', 'dt' => 2),
    array('db' => 'designation_mineur', 'dt' => 3),
    array('db' => 'droit_douane', 'dt' => 4),
    array('db' => 'tva_dc', 'dt' => 5),


);

// inclue SQL query processing class
require 'datatables/examples/server_side/scripts/ssp.class.php';

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

?>