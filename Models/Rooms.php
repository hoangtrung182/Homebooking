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

function select_items_search($keyw, $ma_loai)
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 ";
	if ($keyw != "") {
		$sql .= " AND ten_hanghoa LIKE '%" . $keyw . "%'";
	}
	if ($ma_loai > 0) {
		$sql .= " AND ma_loai='" . $ma_loai . "'";
	}
	$sql .= " order by ten_hanghoa desc";
	$listItems = pdo_query($sql);
	return $listItems;
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