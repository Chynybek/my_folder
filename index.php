<?php include('include/config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>StrtWlk</title>
	<link rel="icon" href="img/logopng.png">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/strtwlk.css">

	</head>

	<body>
	<!-- HEADER -->
	<?php include('templates/header.php'); ?>
	
	<!-- MENU -->
	<?php include('templates/menu.php'); ?>
	<?php echo "<br>";?>
	
	<!--content -->
	<br>Categories <br>
	
	<!-- fetch 3 categories-->
	<?php
	$query = mysqli_query($sql, "SELECT * FROM category");
	while($row = mysqli_fetch_assoc($query))
		{
		$category = $row['CategoryID'];
		$categoryname =$row['CategoryName'];
		echo $category; echo "-";echo $categoryname;
		echo "<br>";
		}?>
	<br>"ID-NameID-Size-Category-colour-price"; <br>
	
	<!--fetch information about the product(parent table) and add an array-->
	<?php
	$query = mysqli_query($sql, "SELECT * FROM product");
	$prodInfo =array();
	while($row = mysqli_fetch_assoc($query))
		{
		$title = $row['ID'];
		$name = $row['NameID'];
		$size =$row['size'];
		$category = $row['CategoryID'];
		$colour = $row['ColourID'];
		$price = $row['price(soms)'];
		
		/*echo $title;echo "-"; echo $name;echo "-";echo $size; echo "-";echo $category;echo "-";echo $colour; echo"-"; echo $price;*/
	
		}
	$i=0;
	/*while($i < $title)
		echo $title;
		array_push($prodInfo, $title, $name, $size, $category, $colour, $price);
		$i=$i+1;*/
	$string =join("-",$prodInfo);
	echo $string;
		?>
	<!--fetch information about productname-->
	<br><br>Name of a product<br>
	<?php
	$query = mysqli_query($sql, "SELECT * FROM productname");
	while($row = mysqli_fetch_assoc($query))
		{
		$name = $row['NameID'];
		$actualname =$row['NameName'];
		echo $name;echo"-";echo $actualname;
		echo "<br>";
		}?>
	<!--fetch information about colours-->
	<br>Colours available
	<?php
	$query = mysqli_query($sql, "SELECT * FROM colour");
	while($row = mysqli_fetch_assoc($query))
		{
		$colour = $row['ColourID'];
		$colourName =$row['ColourName'];
		echo $colour;echo"-";echo $colourName;
		echo "<br>";
		}?>
	<!--footer -->
	<?php include('templates/footer.php'); ?>
</body>

</html>


