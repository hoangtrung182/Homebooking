<?php
function insertAcc($ten_tk, $email, $pass, $phone) {
    $sql = "INSERT INTO taikhoan(ten_tk,email,pass,phone) VALUES ('$ten_tk','$email','$pass','$phone')";
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
