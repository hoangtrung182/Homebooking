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
            <h2 class="form_title">QUẢN LÝ ĐẶT PHÒNG</h2>
        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Tên loại phòng</th>
                    <th>Chi tiết</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($listRooms as $room) {
                    extract($room);
                    ?>
                    <tr class="list">
                        <td>
                            <?= $room['ma_phong'] ?>
                        </td>
                        <td>
                            <?= $room['ten_phong'] ?>
                        </td>
                        <td>
                            <?= $room['ten_lp'] ?>
                        </td>
                        <td>
                            <a href="index.php?goto=listBooking&id=<?= $ma_phong ?>">
                                <button class="btn-order2" type="submit">
                                    Đơn đặt
                                </button>
                            </a>
                        </td>
                    </tr>

        </div>
    <?php } ?>
    </tbody>
    </table>
    </div>
</body>

</html>