<?php
function insertNews($tieu_de, $hinh_anh, $mo_ta, $noi_dung, $ngay_dang)
{

	$sql = "INSERT INTO tintuc(tieu_de, hinh_anh, mo_ta, noi_dung, ngay_dang) VALUES ('$tieu_de', '$hinh_anh', '$mo_ta', '$noi_dung', '$ngay_dang')";
	pdo_execute($sql);
}

function selectNews()
{
	$sql = "SELECT * FROM tintuc order by ma_tt desc";
	$News = pdo_query($sql);
	return $News;
}

function getOneNews($id)
{
	$sql = "SELECT * FROM tintuc WHERE ma_tin =" . $id;
	$news = pdo_query_one($sql);
	return $news;
}

function updateNews($id, $tieu_de, $hinh_anh, $mo_ta, $noi_dung, $ngay_dang)
{
	$sql = "UPDATE tintuc SET tieu_de ='$tieu_de', hinh_anh = '$hinh_anh', mo_ta = '$mo_ta',
		 noi_dung = '$noi_dung', ngay_dang = '$ngay_dang'
		 WHERE ma_tin =" . $id;
	pdo_execute($sql);
}

function deleteNews($id)
{
	$sql = "DELETE FROM tintuc WHERE ma_tin ='$id'";
	pdo_execute($sql);
}
?>