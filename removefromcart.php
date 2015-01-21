<?php

session_start();
//session_destroy();

$id = $_GET['id'];
$name = $_GET['name'];
$price = $_GET['price'];

if(!isset($_SESSION['cart'])) {
	
	$_SESSION['cart'] = array();
}

$_SESSION['cart'] = array_diff($_SESSION['cart'], array($id));

$_SESSION['pointcount'] = $_SESSION['pointcount'] - $price;

header('Location: cart.php?action=remove&id=' . $id . '&name=' . $name . '&price=' . $price);

?>