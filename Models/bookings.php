<?php

function selectRooms_booking()
{
    $sql = "SELECT * FROM phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp  order by ma_phong";
    $listRooms = pdo_query($sql);
    return $listRooms;
}
function select_Sale($id)
{
    $sql = "SELECT * FROM taikhoan  INNER JOIN khuyenmai ON taikhoan.ma_km=khuyenmai.ma_km  WHERE ma_tk=$id";
    $result = pdo_query_one($sql);
    return $result;
}
function Client_loyal($id)
{
    $sql = "SELECT * FROM datphong  WHERE ma_tk=$id";
    $sl_don = pdo_query($sql);
    return sizeof($sl_don);
}
function getDatesFromRange($start, $end, $format = 'm-d-Y')
{
    $array = array();
    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    foreach ($period as $date) {
        $array[] = $date->format($format);
    }
    return count($array);
}
function showRoom_tm($ma_phong)
{
    $show_datphongtm = "SELECT * FROM phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp WHERE ma_phong=$ma_phong ";
    $result = pdo_query_one($show_datphongtm);
    return $result;
}

function check_datphong($id)
{
    $sql = "SELECT * FROM datphong WHERE ma_phong=$id";
    if ($sql) {
        $list = pdo_query($sql);
        return $list;
    } else {
        return [];
    }
}

function insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $trang_thai, $thanh_tien, $ma_tk, $ma_km, $ma_phong)
{
    $sql = "INSERT INTO datphong(ten_kh, phone, dia_chi, ngay_dat, ngay_den, ngay_ve, trang_thai, thanh_tien, ma_tk,ma_km, ma_phong)
            VALUES ('$ten_kh', '$phone', '$dia_chi', '$ngay_dat', '$ngay_den', '$ngay_ve', '$trang_thai', '$thanh_tien', '$ma_tk', '$ma_km','$ma_phong')";
    pdo_execute($sql);
}
function show_booking($id)
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_phong=phong.ma_phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp  WHERE ma_tk='$id' ORDER BY ngay_dat DESC";
    $list = pdo_query($sql);
    return $list;
}

function delete_booking($ma_dp)
{
    $delete_loai = "DELETE FROM datphong WHERE ma_dp='$ma_dp'";
    pdo_execute($delete_loai);
}
function show_bookingDetail($ma_dp)
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_phong=phong.ma_phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp  WHERE ma_dp='$ma_dp' ";
    $result = pdo_query_one($sql);
    return $result;
}
function listBooking()
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_phong=phong.ma_phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp";
    $list = pdo_query($sql);
    return $list;
}

function getSameOrders($ma_phong)
{
    $sql = "SELECT * FROM datphong  WHERE ma_phong='$ma_phong' ORDER BY ma_dp DESC";
    $list = pdo_query($sql);
    return $list;

}
function showDetail_Clientbooking($ma_dp)
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_phong=phong.ma_phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp WHERE ma_dp='$ma_dp'";
    $result = pdo_query_one($sql);
    return $result;
}
function update_booking($trang_thai, $ma_dp)
{
    $sql = "UPDATE datphong SET trang_thai='$trang_thai' WHERE ma_dp= '$ma_dp'";
    pdo_execute($sql);
}
function update_delay($them_gio, $thanh_tien, $ma_dp)
{
    $sql = "UPDATE datphong SET them_gio='$them_gio',thanh_tien='$thanh_tien' WHERE ma_dp= '$ma_dp'";
    pdo_execute($sql);
}
function update_taikhoan($id, $ma_km)
{
    $sql = "UPDATE taikhoan SET ma_km ='$ma_km' WHERE ma_tk ='$id'";
    pdo_execute($sql);
}

function getListBookings($id)
{
    $sql = "SELECT * FROM datphong WHERE ma_phong = '$id' order by ngay_den asc";
    $listBookings = pdo_query($sql);
    return $listBookings;
}

?>