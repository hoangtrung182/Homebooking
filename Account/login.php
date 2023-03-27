<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./Css/booking.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<?php
include '../Models/pdo.php';
include '../Models/bookings.php';
session_start();
if (isset($_POST['click'])) {
    $email = $_POST['email'];
    $pass = $_POST['mat_khau'];
    $user = check_client($email, $pass);

    if (is_array($user)) {
        $_SESSION['user'] = $user;

        if ($_SESSION['user']['vai_tro'] == 1) {
            header("Location:../Admin/admin.php");
        } else {
            // var_dump($_SESSION['user']);
            //include 'Client/index1.php';
            header("Location:../Client/index1.php");
            exit();
        }
    }
}
?>

<body>
    <main>
        <form action="" class="form-sign-in" method="post">
            <div class="text-title">
                <h2>Đăng nhập</h2>

            </div>
            <div class="input-email">
                <input type="email" placeholder="Địa chỉ email" name="email" id="email">
                <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div class="input-password">
                <input type="password" placeholder="Mật khẩu" name="mat_khau" id="mat_khau">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <button type="submit" class="btn-sign-in" name="click">Đăng nhập</button>

        </form>

    </main>

</html>