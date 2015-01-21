<?php
session_start();
$max = 6;
?>

<html>
	<head>
		<title>shopping cart</title>
		<link type="text/css" rel="stylesheet" href="styles/cartstyle.css" />
	</head>
</html>

<body>

<div class='sectionContainer'>
	<div class='sectionHeader'></div>
	
	<?php
	include  'navigation.php'
	
	?>
	
	<div class='sectionContents'>
	
	<?php
	
	if($_GET['action']=='add') {
		echo "<div>" . $_GET['name'] . " was added to your cart.</div> " . $_['price'];
		
	}
	
	if($_GET['action'] == 'exists'){
		echo "<div>" . $_GET['name'] . " already exists in your cart.</div>";
	}
	
	if($_GET['action']=='full'){
		echo "<div>" . $_GET['name'] . "  cant be added because your over your points.</div>" . $_SESSION['pointcount'];
	}
	
	if($_GET['action']=='tofull'){
		echo "<div>" . $_GET['name'] . "  aaaacant be added because your over your points.</div>" .  ($_SESSION['pointcount'] - $max) . "points over please take away an item.";
	}
	
	
	
	require "lib/Dbconnect.php";
	
	$query = "SELECT id, name, price FROM products";
	$stmt = $con->prepare($query);
	$stmt->execute();
	
	$num = $stmt->rowCount(); 
	
	if($num>0) {
		
	
	echo "<table border='0'>"; // start table
	
	// table heading
	echo "<tr>";
		echo "<th class='textAlignLeft'>Product Name</th>";
		echo "<th>Points</th>";
		echo "<th>Action</th>";
	echo "</tr>";
	
	
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	
	echo "<tr>";
		echo "<td>{$name}</td>";
		echo "<td class='textAlignRight'>{$price}</td>";
		echo "<td class='textAlignCenter'>";
			echo "<a href='addtocart.php?id={$id}&name={$name}&price={$price}' class='customButtom'>";
				echo "<img src='images/add-to-cart.png' title='add to cart' />";
				echo "</a>";
				echo "</td>";
				echo "</tr>";
					
	}
	}
	
	
	else {
		echo "no products found";
	}
?>


	</div>
</div>
</body>
</html>