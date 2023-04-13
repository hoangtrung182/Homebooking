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
    <div class="">
        <div>
            <h2 class="form_title">ĐƠN ĐẶT</h2>
        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Tên khách hàng</th>
                    <th>ID</th>
                    <th>Ngày đến</th>
                    <th>Ngày về</th>
                    <th>Chi tiết</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($same as $same1) {
                    extract($same1);
                    ?>
                    <tr class="list">
                        <td>
                            <?= $same1['ma_dp'] ?>
                        </td>
                        <td>
                            <?= $same1['ten_kh'] ?>
                        </td>
                        <td>
                            <?= $same1['ma_phong'] ?>
                        </td>
                        <td>
                            <?= $same1['ngay_den'] ?>
                        </td>
                        <td>
                            <?= $same1['ngay_ve'] ?>
                        </td>
                        <td class="edit">
                            <a href="index.php?goto=detailBookings&update_trangthai=<?= $same1['ma_dp'] ?>">Chi
                                tiết</a>
                        </td>
                        <td>

                            <?php

                            // date_default_timezone_set('ASIA/HO_CHI_MINH');
                            // $time_checkin = date_create($same1['ngay_den']);
                            // $time_checkout = date_create($same1['ngay_ve']);
                        
                            // $gio_den = date_format($time_checkin, 'Y-m-d G:i:s');
                            // $gio_ve = date_format($time_checkout, 'Y-m-d G:i:s');
                        
                            // $gio_hien_tai = date('Y-m-d G:i:s');
                            // $date_qua_gio = strtotime('+1 hour', strtotime($gio_ve));
                            // $date_qua_gio1 = date('Y-m-d G:i:s', $date_qua_gio);
                        
                            // $gio_them1 = $same1['them_gio'];
                            // $dat_them_gio_ve = strtotime('+' . $gio_them1 . 'hour', strtotime($gio_ve));
                            // $dat_them_gio_ve1 = date('Y-m-d G:i:s', $dat_them_gio_ve);
                        
                            if ($same1['trang_thai'] == 0) {
                                if ($same1['ngay_den'] < $date) {
                                    echo "<div class='ron1'><h5>Quá thời gian xác nhận!</h5></div>";
                                } else if ($same1['ngay_den'] >= $date) {
                                    echo "<div class='ron2'><h5>Chưa diễn ra!</h5></div>";
                                }
                            } else if ($same1['trang_thai'] == 1) {
                                if ($same1['ngay_den'] <= $date && $same1['ngay_ve'] >= $date) {
                                    echo "<div class='ron4'><h5>Đang diễn ra!</h5></div>";
                                }
                            } else if ($same1['trang_thai'] == 2) {
                                if ($same1['ngay_ve'] <= $date) {
                                    echo "<div class='ron3'><h5>Đã kết thúc!</h5></div>";
                                }

                            } else if ($same1['trang_thai'] == 3) {
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