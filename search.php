<?php 
	include './View/header.php';
	include './Models/pdo.php';
	include './Models/Categories.php';
	include './Models/Rooms.php';

// Filter by form

	$id = isset($_GET['loaiphong']) ? $_GET['loaiphong'] : '';
	$Price = isset($_GET['price_chose']) ? $_GET['price_chose'] : '';
	$Price_min = isset($_GET['price-min']) ? $_GET['price-min'] : 0;
	$Price_max = isset($_GET['price-max']) ? $_GET['price-max'] : 0;

	$BothFiltered = bothFilter($id, $Price, $Price_min, $Price_max);
	// $BothFiltered = bothFilter($Price_min, $Price_max);
	$listCates = selectCates();
	include './View/roomsSearch.php';

	include './View/footer.php';




