<?php 

include ("config.php");

if (empty ($_GET["search"])){
	
	echo "Walang laman si GET...";
	
}else{
	
	$check = $_GET["search"];
	
	$terms = explode (" ", $check);
	$q = "SELECT * FROM products WHERE ";
	$i = 0;
	
	foreach ($terms as $each) {
		
		$i++;
		
		if ($i==1) {
			$q .= "name LIKE '%$each%' ";
		}else{
			$q .= "OR name LIKE '%$each%' ";
			
		}
		
	}
	
	$query = mysqli_query($conn, $q);
	$c_q = mysqli_num_rows($query);
	
	if ($c_q > 0 && $check!=""){
		
		while ($row = mysqli_fetch_assoc($query)){
			
			
			echo $name = $row["name"] . "<br>";
			echo $price = $row["price"] . "<br>";
		}
		
		
	}else{
		
		echo "No result.";
		
	}
	
}

?>