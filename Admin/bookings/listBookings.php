<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div>
        <h2 class="form_title">DANH SÁCH ĐẶT PHÒNG</h2>
    </div>
    <table class="table" cellspacing="0">
        <thead>
            <tr>
                <th class="type">Tên khách hàng</th>
                <th class="type">Tên loại phòng</th>
                <th class="type">Ngày đến</th>
                <th class="type">Ngày về</th>
                <th class="type">Chi tiết</th>
                <th class="type">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $listBookings) {
                extract($listBookings); ?>

                <tr class="row1">

                    <td>
                        <?= $listBookings['ten_kh'] ?>
                    </td>
                    <td>
                        <?= $listBookings['ten_phong'] ?>
                    </td>
                    <td>
                        <?= $listBookings['ngay_den'] ?>
                    </td>
                    <td>
                        <?= $listBookings['ngay_ve'] ?>
                    </td>
                    <td>
                        <a href="index.php?goto=detailBookings&update_trangthai=<?= $listBookings['ma_dp'] ?>"><button class="btn btn_edit">Chi
                                tiết</button></a>
                    </td>
                    <td>
                        <?php
                        date_default_timezone_set('ASIA/HO_CHI_MINH');
                        $time_checkin = date_create($listBookings['ngay_den']);
                        $time_checkout = date_create($listBookings['ngay_ve']);

                        $gio_den = date_format($time_checkin, 'H:i:s');
                        $gio_ve = date_format($time_checkout, 'H:i:s');

                        $gio_hien_tai = date(' H:i:s');
                        $date_qua_gio = strtotime('+1 hour', strtotime($gio_ve));
                        $date_qua_gio1 = date('H:i:s', $date_qua_gio);
                        if ($listBookings['trang_thai'] == 0) {
                            if ($listBookings['ngay_den'] < $date) {
                                echo "<div class='ron1'><h5>Quá thời gian xác nhận!</h5></div>";
                            } else if ($listBookings['ngay_den'] >= $date && $gio_hien_tai < $gio_den) {
                                echo "<div class='ron2'><h5>Chưa diễn ra!</h5></div>";
                            }
                        } else if ($listBookings['trang_thai'] == 1) {
                            if ($listBookings['ngay_den'] <= $date && $listBookings['ngay_ve'] >= $date && $gio_hien_tai > $gio_den && $gio_hien_tai < $gio_ve) {
                                echo "<div class='ron4'><h5>Đang diễn ra!</h5></div>";
                            }
                        } else if ($listBookings['trang_thai'] == 2) {
                            if ($listBookings['ngay_ve'] <= $date && $gio_hien_tai > $gio_ve) {
                                echo "<div class='ron3'><h5>Đã kết thúc!</h5></div>";
                            }
                        } else if ($listBookings['trang_thai'] == 3) {
                            echo "<div class='ron1'><h5>Đã hủy!</h5></div>";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>