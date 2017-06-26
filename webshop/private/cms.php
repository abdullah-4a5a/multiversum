<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Multiversum</title>

<!--  Connect link -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/responsive.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
</head>
<body>
  <div class="topnav" id="myTopnav">
    <!-- <img id="logo" src="img/mvm.png" alt="Logo"> -->
    <a id="homeCms" href="../index.php">Home</a>
  </div>
  <header>
  <!-- Parallax 1 image -->
    <a href="../index.php"><img id="header" src="../img/mvm_m.png"></img></a>
  </header>
<div class='row'>
<div class='col-12'>
<?php
	$message = "";
	if (isset($_REQUEST['todo'])) {
		if ($_POST['naam'] == "" || $_POST['voorraad'] == "" || $_POST['prijs'] == "" || $_POST['detail'] == "" || $_POST['Platform'] == "" || $_POST['Eigendisplay'] == "" || $_POST['Resolutie'] == "" || $_POST['Refreshrate'] == "" || $_POST['Gezichtsveld'] == "" || $_POST['Functies'] == "") {
			$message = "Error! Vul in elk input veld.";
		} else {
		//upload files
		$filebasename = basename($_FILES['upfile']['name']);
		$ext = strtolower(substr($filebasename, strrpos($filebasename, '.') + 1));
		
		if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["upfile"]["type"] == "image/jpeg" || $_FILES["upfile"]["type"] == "img/gif" || $_FILES["upfile"]["type"] == "image/png")) {
			
			$desired_dir = "C:/xampp/htdocs/webshop/img/";
			$file_name = $_FILES["upfile"]["name"];
			if (file_exists($desired_dir . $file_name)) {
				$message = $file_name . " dit plaatje bestaat al.";
			} else {
				move_uploaded_file($_FILES["upfile"]["tmp_name"], $desired_dir . $file_name);
				//insert data
				$user = "root";
				$pass = "";
				$dbh = new PDO('mysql:host=localhost;dbname=mydb4', $user, $pass);
				$sql = "INSERT INTO mydb4.product (ProductNaam, Vooraad, Prijs, Detail, Platform, EigenDisplay, Resolutie, RefreshRate, Gezichtsveld, Functies, Plaatje) VALUES ('".$_POST['naam']."', '".$_POST['voorraad']."', '".$_POST['prijs']."', '".$_POST['detail']."', '".$_POST['Platform']."', '".$_POST['Eigendisplay']."', '".$_POST['Resolutie']."', '".$_POST['Refreshrate']."', '".$_POST['Gezichtsveld']."', '".$_POST['Functies']."', '".$file_name."');";
				$query = $dbh->prepare($sql);
				$query->execute();
				$message = "Product successfully uploaded.";
			}
		} else {
			$message = "Error! Plaatje is geen jpg, gif of png";
		}
	}
	}
?>
<center>
	<form id='cmsform' action='cms.php' enctype='multipart/form-data' method='post'><br>
	<h2 style='color:#16A085'>Voeg Product Toe:</h2><br>
	<p class='cmsText'>Naam product:</p> <input type='text' name='naam'><br>
	<p class='cmsText'>Voorraad:</p> <input type='text' name='voorraad'><br>
	<p class='cmsText'>Prijs:</p> <input type='text' name='prijs'><br>
	<p class='cmsText'>Detail:</p> <input type='text' name='detail'><br>
	<p class='cmsText'>Platform:</p> <input type='text' name='Platform'><br>
  <p class='cmsText'>Eigen display:</p> <input type='text' name='Eigendisplay'><br>
  <p class='cmsText'>Resolutie:</p> <input type='text' name='Resolutie'><br>
  <p class='cmsText'>Refresh rate:</p> <input type='text' name='Refreshrate'><br>
  <p class='cmsText'>Gezichtsveld:</p> <input type='text' name='Gezichtsveld'><br>
  <p class='cmsText'>Functies:</p> <input type='text' name='Functies'><br>
	<p class='cmsText'>Plaatje:</p> <input type='file' name='upfile'><br><br>
	<?php if($message != "") { ?>
	<br /><font color='#ff0000'><?php echo $message?></font>
	<?php } ?>
	<button id='toevoegen' type='submit' name='todo' value='insert'>Voeg Toe</button>
	</form>
</center>
</div>
</div>

<?php include "../footer.php"; ?>
</body>
</html>
