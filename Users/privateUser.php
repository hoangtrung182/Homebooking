<style>
    .form-main {
        margin-top: 60px;
        margin-left: 25%;
        width: 524px;
        background: #fff;
        padding: 16px 24px 24px 24px;
        border: 1px solid #fff;
        box-shadow: 5px 5px 5px 5px grey;

    }

    form {
        margin: 10px;
    }

    .form-main h3 {
        text-align: center;
        font-weight: bold;
    }

    .input {
        width: 452px;
        padding: 5px;
        border-radius: 5px;
        margin-top: 5px;
        margin-bottom: 10px;
        padding: 8px;
    }

    .text {
        left: 0;
    }

    .extra {
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 200px;
    }

    .extra a {
        text-decoration: none;
        color: rgb(83, 146, 249);
    }

    .extra a:hover {
        text-decoration: underline;
        color: #cdd8fc;
    }

    .btn6-hover {
        width: 452px;
        font-size: 15px;
        font-weight: 200px;
        color: #fff;
        cursor: pointer;
        margin: 10px 0 10px 0;
        height: 45px;
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
    <div class="form-main">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            ?>
            <form action="index.php?goto=editUser" method="post">
                <h3>Hồ sơ của tôi</h3>
                <div class="form-info">
                    Tên đăng nhập <br>
                    <input class="input" type="text" disabled name="ten_tk" value="<?= $ten_tk ?>" required placeholder="Tên đăng nhập">
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" disabled name="email" value="<?= $email ?>" required placeholder="Email">
                </div>
                <div class="form-info">
                    Phone <br>
                    <input class="input" type="phone" disabled name="email" value="<?= $phone ?>" required placeholder="Email">
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn6-hover btn5" type="submit" value="Chỉnh sửa hồ sơ các nhân" name="editUser">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>