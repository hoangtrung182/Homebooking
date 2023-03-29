<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
</head>

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
                        <tr>
                            <td><img src="../../<?= $show['avatar'] ?>" alt="" width="200px"></td>
                            <td>
                                <?= $show['ten_phong'] ?>
                            </td>
                            <td class="text1">
                                <a href="index.php?goto=show_pay&id_ct=<?= $show['ma_dp'] ?>"><button class="btn-order1">Chi
                                        tiết</button></a>
                                <a href="index.php?goto=add_pay&id_huy=<?= $show['ma_dp'] ?>"
                                    onclick=" return confirm('Bạn chắc chắn muốn hủy đặt phòng không!');"><button
                                        class="btn-order1">Hủy</button></a>
                            </td>
                            <td>
                                <?php
                                if ($show['trang_thai'] == 0) {
                                    echo "Chưa xác nhận!";
                                } else if ($show['trang_thai'] == 1) {
                                    if ($show['ngay_den'] > $date) {
                                        echo "Sắp diễn ra!";
                                    } else if ($show['ngay_den'] <= $date && $date <= $show['ngay_ve']) {
                                        echo "Đang diễn ra!";
                                    } else if ($date > $show['ngay_ve']) {
                                        echo "Đã kết thúc!";
                                    }
                                } else if ($show['trang_thai'] == 2) {
                                    echo "Đã hủy!";
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