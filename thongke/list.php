<link rel="stylesheet" href="../Css/account.css">
<<<<<<< HEAD

<body>
    <h2 class="form_title">THỐNG KÊ</h2>
=======
<link rel="stylesheet" href="../Css/list.css">


<body>
    <h2>Danh sách tài khoản</h2>
>>>>>>> 60c366168059af8333499057cd1f8501c189b388
    <table border="1" cellspacing="0">
        <tr class="row">
            <th class="type">STT</th>
            <th class="type">Loại phòng</th>
            <th class="type">Số lượng</th>
            <th class="type">Giá cao nhất</th>
            <th class="type">Giá thấp nhất</th>
            <th class="type">Giá trung bình</th>
        </tr>

        <?php
        foreach ($listtk as $tk) {
            extract($tk);
            echo '<tr>
            <td>' . $malp . '</td>
            <td>' . $tenlp . '</td>
            <td>' . $countPhong . '</td>
            <td>' . $mingia . '</td>
            <td>' . $maxgia . '</td>
            <td>' . $avggia . '</td>
            </tr>';
        } ?>
    </table>
    <div class="chart">
<<<<<<< HEAD
        <a href="index.php?goto=chart" class="btn-order1">Biểu đồ</a>
=======
        <a href="index.php?goto=chart">Biểu đồ</a>
>>>>>>> 60c366168059af8333499057cd1f8501c189b388
    </div>
</body>