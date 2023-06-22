<?php

$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST ["search"] )) {
		
		$searchErr = "Required!";
		
	} else {
		
		$search = $_POST ["search"];
		
	}
	
	if ($search){
		
		echo "<script>window.location.href='result.php?search=$search';</script>";
	
}
}

?>
<center>
<ul>
  <li style="float:right"><a href="search.php">Search</a></li>
</ul>
<form method = "POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<h1>Search Information</h1>
<br>
<br>
<br>
<input type = "text" name = "search" placeholder= "Enter Owner's Name" value = "<?php echo $search; ?>" >
<span class = "error" ><?php echo $searchErr; ?></span>
<br>
<br>
<input type = "submit" value = "Search" class="button">

</form>
</center>