<?php
// connect to database
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mydb');
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
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql='SELECT * FROM Product LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

echo "<div class='col-12'>";
foreach ($result as $row){
  echo "<div class='col-3 col-m-6'>";
	echo "<div class='container'>";
	echo "<div class='img-effect'>";
foreach ($row as $key => $val){
				if ($key == 'ProductNaam'){
				echo "<p class='productNaam'>" . $val . "</p>";
			} else if ($key == 'Prijs') {
  			echo "<p class='prijs'>" . "&euro; $val" . "</p>";
      }
			// else if ($key == 'omschrijving') {
      //   echo "<p class='omschrijving'>" . $val . "</p>";
      // }

	}
		echo "</div>";
		foreach ($row as $key => $val){
		if ($key == 'Plaatje'){
			echo "<img class='image' src='img/$val'></td>";
		} else if($key == 'ProductNaam' || $key == 'Prijs' || $key == 'omschrijving' || $key == 'Vooraad' || $key == 'Detail'){
			echo "<p class='omschrijving'>" . $val . "</p>";
		} else if ($key == 'idProduct'){
			echo "<td><form action='/multiversum/details.php' method='get'><input type='hidden' name='id' value='".$val."'><i type='submit' class='fa fa-info-circle' aria-hidden='true'><input type='submit' value='info'></i></form></td>";
		} else {
  		echo $val;
  	}
}
echo "</div>";
echo "</div>";
}
echo "</div>";

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a class="pagination" href="index.php?page=' . $page . '">' . $page . '</a> ';
}
?>
