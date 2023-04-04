<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/booking.css">
    <title>Danh sách đặt phòng</title>
</head>

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
                    <th>Ngày đến</th>
                    <th>Ngày về</th>
                    <th>Chi tiết</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listBookings as $listOrders) {
                    extract($listOrders); ?>
                    <tr class="list">
                        <td>
                            <?= $listOrders['ten_kh'] ?>
                        </td>
                        <td>
                            <?= $listOrders['ten_phong'] ?>
                        </td>
                        <td>
                            <?= $listOrders['ngay_den'] ?>
                        </td>
                        <td>
                            <?= $listOrders['ngay_ve'] ?>
                        </td>
                        <td class="edit">
                            <a href="index.php?goto=detailBookings&update_trangthai=<?= $listOrders['ma_dp'] ?>">Chi
                                tiết</a>
                        </td>
                        <td>
                            <?php
                            if ($listOrders['trang_thai'] == 0) {
                                if ($listOrders['ngay_den'] < $date) {
                                    echo "<div class='ron1'><h5>Quá thời gian xác nhận!</h5></div>";
                                } else {
                                    echo "<div class='ron1'><h5>Chưa xác nhận!</h5></div>";
                                }
                            } else if ($listOrders['trang_thai'] == 1 && $listOrders['ngay_ve'] < $date) {
                                echo "<div class='ron3'><h5>Đã kết thúc!</h5></div>";
                            } else if ($listOrders['trang_thai'] == 1 && $listOrders['ngay_den'] > $date) {
                                echo "<div class='ron2'><h5>Chưa diễn ra!</h5></div>";
                            } else if ($listOrders['trang_thai'] == 2) {
                                echo "<div class='ron1'><h5>Đã hủy!</h5></div>";
                            } else {
                                echo "<div class='ron4'><h5>Đang diễn ra!</h5></div>";
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