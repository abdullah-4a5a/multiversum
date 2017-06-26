<?php
// connect to database
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mydb4');
// define how many results you want per page
$results_per_page = 8;
// find out the number of results stored in database
$sql='SELECT * FROM Product';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
//select products
$sql2= 'SELECT * FROM Product ORDER BY idProduct DESC LIMIT 0, 2 ;';;
$result = mysqli_query($con, $sql2);
$euro = "&euro;";
echo "<center>";
echo "<form action='zoek.php' method='post'><input maxlength='30' id='zoeken' type='text' name='naam' placeholder='Product..'></input><button id='zoekButton' type='submit' name='search' value='OK'>Zoeken</button></form>";
echo "</center>";

echo "<div class='col-12'><h1 class='titelProductOverzicht'>Niewste producten:<h1></div>";

echo "<div class='col-2'></div>";
//Recent products
foreach ($result as $row){
  echo "<div class='col-4 col-m-6'>";
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
			echo "<p class='omschrijving'>" . $val . "</p>";
		} else if ($key == 'idProduct'){
      echo "<td><form action='/webshop/details.php' method='get'><input type='hidden' name='id' value='".$val."'><input type='submit' class='info' value='info'></form></td>";
      echo "<td><a href='cart.php?add2=".$val."' class='nieuwsteNubetalen'>Nu betalen</a></td>";
      //winkelwagentje buttons
			echo "<a href='cart.php?add=".$val."'><i id='nieuwsteCar' class='fa fa-cart-plus fa-lg' aria-hidden='true'></i></a></p>";
		} else {
  		//echo $val;
  	}
}
echo "</div>";
echo "</div>";
}


// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql='SELECT * FROM Product LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

//Producten Overzicht

echo "<div class='col-12'><h1 class='titelProductOverzicht'>Producten overzicht:<h1></div>";

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
echo "</div>";
echo "</div>";
}
echo "</div>";
echo '<p id="paginaNummers">';
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a class="pagination" href="index.php?page=' . $page . '">' . $page . '</a> ';
}
echo '</p>';
?>
