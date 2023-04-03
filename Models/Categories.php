<?php
function insertCate($ten_loai) {
	$sql = "INSERT INTO loaiphong(ten_lp) VALUES ('$ten_loai')";
	pdo_execute($sql);
}

function selectCates() {
	$sql = "SELECT * FROM loaiphong order by ma_lp";
	$listCates = pdo_query($sql);
	return $listCates;
}

function deleteCate($id) {
	$sql = "DELETE FROM loaiphong WHERE ma_lp =" . $id;
	pdo_execute($sql);
}

function getOneItem($id) {
	$sql = "SELECT * FROM loaiphong WHERE ma_lp =" . $id;
	$item = pdo_query_one($sql);
	return $item;
}

function updateCate($id, $name) {
	$sql = "UPDATE loaiphong SET ten_lp ='$name' WHERE ma_lp ='$id'";
	pdo_execute($sql);
}

function getNameItem($id) {
	if ($id > 0) {
		$sql = "SELECT * FROM loaiphong WHERE ma_lp =" . $id;
		$cateName = pdo_query_one($sql);
		// extract($dm);
		return $cateName;
	}
}

?>