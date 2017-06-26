<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Multiversum</title>

<!--  Connect link -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="icon" href="img/mvm.png" type="image/gif" sizes="28x12">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
</head>
<body>

<?php include 'header.php'; ?>
<div class="row">
<?php

//Shopingcart
session_start();

$page = 'index.php';
$page2 = 'cart.php';

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('mydb4') or die (mysql_error());

//toevoegen aan winkelwagen
if (isset($_GET['add'])) {
	$quantity = mysql_query('SELECT idProduct, Vooraad FROM product WHERE idProduct='.mysql_real_escape_string((int)$_GET['add']));
	//checken of het product op vooraad is
	while ($quantity_row = mysql_fetch_assoc($quantity)) {
		if ($quantity_row['Vooraad'] == $_SESSION['cart_'.$_GET['add']]) {
			echo 'There are only '. $quantity_row['Vooraad'] . ' in stock';
		} else if ($quantity_row['Vooraad'] != $_SESSION['cart_'.(int)$_GET['add']]) {
			$_SESSION['cart_'.(int)$_GET['add']]+='1';
		}
	}
	header('Location: '.$page);
}
if (isset($_GET['add2'])) {
	$quantity = mysql_query('SELECT idProduct, Vooraad FROM product WHERE idProduct='.mysql_real_escape_string((int)$_GET['add2']));
	//checken of het product op vooraad is
	while ($quantity_row = mysql_fetch_assoc($quantity)) {
		if ($quantity_row['Vooraad'] == $_SESSION['cart_'.$_GET['add2']]) {
			echo 'There are only '. $quantity_row['Vooraad'] . ' in stock';
		} else if ($quantity_row['Vooraad'] != $_SESSION['cart_'.(int)$_GET['add2']]) {
			$_SESSION['cart_'.(int)$_GET['add2']]+='1';
		}
	}
	header('Location: '. $page2);
}

//1 eraf halen uit mandje
if (isset($_GET['remove'])) {
	$_SESSION['cart_'.(int)$_GET['remove']]--;
	header('Location: '.'cart.php');
}

//verwijderen uit mandje
if (isset($_GET['delete'])) {
	$_SESSION['cart_'.(int)$_GET['delete']]='0';
	header('Location: '. 'cart.php');
}
	echo "<div id='table'>";
    echo    "<p id='Product'>Product</p>";
    echo    "<p id='Aantal'>Aantal</p>";
    echo    "<p id='Prijs'>Prijs</p>";
    echo "</div>";

//tonen van shoppingcart
function cart() {
	$total = 0;
	foreach($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0 ,5) == 'cart_') {
				$id = substr($name, 5, (strlen($name) - 5));
				$get = mysql_query('SELECT idProduct, ProductNaam, Prijs, Plaatje FROM product WHERE idProduct='.mysql_real_escape_string((int)$id));
				while ($get_row = mysql_fetch_assoc($get)) {
					$sub = $get_row['Prijs'] * $value;
					$val = $get_row['Plaatje'];
					echo "<img class='cartImage' src='img/$val'>";
					echo "<p id='shoppingText'>" . $get_row['ProductNaam']. "<div class='cartAantal'>" . ' x ' .$value. "</div>" . "<div class='cartPrijs'>" . '  &#8364;' .number_format($get_row['Prijs'], 2). ' = &#8364;'.number_format($sub, 2). "</div>" ."<div class='cartKnopjes'>" . ' <a href="cart.php?remove='.$id.'"><i class="fa fa-minus-circle" aria-hidden="true"></i></a> <a href="cart.php?add2='.$id.'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> <a href="cart.php?delete='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>'. "</div>" . "</p>";
					echo "<hr>";
				}
			}
			$total += $sub;
		}
	}
  if ($total == 0) {
    echo "<h2>Winkelwagentje is leeg.</h2>";
  }
  else {
    echo '<p id="cartTotal">Total: &#8364;'.number_format($total, 2).'</p>';
    echo "<form method='get' action='betalen.php'>";
    echo "<input type='hidden' name='bedrag' value=".$total.">";
    echo "<input id='afrekenen' type='submit' name='betalen' value='Afrekenen'>";
    echo "</form>";
  }
}
cart();
?>
</div>

<?php include 'footer.php'; ?>

<!-- SCRIPTS -->
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/img_effect.js"></script>
<!--  -->
</body>
</html>
