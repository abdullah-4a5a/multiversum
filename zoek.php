<!DOCTYPE html>
<html>
<head>
<title>Google Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<pre>
<?php
echo "<center>";
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

		$sql = "SELECT * FROM mydb.product WHERE ProductNaam LIKE ('%".$_POST['naam']."%') OR Detail like ('%".$_POST['naam']."%');";
		$crud = new DbHandler("localhost","mydb","root","");
		$res = $crud->ReadData($sql);
		echo "<table style='border: solid 1px'>";
		foreach ($res as $row){
		foreach ($row as $key => $val)
		if ($key == 'idProduct' || $key == 'Vooraad' || $key == 'Detail'){

		} else {
		echo "<th style='border: solid 1px'> $key </th>";
		}
		echo "<tr>";
		break;
	}


	foreach ($res as $row){
	foreach ($row as $key => $val){
				if ($key == 'Prijs') {
				echo "<td style='border: solid 1px; border-collapse: collapse;'>&euro; $val </td>";
			}	else if ($key == 'idProduct' || $key == 'Vooraad' || $key == 'Detail'){

			}	else if ($key == 'Plaatje'){
				echo "<td style='border: solid 1px; border-collapse: collapse;'><img src='img/$val'></td>";
			} else {
				echo "<td style='border: solid 1px; border-collapse: collapse;'> $val </td>";
			}
	}
	echo "<tr>";

	}

echo "</table>";

	} else {

		echo "IK WEET NIET WAT JE BEDOELHAHFHA";
	}

//SELECT * FROM `products` WHERE product_name like 'Sprinkled' limit 2



echo "</center>";
?>
</pre>
