<?php
function insertRoom($nameRoom, $price, $discount, $avatar, $desc, $ma_lp) {
	$sql = "INSERT INTO phong(ten_phong, gia, giam_gia, avatar, mo_ta, ma_lp)
		 		VALUES ('$nameRoom','$price','$discount','$avatar','$desc','$ma_lp')";
	pdo_execute($sql);
}

function select_items_body() {
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by ma_hanghoa desc limit 0,9";
	$listItems = pdo_query($sql);
	return $listItems;
}

function select_product_top10() {
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by so_luot_xem desc limit 0,10";
	$listItems = pdo_query($sql);
	return $listItems;
}

function selectRooms() {
	$sql = "SELECT * FROM phong order by ma_phong desc";
	$listRooms = pdo_query($sql);
	return $listRooms;
}

function selectSearchRooms($keyw, $ma_lp) {
	$sql = "SELECT * FROM phong  WHERE 1 ";
	if ($keyw != "") {
		$sql .= " AND ten_phong LIKE '%" . $keyw . "%'";
	}
	if ($ma_lp > 0) {
		$sql .= " AND ma_lp='" . $ma_lp . "'";
	}
	$sql .= " order by ten_phong desc";
	$listRoomsSearch = pdo_query($sql);
	return $listRoomsSearch;
}

function roomsFiltered($ma_lp) {
	$sql = "SELECT * FROM phong WHERE ma_lp =" . $ma_lp;
	$listFiltered = pdo_query($sql);
	return $listFiltered;
}

function roomsByPrice($value) {
	if($value === '1') {
		$sql = "SELECT * FROM phong order by gia desc";
		$listRoomsByPrice = pdo_query($sql);
		return $listRoomsByPrice;
	}

	if($value === '2') {
		$sql = "SELECT * FROM phong order by gia asc";
		$listRoomsByPrice = pdo_query($sql);
		return $listRoomsByPrice;	
	}
	return $value;
}

function filteredBoth($ma_lp, $value) {
	if($value === '1') {
		$sql = "SELECT * FROM phong WHERE ma_lp = '$ma_lp'  AND order by gia desc";
		$filteredBoth = pdo_query($sql);
		return $filteredBoth;
	}

	if($value === '2') {
		$sql = "SELECT * FROM phong WHERE ma_lp = '$ma_lp' AND order by gia asc";
		$filteredBoth = pdo_query($sql);
		return $filteredBoth;
	}
	return;
}


function deleteRoom($id) {
	$sql = "DELETE FROM phong WHERE ma_phong ='$id'";
	pdo_execute($sql);
}

function getOneRoom($id) {
	$sql = "SELECT * FROM phong WHERE ma_phong =" . $id;
	$room = pdo_query_one($sql);
	return $room;
}


function load_products($id, $iddm)
{
	$sql = "SELECT * FROM hanghoa WHERE  ma_loai='$iddm' AND ma_hanghoa <>" . $id;
	$item = pdo_query($sql);
	return $item;
}

function updateRoom($id, $ten_sp, $gia_sp, $giam_gia, $image, $mota, $ma_loai)
{
	$sql = "UPDATE phong SET ten_phong ='$ten_sp', gia = '$gia_sp', giam_gia = '$giam_gia',
		 avatar = '$image', mo_ta = '$mota', ma_lp = '$ma_loai'  
		 WHERE ma_phong =" . $id;
	pdo_execute($sql);
}
?>