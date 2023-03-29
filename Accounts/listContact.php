<link rel="stylesheet" href="../Css/account.css">

<body>
    <h2>Danh sách tài khoản</h2>
    <table border="1" cellspacing="0">
        <tr class="row">
            <th class="type">Mã hỗ trợ</th>
            <th class="type">Tên người hỗ trợ</th>
            <th class="type">Nội dung</th>
            <th class="type">Email</th>
            <th class="type">Số điện thoại</th>
            <th class="type">Vai trò</th>
            <th class="type"></th>
            <th class="type"></th>
        </tr>

        <?php
        if (!empty($listContact)) {
            foreach ($listContact as $contact) {
                extract($contact);
                $feedback = "index.php?goto=Feedback&id=" . $ma_ht;
                $deleteAcc = "index.php?goto=deleteAcc&id=" . $ma_ht;
        ?>
                <tr class="row1">
                    <td>
                        <?= $ma_ht ?>
                    </td>
                    <td>
                        <?= $ten_ht ?>
                    </td>
                    <td>
                        <?= $noi_dung ?>
                    </td>
                    <td>
                        <?= $email ?>
                    </td>
                    <td>
                        <?= $phone ?>
                    </td>
                    <td>
                        <a href="<?= $feedback ?>">
                            <input type="button" value="feedback" class="btn-hover btn5">
                        </a>
                    </td>
                    <td>
                        <a href="<?= $deleteAcc ?>">
                            <input type="button" value="Delete" class="btn-hover btn5">
                        </a>
                    </td>
                </tr>
        <?php }
        } ?>
    </table>
</body>