<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
</head>
<style>
    .add_pay td {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên phòng</th>
                    <th>Chi tiết</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['ten_tk'])) { ?>
                    <?php foreach ($shows as $show) {
                        extract($show); ?>
                        <tr class="add_pay">
                            <td><img src=".//<?= $show['avatar'] ?>" alt="" width="200px"></td>
                            <td>
                                <?= $show['ten_phong'] ?>
                            </td>
                            <td class="text1">
                                <a href="index.php?goto=show_pay&id_ct=<?= $show['ma_dp'] ?>">
                                    <button class="btn-order2">
                                        Chi tiết</button>
                                    </a>
                                <a href="index.php?goto=add_pay&id_huy=<?= $show['ma_dp'] ?>"
                                    onclick=" return confirm('Bạn chắc chắn muốn hủy đặt phòng không!');"><button
                                        class="btn-order2">Hủy</button></a>
                            </td>
                            <td>
                                <?php
                                if ($show['trang_thai'] == 0) {
                                    if ($show['ngay_den'] < $date) {
                                        echo "<div class='ron1'><h5>Đã quá thời gian xác nhận!</h5></div>";
                                    } else if ($show['ngay_den'] >= $date) {
                                        echo "<div class='ron2'><h5>Sắp diễn ra</h5></div>";
                                    }
                                } else if ($show['trang_thai'] == 1) {
                                    if ($show['ngay_den'] <= $date && $show['ngay_ve'] >= $date) {
                                        echo "<div class='ron2'><h5>Đang diễn ra!</h5></div>";

                                    }
                                } else if ($show['trang_thai'] == 2) {
                                    if ($date >= $show['ngay_ve']) {
                                        echo "<div class='ron1'><h5>Đã kết thúc!</h5></div>";
                                    }
                                } else if ($show['trang_thai'] == 3) {
                                    echo "<div class='ron1'><h5>Đã hủy!</h5></div>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else {
                    echo "Đăng nhập để xem thông tin chi tiết!";
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>