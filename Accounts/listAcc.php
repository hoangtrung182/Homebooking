<style>
    .btn6-hover {
        width: 52px;
        font-size: 15px;
        font-weight: 200px;
        color: #fff;
        cursor: pointer;
        margin: 10px 0 10px 0;
        height: 35px;
        border-radius: 3px;
        border: #fff;
        text-align: center;
        background-size: 200% 100%;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .btn6-hover:hover {
        background-position: 100% 0;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .btn6-hover:focus {
        outline: none;
    }

    .btn6-hover.btn5 {
        background-image: linear-gradient(to right,
                #25aae1,
                #4481eb,
                #04befe,
                #3f86ed);
        box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
    }
</style>

<body>

    <h2>Danh sách tài khoản</h2>
    <table border="1" cellspacing="0">
        <tr class="row">
            <!-- <th class="type"></th> -->
            <th class="type">Mã khách hàng</th>
            <th class="type">Tên đăng nhập</th>
            <th class="type">Email</th>
            <th class="type">Mật khẩu</th>
            <th class="type">Số điện thoại</th>
            <th class="type">Vai trò</th>
            <th class="type"></th>
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
                        <?= $email ?>
                    </td>

                    <td>
                        <?= $pass ?>
                    </td>
                    <td>
                        <?= $phone ?>
                    </td>
                    <td>
                        <?= $vai_tro ?>
                    </td>
                    <td>
                        <a href="<?= $editAcc ?>">
                            <input type="button" value="Edit" class="btn6-hover btn5">
                        </a>
                    </td>
                    <td>
                        <a href="<?= $deleteAcc ?>">
                            <input type="button" value="Delete" class="btn6-hover btn5">
                        </a>
                    </td>
                </tr>
        <?php }
        } ?>
    </table>
    </table>
</body>