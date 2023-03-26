<?php
function insertAcc($hoten, $ten_tk, $email, $pass, $phone) {
    $sql = "INSERT INTO taikhoan(Ho_ten, ten_tk, email, pass, phone) VALUES ('$hoten','$ten_tk','$email','$pass','$phone')";
    pdo_execute($sql);
}
function checkAccount($ten_tk, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE ten_tk='" . $ten_tk . "' AND pass ='" . $pass . "'";
    $check = pdo_query_one($sql);
    return $check;
}
function checkPass($ten_tk) {
    $sql = "SELECT * FROM taikhoan WHERE ten_tk='" . $ten_tk . "'";
    $check = pdo_query_one($sql);
    return $check;
}

function getOneAccount($id) {
	$sql = "SELECT * FROM taikhoan WHERE ma_tk = '$id'";
	$user = pdo_query_one($sql);
	return $user;
}