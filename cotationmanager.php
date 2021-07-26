<script src="assets/js/sweetalert/sweetalert.js"></script>
<script src="assets/js/core/jquery.min.js"></script>
<?php
// Include config file
require_once "connectdb.php";
 

 
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
    GESTIONNAIRES DES CLIENTS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
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
                        <h4 class="card-title"> Gestionnaire Cotation</h4>
                    </div>
                        <div class="card-body">
                            <div align="right">
                                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-round pull-right"><i class="fa fa-plus"></i>nouvelle Cotation</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal enregistrement item douane -->
            
    </div>

 </div>
<?php 
    include_once'footer.php';
?>
</html>

<!-- Modal enregistrement client -->
<div id="userModal" class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-xl">
        <form method="post" id="course_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">feuille de calculs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                    <div class="load-animate animated fadeInUp">
                    <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <h2 class="title">PHP Invoice System</h2>
                    </div>
                    </div>
                    <input id="currency" type="hidden" value="$">
                    <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h3>From,</h3>
                    <?php echo $_SESSION['username']; ?><br>
                    <?php echo $_SESSION['usermail']; ?><br>
                    <?php echo $_SESSION['user_id']; ?><br>
                    <?php echo $_SESSION['role']; ?><br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <h3>To,</h3>
                    <div class="form-group">
                    <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"></textarea>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem">
                    <tr>
                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                    <th width="15%">Item No</th>
                    <th width="38%">Item Name</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    </tr>
                    <tr>
                    <td><input class="itemRow" type="checkbox"></td>
                    <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                    <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                    <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                    <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <h3>Notes: </h3>
                    <div class="form-group">
                    <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                    <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                    <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <span class="form-inline">
                    <div class="form-group">
                    <label>Subtotal:  </label>
                    <div class="input-group">
                    <div class="input-group-addon currency">$</div>
                    <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Tax Rate:  </label>
                    <div class="input-group">
                    <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
                    <div class="input-group-addon">%</div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Tax Amount:  </label>
                    <div class="input-group">
                    <div class="input-group-addon currency">$</div>
                    <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Total:  </label>
                    <div class="input-group">
                    <div class="input-group-addon currency">$</div>
                    <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Amount Paid:  </label>
                    <div class="input-group">
                    <div class="input-group-addon currency">$</div>
                    <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Amount Due:  </label>
                    <div class="input-group">
                    <div class="input-group-addon currency">$</div>
                    <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
                    </div>
                    </div>
                    </span>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    </form>
                    <br /> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="course_id" id="course_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('#add_button').click(function(){
        $('#course_form')[0].reset();
        $('.modal-title').text("feuille de calculs");
        $('#action').val("Add");
        $('#operation').val("Add");
    });
    
    var dataTable = $('#client_table').DataTable({
        "paging":true,
        "processing":true,
        "serverSide":true,
        "order": [],
        "info":true,
        "ajax":{
            url:"fetch_client.php",
            type:"POST"
               },
        "columnDefs":[
            {
                "targets":[0,3,4],
                "orderable":false,
            },
        ],    
    });

    $(document).on('submit', '#course_form', function(event){
        event.preventDefault();
        var id = $('#id').val();
        var course = $('#course').val();
        var students = $('#students').val();
        
        if(course != '' && students != '')
        {
            $.ajax({
                url:"insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    $('#course_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            alert("Course Name, Number of students Fields are Required");
        }
    });
    
    $(document).on('click', '.update', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"fetch_single_client.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#nom').val(data.course);
                $('#rccm').val(data.students);
                $('.modal-title').text("Modifier client");
                $('#id').val(id);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        })
    });
    
    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this user?"))
        {
            $.ajax({
                url:"delete_client.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;   
        }
    });
    
    
});
</script>

  
