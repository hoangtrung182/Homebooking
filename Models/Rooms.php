<?php
function insertRoom($nameRoom, $price, $discount, $avatar, $desc, $ma_lp)
{
	$sql = "INSERT INTO phong(ten_phong, gia, giam_gia, avatar, mo_ta, ma_lp)
		 		VALUES ('$nameRoom','$price','$discount','$avatar','$desc','$ma_lp')";
	pdo_execute($sql);
}

function select_items_body()
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by ma_hanghoa desc limit 0,9";
	$listItems = pdo_query($sql);
	return $listItems;
}

function select_product_top10()
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by so_luot_xem desc limit 0,10";
	$listItems = pdo_query($sql);
	return $listItems;
}

function selectRooms()
{
	$sql = "SELECT * FROM phong order by ma_phong asc";
	$listRooms = pdo_query($sql);
	return $listRooms;
}

function selectEightRooms()
{
	$sql = "SELECT * FROM phong WHERE 1 order by gia asc limit 0,8";
	$list8room = pdo_query($sql);
	return $list8room;
}


function select_items_search($keyw, $ma_loai)
{
	$sql = "SELECT * FROM phong  WHERE 1 ";
	if ($keyw != "") {
		$sql .= " AND ten_phong LIKE '%" . $keyw . "%'";
	}
	if ($ma_loai > 0) {
		$sql .= " AND ma_lp='" . $ma_loai . "'";
	}
	$sql .= " order by ten_phong desc";
	$listItems = pdo_query($sql);
	return $listItems;
}

function getOneRoom($id)
{
	$sql = "SELECT * FROM phong WHERE ma_phong =" . $id;
	$room = pdo_query_one($sql);
	return $room;
}

function bothFilter($id, $sort, $min, $max)
{
	$sql = "SELECT * FROM phong";

	// Sap xep theo min, max
	if (!empty($min)) {
		$sql = "SELECT * FROM phong WHERE gia >= '$min'";
	}

	if (!empty($max)) {
		$sql = "SELECT * FROM phong WHERE gia <= '$max'";
	}

	if ((!empty($min)) && (!empty($max))) {
		$sql = "SELECT * FROM phong WHERE gia BETWEEN '$min' AND '$max'";
	}

	// Sap xep the loai vs gia tri min, max
	if (!empty($id)) {
		$sql = "SELECT * FROM phong WHERE ma_lp = '$id'";

		if (!empty($min)) {
			$sql = "SELECT * FROM phong WHERE gia > '$min' AND ma_lp = '$id' order by gia asc";
		}

		if (!empty($max)) {
			$sql = "SELECT * FROM phong WHERE ma_lp = '$id' AND gia <= '$max' order by gia asc";
		}

		if (!empty($min) && !empty($max)) {
			$sql = "SELECT * FROM phong WHERE ma_lp = '$id' AND gia BETWEEN '$min' AND '$max' order by gia asc";
		}
	}

	// Sap xep theo tang, giam dan voi min,max
	if (!empty($sort)) {
		if ($sort == 'asc') {

			$sql = "SELECT * FROM phong order by gia asc ";
			if ($id) {
				$sql = "SELECT * FROM phong WHERE ma_lp = '$id' order by gia asc";
			}

			if (!empty($min)) {
				$sql = "SELECT * FROM phong WHERE gia >= '$min' order by gia asc";
			}

			if (!empty($max)) {
				$sql = "SELECT * FROM phong WHERE gia <= '$max' order by gia asc";
			}

			if (!empty($min) && !empty($max)) {
				$sql = "SELECT * FROM phong WHERE gia BETWEEN '$min' AND '$max' order by gia asc";
			}

			if (!empty($min) && !empty($max) && $id) {
				$sql = "SELECT * FROM phong WHERE ma_lp = '$id' AND gia BETWEEN '$min' AND '$max' order by gia asc";
			}
		} else {
			$sql = "SELECT * FROM phong order by gia desc ";
			if ($id) {
				$sql = "SELECT * FROM phong WHERE ma_lp = '$id' order by gia desc";
			}

			if (!empty($min)) {
				$sql = "SELECT * FROM phong WHERE gia >= '$min' order by gia desc";
			}

			if (!empty($max)) {
				$sql = "SELECT * FROM phong WHERE gia <= '$max' order by gia desc";
			}

			if (!empty($min) && !empty($max)) {
				$sql = "SELECT * FROM phong WHERE gia BETWEEN '$min' AND '$max' order by gia desc";
			}

			if (!empty($min) && !empty($max) && $id) {
				$sql = "SELECT * FROM phong WHERE ma_lp = '$id' AND gia BETWEEN '$min' AND '$max' order by gia desc";
			}
		}
	}



	$Filter = pdo_query($sql);
	return $Filter;
}



function deleteRoom($id)
{
	$sql = "DELETE FROM phong WHERE ma_phong ='$id'";
	pdo_execute($sql);
}



function sameRoom($id)
{
	$sql = "SELECT * FROM phong  WHERE ma_lp = '$id'";
	$listSameRooms = pdo_query($sql);
	return $listSameRooms;
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