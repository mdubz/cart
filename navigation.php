<?php 
	
$cartItemCount = count($_SESSION['cart']);

?>

<div class='navigation'>
	<a href='maincart.php' class='customButton'>Home</a>
	<a href='products' class='customButton'>Products</a>
	<a href='cart.php' class='customButton'>View Cart<?php echo "({$cartItemCount})"; ?> </a>
</div>