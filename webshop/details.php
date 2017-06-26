<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Multiversum</title>

<!--  Connect link -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
</head>
<body>
<?php include('header.php'); ?>

<div class="row">

<?php

	class DbHandler {
	private $db_username;
	private $db_password;
	private $db_server;
	private $db_name;
	private $conn;

	public function __construct($server, $db_name, $username, $password) {
		$this->db_username = $username;
		$this->db_password = $password;
		$this->db_server = $server;
		$this->db_name = $db_name;
	try {
	   $this->conn = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_username, $this->db_password);
	   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   }
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	}

	//Read
	public function ReadData($query) {
		try {
			$query = $this->conn->prepare($query);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	} catch (PDOException $e) {
		return $e;
	}
	}

	}
		$crud = new DbHandler("localhost","mydb4","root","");
    $euro = "&euro;";
		//Tonenvan product
		if (isset($_REQUEST['id'])) {
		// Read
		$sql  = "SELECT * FROM Product WHERE idProduct='".$_GET["id"]."'";
		$res = $crud->ReadData($sql);
		echo "<div class='col-12'>";
		foreach ($res as $row){
		echo "<div class='col-6'>";
		foreach ($row as $key => $val) {
			if ($key == 'ProductNaam'){
			echo "<p class='DproductNaam'>" . $val . "</p>";
		} else if ($key == 'Prijs') {
			echo "<p class='Dprijs'>" . $euro . str_replace('.', ',', $val) . "</p>";
		} else if ($key == 'Plaatje') {
			echo "<td style='border: solid 1px; border-collapse: collapse;'><img class='Dplaatje' src='img/$val'></td>";
		}
		}
		echo "</div>";
    // $omschrijving = $key == 'omschrijving';
    // print_r(explode(',', $omschrijving, 0));
		echo "<div class='col-6'>";
		foreach ($row as $key => $array) {
			if ($key == 'Detail'){
			echo "<p class='Domschrijving'>" . "<h2 class='kleur'>Product omschrijving: </h2>" . $array . "</p>";
		}	else if ($key == 'Platform') {
			echo "<br><table class='table'><h2 class='kleur'>Populaire specificaties: </h2>";
			echo "<tr><td class='table'><b>Platform: </b></td><td class='content'>".$array."</td></tr>";
		}	else if ($key == 'EigenDisplay') {
			echo "<tr><td class='table'><b>Eigen display: </b></td><td class='content'>".$array."</td></tr>";
		}	else if ($key == 'Resolutie') {
			echo "<tr><td class='table'><b>Resolutie: </b></td><td class='content'>".$array."</td></tr>";
		}	else if ($key == 'RefreshRate') {
			echo "<tr><td class='table'><b>Refresh rate: </b></td><td class='content'>".$array."</td></tr>";
		} 	else if ($key == 'Gezichtsveld') {
			echo "<tr><td class='table'><b>Gezichtsveld: </b></td><td class='content'>".$array."&deg</td></tr>";
		}	else if ($key == 'Functies') {
			echo "<tr><td class='table'><b>Functies: </b></td><td class='content'>".$array."</td></tr>";
		}
		}
		echo "</table>";
		foreach ($row as $key => $val) {
			if ($key == 'idProduct'){
        echo "<br>";
				echo "<td><a href='cart.php?add2=".$val."' id='DnuBetalen'>Nu betalen</a></td>";
		}
		}

		echo "</div>";

		break;
		}

		//Tonenvan producten
		// foreach ($res as $row){
		// foreach ($row as $key => $val){
		// 		if ($key == 'Plaatje'){
		// 			//plaatje
		// 			echo "<td style='border: solid 1px; border-collapse: collapse;'><img src='img/$val'></td>";
		// 		} else {
		// 			echo "<td style='border: solid 1px; border-collapse: collapse;'> $val </td>";
		// 		}
		//
		// }
		// echo "<tr>";
		//
		// }
		} else {
			echo "Error";
		}
echo "</div>";

?>

</div>

<?php include('footer.php'); ?>
</body>
</html>
