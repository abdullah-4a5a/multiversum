<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
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

 if (isset($_REQUEST['search'])) {

  $sql = "SELECT * FROM mydb4.product WHERE ProductNaam LIKE ('%".$_POST['naam']."%');";
  $crud = new DbHandler("localhost","mydb4","root","");
  $result = $crud->ReadData($sql);
  $euro = "&euro;";
  echo "<center>";
  echo "<form action='zoek.php' method='post'><input maxlength='30' id='zoeken' type='text' name='naam' placeholder='Product..'></input><button id='zoekButton' type='submit' name='search' value='OK'>Zoeken</button></form>";
  echo "</center>";
  //Producten Overzicht
  echo "<div class='col-12'><h1 class='titelProductOverzicht'>" . "<p>Alle resultaten voor: '" . $_POST['naam'] . "'</p><h1></div>";

  foreach ($result as $row){
    echo "<div class='col-3 col-m-6'>";
  	echo "<div class='container'>";
  	echo "<div class='img-effect'>";
  foreach ($row as $key => $val){
  				if ($key == 'ProductNaam'){
  				echo "<p class='productNaam'>" . $val . "</p>";
  			} else if ($key == 'Prijs') {
    			echo "<p class='prijs'>" . $euro . str_replace('.', ',', $val) . "</p>";
        }
  			// else if ($key == 'omschrijving') {
        //   echo "<p class='omschrijving'>" . $val . "</p>";
        // }

  	}
  		echo "</div>";
  		foreach ($row as $key => $val){
  		if ($key == 'Plaatje'){
  			echo "<img class='image' src='img/$val'></td>";
  		} else if($key == 'ProductNaam' || $key == 'Prijs' || $key == 'omschrijving' || $key == 'omschrijving2' || $key == 'omschrijving3' || $key == 'omschrijving4' || $key == 'Vooraad' || $key == 'Detail'){
  			// echo "<p class='omschrijving'>" . $val . "</p>";
  		} else if ($key == 'idProduct'){
  			echo "<td><form action='/webshop/details.php' method='get'><input type='hidden' name='id' value='".$val."'><input type='submit' class='info' value='info'></form></td>";
        echo "<td><a href='cart.php?add2=".$val."' class='nieusteNubetalen'>Nu betalen</a></td>";
  			//winkelwagentje buttons
  			echo "<a href='cart.php?add=".$val."'><i class='fa fa-cart-plus fa-lg' aria-hidden='true'></i></a></p>";
  		} else {
    		//echo $val;
    	}
  }
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "</div>";
  echo "</div>";
  }
  echo "</div>";

 } else {

  // echo "IK WEET NIET WAT JE BEDOELHAHFHA";
 }

//SELECT * FROM `products` WHERE product_name like 'Sprinkled' limit 2

?>
</div>
<?php include('footer.php'); ?>
<!-- SCRIPTS -->
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/img_effect.js"></script>
<!--  -->
</body>
</html>
