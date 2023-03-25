<?php
function selectRooms_booking()
{
    $sql = "SELECT * FROM phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp  order by ma_phong";
    $listRooms = pdo_query($sql);
    return $listRooms;
}
function Test()
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON phong.ma_phong=datphong.ma_phong  order by ma_dp";
    $listRooms = pdo_query($sql);
    return $listRooms;
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
    $result = pdo_query_one($sql);
    return $result;
}
function insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $trang_thai, $thanh_tien, $ma_tk, $ma_km)
{
    $sql = "INSERT INTO datphong(ten_kh, phone, dia_chi, ngay_dat, ngay_den, ngay_ve,trang_thai,thanh_tien,ma_tk,ma_km)
		 		VALUES ('$ten_kh', '$phone', '$dia_chi', '$ngay_dat', '$ngay_den', '$ngay_ve', '$trang_thai', '$thanh_tien', '$ma_tk', '$ma_km')";
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
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_phong=phong.ma_phong INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp ORDER BY ngay_dat DESC";
    $list = pdo_query($sql);
    return $list;
}
function showDetail_Clientbooking($ma_dp)
{
    $sql = "SELECT * FROM datphong INNER JOIN phong ON datphong.ma_hs=phong.ma_hs INNER JOIN loaiphong ON phong.ma_lp=loaiphong.ma_lp WHERE ma_dp='$ma_dp'";
    $result = pdo_query_one($sql);
    return $result;
}
function update_booking($trang_thai, $ma_dp)
{
    $sql = "UPDATE datphong SET trang_thai='$trang_thai' WHERE ma_dp= '$ma_dp'";
    pdo_execute($sql);
}
