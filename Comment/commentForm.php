<?php
include '../Models/pdo.php';
include '../Models/Binhluan.php';
include '../Models/accounts.php';
session_start();
$ma_lp = $_REQUEST['ma_lp'];
$list_bl = selectList_comments($ma_lp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binh Luan</title>
    <link rel="stylesheet" href="../Css/detail.css">
</head>
<body>
    <div class="main-comment">
        <h3 class="main-comment__title">BÌNH LUẬN</h3>
        <div class="binhluan">
            <ul class="comments-list__menu">
                <?php
                foreach ($list_bl as $bl) {  
                    extract($bl); ?>
                    <?php
                        $user = getOneAccount($ma_tk);
                        extract($user);
                    ?>
                    <li class="list-comment">
                        <ul>
                            <li><h4 class="comment-name"><?= $ho_ten ?></h4></li>
                            <li>
                                <div class="row-in-comment">
                                    <p><?= $noi_dung ?></p>
                                    <p><?= $thoi_gian ?></p>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } 
                ?>
            </ul>
        </div>
        <div>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="malp" hidden value="<?= $ma_lp ?>">
                <textarea class="list-comment" cols="102" rows="4" placeholder="Hãy bình luận gì đó..." name="mess"></textarea>
                <input type="submit" class="btn" value="Gửi bình luận" name="btnComment">
            </form>
        </div>
        <?php
        if (isset($_POST['btnComment']) && $_POST['btnComment']) {
            if(isset($_SESSION['ten_tk'])) {
                $ma_lp = $_POST['malp'];
                $noi_dung = $_POST['mess'];
                $ma_khach_hang = $_SESSION['ten_tk']['ma_tk'];
                date_default_timezone_set('ASIA/HO_CHI_MINH');
                $ngay_dat = date('H:i:s - Y/m/d');

                if($noi_dung !== '') {
                    insert_comments($noi_dung, $ma_khach_hang, $ma_lp, $ngay_dat);
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }else {
                echo '<script>alert("Vui lòng đăng nhập để bình luận!")</script>';
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } ?>
    </div>
</body>

</html>