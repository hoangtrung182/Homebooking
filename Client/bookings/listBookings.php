<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/booking.css">
</head>

<body>
    <div>
        <h2 class="form_title">DANH SÁCH PHÒNG</h2>
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
            <tr>
                <td>
                    <?= $listBookings['ten_kh'] ?>
                </td>
                <td>
                    <?= $listBookings['ten_phong'] ?>
                </td>
                <td>
                    <?= $listBookings['ngay_dat'] ?>
                </td>
                <td><a href="./Client/bookings/detailBookings.php?id=<?= $listBookings['ma_dp'] ?>">Chi tiết</a></td>
                <td>
                    <?php
                    if ($listBookings['trang_thai'] == 0) {
                        if ($listBookings['ngay_den'] < $date) {
                            echo "<div class='ron1'><h4>Quá thời gian xác nhận!</h4></div>";
                        } else {
                            echo "<div class='ron1'><h4>Chưa xác nhận!</h4></div>";
                        }
                    } else if ($listBookings['trang_thai'] == 1 && $listBookings['ngay_ve'] < $date) {
                        echo "<div class='ron2'><h4>Đã kết thúc!</h4></div>";
                    } else if ($listBookings['trang_thai'] == 1 && $listBookings['ngay_den'] > $date) {
                        echo "<div class='ron2'><h4>Chưa diễn ra!</h4></div>";
                    } else if ($listBookings['trang_thai'] == 2) {
                        echo "<div class='ron1'><h4>Đã hủy!</h4></div>";
                    } else {
                        echo "<div class='ron1'><h4>Đang diễn ra!</h4></div>";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>