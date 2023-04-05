<link rel="stylesheet" href="../Css/account.css">

<body>
    <h2 class="form_title">DANH SÁCH TÀI KHOẢN</h2>
    <table border="1" cellspacing="0">
        <tr class="row">
            <th class="type">Mã khách hàng</th>
            <th class="type">Tên đăng nhập</th>
            <th class="type">Họ tên</th>
            <th class="type">Email</th>
            <th class="type">Địa chỉ</th>
            <th class="type">Số điện thoại</th>
            <th class="type">Vai trò</th>
            <th class="type" colspan="2">Thao tác</th>
            <th class="type"></th>
        </tr>

        <?php
        if (!empty($listUsers)) {
            foreach ($listUsers as $account) {
                extract($account);
                $editAcc = "index.php?goto=editUsers&id=" . $ma_tk;
                $deleteAcc = "index.php?goto=deleteAcc&id=" . $ma_tk;
        ?>
                <tr class="row1">
                    <td>
                        <?= $ma_tk ?>
                    </td>
                    <td>
                        <?= $ten_tk ?>
                    </td>
                    <td>
                        <?= $ho_ten ?>
                    </td>

                    <td>
                        <?= $email ?>
                    </td>

                    <td>
                        <?= $dia_chi ?>
                    </td>
                    <td>
                        <?= $phone ?>
                    </td>
                    <td>
                        <?= $vai_tro ?>
                    </td>
                    <td>
                        <a href="<?= $editAcc ?>">
                            <input type="button" value="Edit" class="btn btn_edit">
                        </a>
                    </td>
                    <td>
                        <a href="<?= $deleteAcc ?>">
                            <input type="button" value="Delete" class="btn btn_delete">
                        </a>
                    </td>
                </tr>
        <?php }
        } ?>
    </table>
</body>