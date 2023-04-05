<?php
function loadAll_thongke()
{
    $sql = "SELECT loaiphong.ma_lp as malp, loaiphong.ten_lp as tenlp, count(phong.ma_phong) as countPhong, min(phong.gia)as mingia,max(phong.gia) as maxgia,avg(phong.gia) as avggia
     FROM phong left join loaiphong on loaiphong.ma_lp = phong.ma_lp ";
    $sql .= "group by loaiphong.ma_lp order by loaiphong.ma_lp desc";
    $listtk = pdo_query($sql);
    return $listtk;
}