<?php
session_start();
ob_start();
include './View/header.php';
include './Models/pdo.php';
include './Models/bookings.php';
include './Models/Categories.php';
include './Models/Rooms.php';
include './Models/News.php';
include './Models/accounts.php';

if (isset($_GET['goto'])) {
	switch ($_GET['goto']) {
		// Dat phong
		case 'pays':
			if (isset($_SESSION['ten_tk'])) {
				$ten_kh = $_SESSION['ten_tk']['ten_tk'];
				$phone = $_SESSION['ten_tk']['phone'];
				// $dia_chi = $_SESSION['ten_tk']['dia_chi'];
			} else {
				$ten_kh = '';
				$phone = '';
				$dia_chi = '';
			}
			if (isset($_SESSION['ten_tk'])) {
				if (isset($_POST['dat_phong'])) {
					$ma_kh = $_SESSION['ten_tk']['ma_kh'];
					$ngay_dat = $_SESSION['datphong']['ngay_dat'];
					$ngay_den = $_SESSION['datphong']['ngay_den'];
					$ngay_ve = $_SESSION['datphong']['ngay_ve'];
					$ma_lp = $_SESSION['datphong']['ma_lp'];
					$ma_phong = $_SESSION['datphong']['ma_phong'];
					$ten_phong = $_SESSION['datphong']['ten_phong'];
					$ten_lp = $_SESSION['datphong']['ten_lp'];
					$thanh_tien = $_SESSION['datphong']['thanh_tien'];
					$ten_kh = $_POST['ten_kh'];
					$phone = $_POST['phone'];
					$dia_chi = $_POST['dia_chi'];
					$ma_km = '1';
					$trang_thai = 0;
					$_SESSION['thanhtoan'] = [
						'ma_kh' => $ma_kh,
						'ngay_dat' => $ngay_dat,
						'ngay_den' => $ngay_den,
						'ngay_ve' => $ngay_ve,
						'ma_lp' => $ma_lp,
						'ten_phong' => $ten_phong,
						'ten_lp' => $ten_lp,
						'thanh_tien' => $thanh_tien,
						'ten_kh' => $ten_kh,
						'phone' => $sdt,
						'dia_chi' => $dia_chi,
						'ma_km' => $ma_km,
					];
					$result = check_datphong($ma_phong);
					//var_dump($result);
					date_default_timezone_set('ASIA/HO_CHI_MINH');
					$date = date('Y-m-d');
					if ($result == '') {
						$resert = insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $trang_thai, $thanh_tien, $ma_tk, $ma_km);
					} else if ($resert != '') {
						if ($result['ngay_ve'] < $date) {
							$resert = insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $trang_thai, $thanh_tien, $ma_tk, $ma_km);
						} else {
							$thongbao = "Bạn đang ở phòng này!";
						}
					} else {
						$thongbao = "Bạn đã đặt phòng này rồi!";
					}
				}
			}
			$listRooms = selectRooms();
			include './Client/bookings/listRooms.php';
			break;
		case 'viewRooms':
			$listCates = selectCates();
			$listRooms = selectRooms();

			include './Rooms/viewRooms.php';
			break;
			// Tin tuc
		case 'viewNews': 
			$listNews = selectNews();
			include './News/viewNews.php';
			break;
		case 'detailnew':  	
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$new = getOneNews($_GET['id']);
			}
			include './News/detailnew.php';
			break;
		// End News

		case 'register':
			if (isset($_POST['btn_register']) && ($_POST['btn_register'])) {
				$hoten = $_POST['ho_ten'];
				$ten_tk = $_POST['ten_tk'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$phone = $_POST['phone'];
				insertAcc($hoten, $ten_tk, $email, $pass, $phone);
				echo '<script> alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập") </script>';
			}
			include './Accounts/register.php';
			break;
			//End register
		case 'login':
			include './Accounts/login.php';

			if (isset($_POST['login']) && ($_POST['login'])) {
				$ten_tk = $_POST['ten_tk'];
				$pass = $_POST['pass'];
				$checkAcc = checkAccount($ten_tk, $pass);
				if (is_array($checkAcc)) {
					// header('location: index.php');
					$_SESSION['ten_tk'] = $checkAcc;

					// header('location:index.php');
					// echo '<script> alert("Đăng nhập thành công!") </script>';

					if ($_SESSION['ten_tk']['vai_tro'] === 1) {
						header('location: Admin/index.php');
						return $_SESSION['ten_tk'];
						echo '<script> alert("Đăng nhập thành công!") </script>';
					} else {
						header('location: index.php');
						return $_SESSION['ten_tk'];
						echo '<script> alert("Đăng nhập thành công!") </script>';
					}
					// echo '<script> alert("Đăng nhập thành công!") </script>';
				} else {
					echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
					// $thongbao = "Tai khoan khong ton tai";
					header('location: index.php');
				}
			}
			// include './Accounts/login.php';
			break;
			//End login
		case 'exit':
			session_unset();
			header('location: index.php');
			break;
			//End logout
		case 'forgetPass':
			if (isset($_POST['forgetPass']) && ($_POST['forgetPass'])) {
				$ten_tk = $_POST['ten_tk'];
				$checkPass = checkPass($ten_tk);
				if (is_array($checkPass)) {
					$thongbao = "Mật khẩu của bạn là " . $checkPass['pass'];
				} else {
					$thongbao = "Tài khoản không tồn tại";
				}
			}
			include './Accounts/ForgetPass.php';
			break;
		default:
		# code...
	}
}else if(isset($_GET['search'])) {
	switch ($_GET['search']) {
		case 'rooms':
			if (isset($_POST['searchRooms']) && $_POST['searchRooms']) {
				$keyw = $_POST['keyw'];
				$ma_lp = $_POST['ma_lp'];
			} else {
				$keyw = "";
				$ma_lp = 0;
			}

			$listRooms = select_items_search($keyw, $ma_lp);
			$listCates = selectCates();
			include '../Rooms/listRooms.php';
			break;
		case 'typerooms':
			$id = isset($_POST['loaiphong']) ? $_POST['loaiphong'] : 0;
			$Price = isset($_POST['price_chose']) ? $_POST['price_chose'] : '';
			$err = array();

			if(!empty($_POST['price-min']) && ($_POST['price-min'] < 0)) {
				$err['min'] = "Nhap gia tri khong hop ly !!";
			}else {
				isset($_POST['price-min']) ? $_POST['price-min'] : 0;
			}

			if(!empty($_POST['price-max']) && ($_POST['price-max'] < 0)) {
				$err['max'] = "Nhap gia tri khong hop ly !!";
			}else {
				isset($_POST['price-max']) ? $_POST['price-max'] : 0;
			}
			$Price_min = isset($_POST['price-min']) ? $_POST['price-min'] : 0;
			$Price_max = isset($_POST['price-max']) ? $_POST['price-max'] : 0;

			if(empty($err)) {
				$BothFiltered = bothFilter($id, $Price, $Price_min, $Price_max);
			}

			$listCates = selectCates();

			include './Rooms/roomsSearch.php';
			break;
		default:
			# code...
			break;
	}
}else {
	$listCates = selectCates();
	// $listRooms = selectRooms();
	$list8rooms = selectEightRooms();
	include './View/body.php';
}

include './View/footer.php';
