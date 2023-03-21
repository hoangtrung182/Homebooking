<?php 
	include './View/header.php';
	include './Models/pdo.php';
	include './Models/Categories.php';
	include './Models/Rooms.php';

// Filter by form

	$id = isset($_GET['loaiphong']) ? $_GET['loaiphong'] : '';
	$Price = isset($_GET['price_chose']) ? $_GET['price_chose'] : '';

	$BothFiltered = bothFilter($id, $Price);
	$listCates = selectCates();
	include './View/roomsSearch.php';

	include './View/footer.php';





