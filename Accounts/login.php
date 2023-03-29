<div class="form-login">
    <div class="login">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/style.css">
        <title>Document</title>
        <style>
            .form-main {
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
    </head>

    <body>
        <div class="form-login">
            <div class="login">
                <?php
                if (isset($_SESSION['ten_tk'])) {
                    extract($_SESSION['ten_tk']);
                    // $ten_tk = $_POST['ten_tk'];
                    ?>
                    <ul>
                        <div>
                            <!-- <li><a href="#">Admin</a></li> -->
                            <li><a href="index.php?goto=exit">Thoát</a></li>
                            <li><a href="index.php?goto=forgetPass">Quên mật khẩu</a></li>
                        </div>
                    </ul>
                </div>
            <?php } else { ?>
                <div class="form-main">
                    <form action="index.php?goto=login" method="post">
                        <h3>Đăng nhập</h3>
                        <div class="form-info">
                            Tên đăng nhập<br>
                            <input class="input" type="text" name="ten_tk" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="form-info">
                            Mật khẩu <br>
                            <input class="input" type="password" name="pass" placeholder="Mật khẩu" required>
                        </div>
                        <input type="submit" value="Đăng nhập" name="login" class="btn6-hover btn5">
                    </form>
                    <div class="extra">
                        <a href="index.php?goto=register">Tạo tài khoản </a>
                        <a href="index.php?goto=forgetPass">Quên mật khẩu</a>
                    </div>
                    <?= isset($thongbao) ? $thongbao : '' ?>
                <?php } ?>
            </div>
        </div>
    </body>

    </html>