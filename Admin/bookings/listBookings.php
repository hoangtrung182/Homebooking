<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>
    .content-table {
        border-collapse: collapse;
        margin: auto;
        font-size: 0.9em;
        width: 90%;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #23958fd4;
        color: #ffffff;
        text-align: center;
        font-weight: bold;
        padding: 20px 30px;
        font-size: 18px;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
        font-size: 18px;
    }

    .edit a {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        background-color: #23958fd4;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .list td {
        text-align: center;
    }

    .ron1 h5,
    .ron3 h5 {
        color: red;
    }

    .ron2 h5 {
        color: blue;
    }

    .ron4 h5 {
        color: #009879;
    }
</style>

<body>
    <div class="container">
        <div>
            <h2 class="form_title">DANH SÁCH ĐẶT PHÒNG</h2>
        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tên loại phòng</th>
                    <th>Ngày đặt</th>
                    <!-- <th>Ngày đến</th>
                <th>Ngày về</th> -->
                    <!-- <th>Tổng tiền</th> -->
                    <th>Chi tiết</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $listBookings) {
                    extract($listBookings); ?>

                    <tr class="list">

                        <td>
                            <?= $listBookings['ten_kh'] ?>
                        </td>
                        <td>
                            <?= $listBookings['ten_phong'] ?>
                        </td>
                        <td>
                            <?= $listBookings['ngay_dat'] ?>
                        </td>
                        <td class="edit">
                            <a href="index.php?goto=detailBookings&update_trangthai=<?= $listBookings['ma_dp'] ?>">Chi
                                tiết</a>
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
    </div>
</body>

</html>