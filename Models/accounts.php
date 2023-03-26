<?php
function selectAcc()
{
    $sql = "SELECT * FROM taikhoan order by ma_tk asc";
    $listRooms = pdo_query($sql);
    return $listRooms;
}
function loadAll_acc()
{
    $sql = "SELECT *FROM taikhoan order by ma_tk desc";
    $listAcc = pdo_query($sql);
    return $listAcc;
}
function insertAcc($ten_tk, $email, $pass, $phone)
{
    $sql = "INSERT INTO taikhoan(ten_tk,email,pass,phone) VALUES ('$ten_tk','$email','$pass','$phone')";
    pdo_execute($sql);
}
function checkAccount($ten_tk, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE ten_tk='" . $ten_tk . "' AND pass ='" . $pass . "'";
    $check = pdo_query_one($sql);
    return $check;
}
function checkPass($ten_tk)
{
    $sql = "SELECT * FROM taikhoan WHERE ten_tk='" . $ten_tk . "'";
    $check = pdo_query_one($sql);
    return $check;
}
function getOneAcc($ma_tk)
{
    $sql = "SELECT * FROM phong WHERE ma_tk =" . $ma_tk;
    $acc = pdo_query_one($sql);
    return $acc;
}
function update_acc($ma_tk, $ten_tk, $email, $phone, $vai_tro)
{
    $sql = "UPDATE taikhoan SET ten_tk ='$ten_tk', email = '$email',
		phone = '$phone', vai_tro = '$vai_tro'  
		 WHERE ma_tk ='$ma_tk'";
    pdo_execute($sql);
}
function delete_acc($ma_tk)
{
    $sql = "DELETE FROM taikhoan WHERE ma_tk =" . $ma_tk;
    pdo_execute($sql);
}
function load_taikhoan()
{
    $sql = "SELECT * from taikhoan order by ma_tk asc";
    $listUsers = pdo_query($sql);
    return $listUsers;
}
