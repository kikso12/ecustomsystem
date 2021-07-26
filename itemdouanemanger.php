<script src="assets/js/sweetalert/sweetalert.js"></script>
<script src="assets/js/core/jquery.min.js"></script>
<?php
// Include config file
require_once "connectdb.php";
 
// Define variables and initialize with empty values
$designation_chapitre = $position_majeur = $designation_mineur = "";
$designation_chapitre_err = $position_majeur_err = $designation_mineur_err = "";
 
// Processing form data when form is submitted
/* if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate chapitre
    $input_designation_chapitre = trim($_POST["designation_chapitre"]);
    if(empty($input_designation_chapitre)){
        $designation_chapitre_err = "Veuillez entrer un nom";
    } elseif(!filter_var($input_designation_chapitre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $designation_chapitre_err = "Veuillez entrer un nom valide.";
    } else{
        $designation_chapitre = $input_designation_chapitre;
    }
    
    // Validate position_majeur
    $input_position_majeur = trim($_POST["position_majeur"]);
    if(empty($input_position_majeur)){
        $position_majeur_err = "Veuillez entrer une postion majeur.";     
    } else{
        $position_majeur = $input_position_majeur;
    }
    
    // Validate designation_mineur
    $input_designation_mineur = trim($_POST["designation_mineur"]);
    if(empty($input_designation_mineur)){
        $designation_mineur_err = "Please enter the position_majeur.";     
    } elseif(!filter_var($input_designation_mineur, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $designation_mineur_err = "Please enter a positive integer value.";
    } else{
        $designation_mineur = $input_designation_mineur;
    }
    
    // Check input errors before inserting in database
    if(empty($designation_chapitre_err) && empty($position_majeur_err) && empty($designation_mineur)){
        // Prepare an insert statement
        $sql = "INSERT INTO douaneitems (chapitre, chapitre_designation, position_majeur, designation_majeur, position_mineur,
        designation_mineur, unite_quantite, droit_douane, tva_dc) VALUES (:chapitre, :chapitre_designation, 
        :position_majeur, :designation_majeur, :position_mineur, :designation_mineur, :unite_quantite, :droit_douane, :tva_dc)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":chapitre", $param_chapitre);
            $stmt->bindParam(":chapitre_designation", $param_chapitre_designation);
            $stmt->bindParam(":position_majeur", $param_position_majeur);
            
            // Set parameters
            $param_chapitre = $chapitre;
            $param_chapitre_designation = $chapitre_designation;
            $param_position_majeur = $position_majeur;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: itemdouanemanager.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} */

if(isset($_POST['btnsaveitemdouane'])){
    $chapitre= $_POST['chapitre'];
    $chapitre_designation= $_POST['chapitre_designation'];
    $position_majeur= $_POST['position_majeur'];
    $designation_majeur= $_POST['designation_majeur'];
    $position_mineur= $_POST['position_mineur'];
    $designation_mineur= $_POST['designation_mineur'];
    $unite_quantite= $_POST['unite_quantite'];
    $droit_douane= $_POST['droit_douane']; 
    $tva_dc= $_POST['tva_dc'];

    $insert=$pdo->prepare("insert into douaneitems(chapitre, chapitre_designation, position_majeur,
    designation_majeur, position_mineur, designation_mineur, unite_quantite, droit_douane, tva_dc) values(:chapitre,
    :chapitre_designation, :position_majeur, :designation_majeur, :position_mineur, :designation_mineur, 
    :unite_quantite, :droit_douane, :tva_dc)");

    $insert->bindParam('chapitre', $chapitre);
    $insert->bindParam('chapitre_designation', $chapitre_designation);
    $insert->bindParam('position_majeur', $position_majeur);
    $insert->bindParam('designation_majeur', $designation_majeur);
    $insert->bindParam('position_mineur', $position_mineur);
    $insert->bindParam('designation_mineur', $designation_mineur);
    $insert->bindParam('unite_quantite', $unite_quantite);
    $insert->bindParam('droit_douane', $droit_douane);
    $insert->bindParam('tva_dc', $tva_dc);

    if($insert->execute()){
        echo '<script type="text/javascript">jQuery(function validation(){
			swal({
				title: "Position tarifaire ajoutée avec succès",
				text: "Item ajouté!!!!",
				icon: "success",
				button: "Ok!",
                timer: 5000,
				
			  });
		});
		</script>';
        header('refresh:1;itemdouanemanger.php');
        
    }else{
        echo '<script type="text/javascript">jQuery(function validation(){
			swal({
				title: "Postion tarifaire non ajoutée",
				text: "erreur entrées",
				icon: "error",
				button: "Ok!",
				
			  });
		});
		</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    TABLEAU POSITIONS TARIFAIRES
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<!--   <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.bootstrap.min.css" />
 --><link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.templates.min.js"></script>

 
 
  
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  
</head>
<?php 
include_once'connectdb.php';
$connect = mysqli_connect("localhost", "root","","ecustomsquote123");
$query = "SELECT * FROM douaneitems ORDER BY ID DESC";
$result = mysqli_query($connect,$query);
session_start();

if($_SESSION['username']== ""){
  header('location:index.php');
}

?>

<?php include_once'header.php';?>  

<div class="main-panel" id="main-panel">
    
    <div class="content">
            <div class="row">
                 <!-- <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Formulaire Item douane</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Adresse mail</label>
                                        <input type="text" class="form-control" placeholder="Company" value="Mike">
                                    </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Psedo Agent</label>
                                        <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" value="Mike">
                                    </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                    </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code">
                                    </div>
                                    </div>
                                </div>
  
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-round">Enregistrer</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Tableau Positions tarifaires</h4>
                    </div>
                        <div class="card-body">
                            <div>
                                <a href="create.php" class="btn btn-danger btn-round pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i> Importer par lots</a>
                            </div>
                            <div>
                                <a href="create.php" class="btn btn-success btn-round pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Ajouter Position tarifaire</a>
                            </div>
                            <table id="item_data" style="width:100%" class="display">
                                <thead bgcolor="#08af02">
                                    <tr class="table-primary">
                                        <th>Section</th>
                                        <th>Chapitre</th>
                                        <th>Postion majeur</th>
                                        <th>Position mineur</th>
                                        <th>Droits</th>
                                        <th>Tva</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <?php
                                  while($row = mysqli_fetch_array($result)) 
                                  {
                                      echo '
                                      <tr>
                                        <td>'.$row["section_designation"].'</td>
                                        <td>'.$row["chapitre_designation"].'</td>
                                        <td>'.$row["designation_majeur"].'</td>
                                        <td>'.$row["designation_mineur"].'</td>
                                        <td>'.$row["droit_douane"].'</td>
                                        <td>'.$row["tva_dc"].'</td>
                                        
                                      </tr>
                                      ';
                                  }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th>Section</th>
                                        <th>Chapitre</th>
                                        <th>Postion majeur</th>
                                        <th>Position mineur</th>
                                        <th>Droits</th>
                                        <th>Tva</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal enregistrement item douane -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Formulaire ajout position tarfiaire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" name="formitemdouane">
                                
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Numéro chapitre</label>
                                        <input type="number" class="form-control" name="chapitre" placeholder="Numéro">
                                    </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Designation Chapitre</label>
                                        <input type="text" class="form-control" name="chapitre_designation" placeholder="Chapitre">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Position Majeure</label>
                                        <input type="text" class="form-control" name="position_majeur" placeholder="Position majeure">
                                    </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Nom Majeur</label>
                                        <input type="text" class="form-control" name="designation_majeur" placeholder="Nom postion majeur">
                                    </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Position mineure</label>
                                        <input type="text" class="form-control" name="position_mineur" placeholder="Position mineure">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Nom mineur</label>
                                        <input type="text" class="form-control" name="designation_mineur" placeholder="Nom postion mineur">
                                    </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Droits douanes</label>
                                        <input type="text" class="form-control" name="droit_douane" placeholder="Droits de douanes">
                                    </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>TVA DC</label>
                                        <input type="text" class="form-control" name="tva_dc" placeholder="TVA DC">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Unité de quantité</label>
                                        <input type="text" class="form-control" name="unite_quantite" placeholder="Unité quantité">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <button type="submit" name="btnsaveitemdouane" class="btn btn-primary btn-round">Enregistrer</button>
                                    </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>

 </div>
<?php 
    include_once'footer.php';
?>
</html>

<!--   Core JS Files   -->









  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
 
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->

  <!-- Chart JS -->

  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> --><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<!--   <script src="assets/demo/demo.js"></script> -->
<script>
    $(document).ready(function() {
        $('#item_data').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: "excel",              // Extend the excel button
                    excelStyles: {                // Add an excelStyles definition
                        template: "blue_medium",  // Apply the 'blue_medium' template
                    },
                    className: 'btn btn-success', text:'Exporter vers excel'
                },
            ],
            
        });
   
        /*  $('#item_data').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax":{
			url:"fetchitemdouane.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[6,7 ],
				"orderable":false
			}
		]
    }); */
} );
  </script>

  
