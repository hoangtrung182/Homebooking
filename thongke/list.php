<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
    <h2 class="form_title">THỐNG KÊ</h2>
    <table style="text-align: center;" cellspacing="0">
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
        ?>
            <tr>
                <td class="under"><?= $malp  ?></td>
                <td class="under"><?= $tenlp  ?></td>
                <td class="under"><?= $countPhong  ?></td>
                <td class="under"><?= $mingia  ?></td>
                <td class="under"><?= $maxgia  ?></td>
                <td class="under"><?= $avggia  ?></td>
            </tr>
        <?php } ?>
    </table>
    <div>
        <a href="index.php?goto=chart" class="btn-order1">Biểu đồ</a>
    </div>
</body>