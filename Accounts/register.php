<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .btn6-hover {
            width: 160px;
            font-size: 15px;
            font-weight: 200px;
            color: #fff;
            cursor: pointer;
            margin: 10px 0 10px 0;
            height: 36px;
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

        .submit {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 120px;
        }
    </style>
</head>

<body>
    <div class="form-main">
        <div class="form-register">
            <form action="index.php?goto=register" method="post">
                <h3>Đăng ký</h3>
                <div class="form-info">
                    Tên đăng nhập <br>
                    <input class="input" type="text" name="ten_tk" required placeholder="Tên đăng nhập">
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" name="email" required placeholder="Email">
                </div>
                <div class="form-info">
                    Mật khẩu <br>
                    <input class="input" type="password" name="pass" required placeholder="Mật khẩu">
                </div>
                <div class="form-info">
                    Số điện thoại <br>
                    <input class="input" type="text" name="phone" placeholder="Số điện thoại">
                </div>
                <div class="submit">
                    <input class="btn6-hover btn5" type="submit" value="Đăng ký" name="btn-register">
                    <button class="btn6-hover btn5">
                        <a style="text-decoration: none;" href="index.php?goto=login">Đăng nhập</a>
                    </button>
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>

</html>