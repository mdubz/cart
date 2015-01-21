<?php

session_start();

$id = $_GET['id'];
$name = $_GET['name'];
$price = $_GET['price'];





//checks to see if the 'cart' session array was created, if not
// create the cart session
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
	
	}


if(in_array($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: products.php?action=exists&id' . $id . '&name=' . $name);
}

else{	

	
	
	if($_SESSION['pointcount'] == 6) {
			header('Location: products.php?action=full');
			
		}
		
		elseif($_SESSION['pointcount'] > 6){
			header('Location: products.php?action=tofull&id' . $id . '&name=' . $name . '&price=' . 				$totalprice);
		}
		
		else {
		
		//$totalprice = $_SESSION['pointcount'];
		
		header('Location: products.php?action=add&id' . $id . '&name=' . $name . '&price=' . 				$price);
			$_SESSION['pointcount'] += $price;
		
	$totalprice = $_SESSION['pointcount'];
			
		array_push($_SESSION['cart'], $id);
		
		}
		}