
<script src="assets/js/sweetalert/sweetalert.js"></script>
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<?php
include_once'connectdb.php';
session_start();
if(isset($_POST['btn_login'])){
	$username = $_POST['txt_username'];
	$password = $_POST['txt_password'];

	//echo $username." - ".$password;

	$select=$pdo->prepare("select * from tbl_user where
	username='$username' AND password='$password'");

	$select->execute();

	$row=$select->fetch(PDO::FETCH_ASSOC);

	if($row['username']===$username AND $row['password']===$password AND $row['role']==="admin"){
		
		
		$_SESSION['user_id']=$row['user_id'];  
		$_SESSION['username']=$row['username'];  
		$_SESSION['usermail']=$row['usermail']; 
		$_SESSION['role']=$row['role']; 
		
		echo '<script type="text/javascript">jQuery(function validation(){
			swal({
				title: "Good job! '.$_SESSION['username'].'",
				text: "Details correspondants",
				icon: "success",
				button: "Ok!",
				timer: 3000,
			  });
		});
		</script>';
		//echo $success = "Login successfull";

		header('refresh:1;dashboard.php');
	} else if($row['username']===$username AND $row['password']===$password AND $row['role']==="user"){

		$_SESSION['user_id']=$row['user_id'];  
		$_SESSION['username']=$row['username'];  
		$_SESSION['usermail']=$row['usermail']; 
		$_SESSION['role']=$row['role'];   

		echo '<script type="text/javascript">jQuery(function validation(){
			swal({
				title: "Good job! '.$_SESSION['username'].'",
				text: "Details correspondants",
				icon: "success",
				button: "Loading.....",
				timer: 3000,
			  });
		});
		</script>';
		header('refresh:1;userdashboard.php');
	} else {
		echo '<script type="text/javascript">jQuery(function validation(){
			swal({
				title: "Erreur!",
				text: "Données erronnées",
				icon: "error",
				button: "Ok!",
				
			  });
		});
		</script>';
	}
	
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Portail connexion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">E-DOUANES</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>nom d'utilisateur</h5>
           		   		<input type="text" class="input" name="txt_username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mot de passe</h5>
           		    	<input type="password" class="input" name="txt_password">
            	   </div>
            	</div>
            	<a href="#">Mot de passe oublié?</a>
            	<input type="submit" class="btn" name="btn_login" value="Se connecter">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
