<?php

function selectAcc() {
    $sql = "SELECT * FROM taikhoan order by ma_tk asc";
    $listRooms = pdo_query($sql);
    return $listRooms;
}

function loadAll_acc() {
    $sql = "SELECT *FROM taikhoan order by ma_tk desc";
    $listAcc = pdo_query($sql);
    return $listAcc;
}
function insertAcc($ten_tk, $email, $pass, $phone) {
    $sql = "INSERT INTO taikhoan(ten_tk, email, pass, phone) VALUES ('$ten_tk','$email','$pass','$phone')";
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

function update_mk($id, $pass) {
    $sql = "UPDATE taikhoan SET  pass = '$pass' 
         WHERE ma_tk ='$id'";
    pdo_execute($sql);
}

function getOneAcc($ma_tk) {
    $sql = "SELECT * FROM phong WHERE ma_tk =" . $ma_tk;
    $acc = pdo_query_one($sql);
    return $acc;
}

function update_accs($ma_tk, $ten_tk, $ho_ten, $email, $phone, $vai_tro) {
    $sql = "UPDATE taikhoan SET ten_tk ='$ten_tk',ho_ten ='$ho_ten', email = '$email',phone = '$phone', vai_tro = '$vai_tro'  
         WHERE ma_tk ='$ma_tk'";
    pdo_execute($sql);
}
function update_acc($ma_tk, $ten_tk, $email, $phone, $vai_tro) {
    $sql = "UPDATE taikhoan SET ten_tk ='$ten_tk', email = '$email',phone = '$phone', vai_tro = '$vai_tro'  
         WHERE ma_tk ='$ma_tk'";
    pdo_execute($sql);
}
function update_user($ma_tk, $ho_ten, $email, $phone, $dia_chi, $hinh_anh) {
    if ($hinh_anh != "")
        $sql = "UPDATE taikhoan SET ho_ten ='$ho_ten', email = '$email', phone = '$phone', dia_chi='$dia_chi' , avatar='$hinh_anh' 
    WHERE ma_tk ='$ma_tk'";
    else
        $sql = "UPDATE taikhoan SET ho_ten ='$ho_ten', email = '$email',phone = '$phone',dia_chi='$dia_chi'  
         WHERE ma_tk ='$ma_tk'";
    pdo_execute($sql);
}
function delete_acc($ma_tk) {
    $sql = "DELETE FROM taikhoan WHERE ma_tk =" . $ma_tk;
    pdo_execute($sql);
}
function load_taikhoan() {
    $sql = "SELECT * from taikhoan order by ma_tk asc";
    $listUsers = pdo_query($sql);
    return $listUsers;
}

function getOneAccount($id) {
    $sql = "SELECT * FROM taikhoan WHERE ma_tk = '$id'";
    $user = pdo_query_one($sql);
    return $user;
}
