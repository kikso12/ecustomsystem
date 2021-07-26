<script src="assets/js/core/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script src="assets/js/select2.js"></script>
<link href="assets/css/select2.min.css" rel="stylesheet" />

<script src="assets/js/sweetalert/sweetalert.js"></script>
<?php
// Include config file
require_once "connectdb.php";
include "config.php";

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
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
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
                
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Chaîne logistique</h4>
                    </div>
                        <div class="card-body">
                            
                            <div class="row">
                            <div class="col-md-12">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dossiers</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Transits</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Transporteurs</a>
                                        <a class="nav-item nav-link" id="nav-depense-tab" data-toggle="tab" href="#nav-depense" role="tab" aria-controls="nav-depense" aria-selected="false">Depenses</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div align="right">
                                            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-round pull-right"><i class="fa fa-plus"></i>  nouveau dossier</button>
                                        </div>
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Project Name</th>
                                                    <th>Employer</th>
                                                    <th>Awards</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#">Work 1</a></td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 2</a></td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 3</a></td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Project Name</th>
                                                    <th>Employer</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#">Work 1</a></td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 2</a></td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 3</a></td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Contest Name</th>
                                                    <th>Date</th>
                                                    <th>Award Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#">Work 1</a></td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 2</a></td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 3</a></td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-depense" role="tabpanel" aria-labelledby="nav-depense-tab">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Depenses</th>
                                                    <th>Date</th>
                                                    <th>Award Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#">Work 1</a></td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 2</a></td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Work 3</a></td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                    <form>
                                
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Numéro du Dossier</label>
                                    <input type="text" class="form-control" placeholder="adresse mail">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Date ouverture dossier</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Client</label>
                                    <br/>
                                    <select  id="sel_depart" class="js-example-basic-single" name="Client" style="width: 100%">
                                    <option value="0">- Tirer client -</option>
                                        <?php 
                                        // Fetch cliebt
                                        $sql_client = "SELECT * FROM clients";
                                        $client_data = mysqli_query($con,$sql_client);
                                        while($row = mysqli_fetch_assoc($client_data) ){
                                            $id = $row['id'];
                                            $nom = $row['nom'];
                                            
                                            // Option
                                            echo "<option value='".$id."' >".$nom."</option>";
                                        }
                                        ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Taux de la douane</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Position tarifaire</label>
                                    <input type="text" class="form-control" placeholder="adresse mail">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>M/S. AVION</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>B/L. L.T.A/C.D.A.N.</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>N° Container</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Type de container</label>
                                    <input type="text" class="form-control" placeholder="adresse mail">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Nombre de colis</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Poids brute</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Nature Marchandises</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 pr-1">
                                <div class="form-group">
                                    <label>FOB</label>
                                    <input type="text" class="form-control" placeholder="adresse mail">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>FREIGHT</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>Assurances</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>N° E</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>N° L</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>N° Q</label>
                                    <input type="text" class="form-control" placeholder="Psedo">
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

<!-- Styles personnalisés -->

<style>
    .container {
      max-width: 350px;
      margin: 50px auto;
      text-align: center;
      border-radius: 25px;
    }
   /*  select {
      width: 100%;
      min-height: 35px;
      margin-bottom: 20px;
      border-radius: 25px;
    } */

  </style>
<!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
 
  <!--  Google Maps Plugin    -->

  <!-- Chart JS -->

  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> --><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<!--   <script src="assets/demo/demo.js"></script> -->
<script type="text/javascript" language="javascript" >

$(document).ready(function(){ 
    $('.js-example-basic-single').select2();   
    $('#add_button').click(function(){
        $('#course_form')[0].reset();
        $('.modal-title').text("Fomrulaire dossier");
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

  
