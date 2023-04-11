<?php
session_start();
ob_start();
include './View/header.php';
include './Models/pdo.php';
include './Models/bookings.php';
include './Models/Categories.php';
include './Models/Rooms.php';
include './Models/accounts.php';
include './Models/news.php';
include './Models/contact.php';

if (isset($_GET['goto'])) {
	switch ($_GET['goto']) {
		// Dat phong
		case 'pays':

			if (isset($_SESSION['ten_tk'])) {
				$ten_kh = $_SESSION['ten_tk']['ten_tk'];
				$phone = $_SESSION['ten_tk']['phone'];
				$dia_chi = $_SESSION['ten_tk']['dia_chi'];
				$khuyen_mai = select_Sale($_SESSION['ten_tk']['ma_tk'])['ten_km'];
			} else {
				$ten_kh = '';
				$phone = '';
				$dia_chi = '';
				$khuyen_mai = 0;
			}

			if (isset($_SESSION['ten_tk'])) {
				if (isset($_POST['dat_phong'])) {
					$ma_kh = $_SESSION['ten_tk']['ma_tk'];
					$ngay_dat = $_SESSION['datphong']['ngay_dat'];
					$ngay_den = $_SESSION['datphong']['ngay_den'];
					$ngay_ve = $_SESSION['datphong']['ngay_ve'];
					$ma_lp = $_SESSION['datphong']['ma_lp'];
					$ma_phong = $_SESSION['datphong']['ma_phong'];
					$ten_phong = $_SESSION['datphong']['ten_phong'];
					$ten_lp = $_SESSION['datphong']['ten_lp'];
					$thanh_tien = $_SESSION['datphong']['tong_tien'];
					$ten_kh = $_POST['ten_kh'];
					$phone = $_POST['sdt'];
					$dia_chi = $_POST['dia_chi'];
					$ma_km = select_Sale($ma_kh)['ma_km'];
					$trang_thai = 0;
					$_SESSION['thanhtoan'] = [
						'ma_tk' => $ma_kh,
						'ngay_dat' => $ngay_dat,
						'ngay_den' => $ngay_den,
						'ngay_ve' => $ngay_ve,
						'ma_lp' => $ma_lp,
						'ten_phong' => $ten_phong,
						'ten_lp' => $ten_lp,
						'thanh_tien' => $thanh_tien,
						'ten_kh' => $ten_kh,
						'phone' => $phone,
						'dia_chi' => $dia_chi,
						'ma_km' => $ma_km,
						'ma_phong' => $ma_phong,
					];
					//var_dump($value);
					date_default_timezone_set('ASIA/HO_CHI_MINH');
					$date = date('Y-m-d');
					$result = check_datphong($ma_phong); // return $list;
					$book = $_SESSION['datphong'];


					if ($result == []) {
						$resert = insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $_SESSION['datphong']['ngay_den'], $_SESSION['datphong']['ngay_ve'], $trang_thai, $thanh_tien, $ma_kh, $ma_km, $ma_phong);
						$thongbao = "BẠN ĐÃ ĐẶT PHÒNG THÀNH CÔNG!";
					}

					if (!empty($result)) {

						foreach ($result as $value) {

							if ($value['ngay_ve'] < $date) {
								$resert = insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $ngay_den, $ngay_ve, $trang_thai, $thanh_tien, $ma_kh, $ma_km, $ma_phong);
								$thongbao = "BẠN ĐÃ ĐẶT PHÒNG THÀNH CÔNG!";
							}


							// Check ngày trùng
							if (($value['ngay_den'] == $book['ngay_den']) && ($value['ngay_ve'] == $book['ngay_ve'])) {
								$thongbao = "PHÒNG ĐÃ CÓ NGƯỜI ĐẶT";
								break;
							}

							// Check ngày đến
							if (($book['ngay_den'] >= $value['ngay_den']) && ($book['ngay_den'] <= $value['ngay_ve'])) {
								$thongbao = "PHÒNG KHÔNG CÓ SẴN, VUI LÒNG CHỌN PHÒNG KHÁC";
								break;
							}

							// Check ngày về
							if (($book['ngay_ve'] >= $value['ngay_den']) && ($book['ngay_ve'] <= $value['ngay_ve'])) {
								$thongbao = "PHÒNG KHÔNG CÓ SẴN, VUI LÒNG CHỌN PHÒNG KHÁC";
								break;
							}

							// Check ngày đã bị lặp
							if (($book['ngay_den'] <= $value['ngay_den']) && ($book['ngay_ve'] >= $value['ngay_ve'])) {
								$thongbao = "PHÒNG KHÔNG CÓ SẴN, VUI LÒNG CHỌN PHÒNG KHÁC";
								break;
							}
							// Thêm phòng vs trường hợp default
							if ($book) {
								$resert = insert_booking($ten_kh, $phone, $dia_chi, $ngay_dat, $book['ngay_den'], $book['ngay_ve'], $trang_thai, $thanh_tien, $ma_kh, $ma_km, $ma_phong);
								$thongbao = "BẠN ĐÃ ĐẶT PHÒNG THÀNH CÔNG !";
								break;
							}
						}
					}
				}
				$listRooms = selectRooms_booking();
			} else {
				echo '<script>alert("Vui lòng đăng nhập để đặt phòng và nhận khuyến mãi hấp dẫn!")</script>';
			}
			include './Bookings/pay.php';
			break;
		// View Hotel & Rooms
		case 'viewRooms':
			$listCates = selectCates();
			$listRooms = selectRooms();

			include './Rooms/viewRooms.php';
			break;
		// List Room booked
		case 'listRooms_booking':
			$listRooms = selectRooms_booking();
			date_default_timezone_set('ASIA/HO_CHI_MINH');
			$date = date('Y-m-d H:i:s');
			include './Bookings/listRooms.php';
			break;
		case 'detaiRooms_booking':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$oneRoom = getOneRoom($_GET['id']);
				// $thongbao_xoa = "Xóa thành công !!";
				extract($oneRoom);
			}
			$listSameRooms = sameRoom($_GET['id']);

			if (isset($_SESSION['ten_tk'])) {
				$ten_kh = $_SESSION['ten_tk']['ten_tk'];
				$phone = $_SESSION['ten_tk']['phone'];
				$dia_chi = $_SESSION['ten_tk']['dia_chi'];
			} else {
				$ten_kh = '';
				$phone = '';
				$dia_chi = '';
			}

			if (isset($_GET['id'])) {
				$maphong = $_GET['id'];
				$chitiet = showRoom_tm($_GET['id']);

				//var_dump(showRoom_tm($_GET['id']));
				if (isset($_POST['dat'])) {
					$ma_kh = '';
					$ma_km = '';
					date_default_timezone_set('ASIA/HO_CHI_MINH');
					$ngay_dat = date('Y-m-d G:i:s');
					$date_in = date_create($_POST['ngay_den']);
					$ngay_den1 = date_format($date_in, "Y-m-d 14:00:00");
					$date_out = date_create($_POST['ngay_ve']);
					$ngay_ve1 = date_format($date_out, "Y-m-d 12:00:00");

					$so_ngay = getDatesFromRange($_POST['ngay_den'], $_POST['ngay_ve']);
					//var_dump($so_ngay);
					if ($chitiet['giam_gia'] == 0) {
						$gia = $chitiet['gia'];
						if (isset($_SESSION['ten_tk'])) {
							$id_sale = $_SESSION['ten_tk']['ma_tk'];
						} else {
							$id_sale = 0;
						}

						$giam_gia_thanh_vien = select_Sale($id_sale)['sale-tv'];
						$tong_tien = ($gia * ($so_ngay - 1)) - $giam_gia_thanh_vien;



						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $ngay_den1,
							'ngay_ve' => $ngay_ve1,
							'tong_tien' => $tong_tien,
							'ma_lp' => $chitiet['ma_lp'],
							'ma_phong' => $chitiet['ma_phong'],
							'ten_lp' => $chitiet['ten_lp'],
							'avatar' => $chitiet['avatar'],
							'ten_phong' => $chitiet['ten_phong'],
							'ma_hs' => $_GET['id'],
						];
					} else {
						$gia = $chitiet['giam_gia'];
						if (isset($_SESSION['ten_tk'])) {
							$id_sale = $_SESSION['ten_tk']['ma_tk'];
						} else {
							$id_sale = 0;
						}
						$giam_gia_thanh_vien = select_Sale($id_sale)['sale-tv'];
						$tong_tien = ($gia * ($so_ngay - 1)) - $giam_gia_thanh_vien;

						date_default_timezone_set('ASIA/HO_CHI_MINH');
						$date1 = date('14:00:00');
						$date2 = date('12:00:00');

						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $ngay_den1,
							'ngay_ve' => $ngay_ve1,
							'tong_tien' => $tong_tien,
							'ma_lp' => $chitiet['ma_lp'],
							'ma_phong' => $chitiet['ma_phong'],
							'ten_lp' => $chitiet['ten_lp'],
							'avatar' => $chitiet['avatar'],
							'ten_phong' => $chitiet['ten_phong'],
							'ma_hs' => $_GET['id'],
						];
						//var_dump($_SESSION['datphong']);
					}

					if ($_POST['ngay_den'] == '' || $_POST['ngay_ve'] == '' || strtotime($_POST['ngay_den']) >= strtotime($_POST['ngay_ve']) || $_POST['ngay_den'] < $ngay_dat) {
						$thongbao = "Vui lòng chọn lại thời gian!";
					} else {
						//include 'Client/bookings/pay.php';
						header('Location: index.php?goto=pays');
						exit();
					}
				}
			}
			include './Bookings/detailRooms.php';
			break;
		case 'pay':
			include './Bookings/pay.php';
			break;
		case 'add_pay':
			if (isset($_SESSION['ten_tk'])) {
				$ma_kh = $_SESSION['ten_tk']['ma_tk'];
				date_default_timezone_set('ASIA/HO_CHI_MINH');
				$date = date('Y-m-d G:i:s');
				$shows = show_booking($ma_kh);

				foreach ($shows as $show) {
					if (isset($_GET['id_huy'])) {
						if ($show['trang_thai'] == 1 && $show['ngay_den'] > $date || $show['trang_thai'] == 0) {
							delete_booking($_GET['id_huy']);
						}
					}
				}

			} else {
				$shows = '';
			}
			include './Bookings/add_pay.php';
			break;
		case 'show_pay':
			$date = date('Y-m-d G:i:s');

			if (isset($_GET['id_ct'])) {
				$ma_dp = $_GET['id_ct'];
				$listPay = show_bookingDetail($ma_dp);
			}
			include './Bookings/show_pay.php';
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
			if (isset($_POST['btn-register']) && ($_POST['btn-register'])) {
				// $hoten = $_POST['Ho_ten'];
				$ten_tk = $_POST['ten_tk'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$phone = $_POST['phone'];
				// $address = $_POST['dia_chi'];
				insertAcc($ten_tk, $email, $pass, $phone);
				echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
				header('location: index.php?goto=login');
			}
			include './Accounts/register.php';
			break;
		//End register
		case 'login':
			if (isset($_POST['login']) && ($_POST['login'])) {
				$ten_tk = $_POST['ten_tk'];
				$pass = $_POST['pass'];
				$checkAcc = checkAccount($ten_tk, $pass);

				if (is_array($checkAcc)) {
					$_SESSION['ten_tk'] = $checkAcc;
					header('location: index.php');
					echo '<script> alert("Đăng nhập thành công!") </script>';

					if ($_SESSION['ten_tk']['vai_tro'] == 1) {
						header('location: Admin/index.php');
						return $_SESSION['ten_tk'];
						// echo '<script> alert("Đăng nhập thành công!") </script>';
					} else {
						header('location: index.php');
						return $_SESSION['ten_tk'];
					}
					// echo '<script> alert("Đăng nhập thành công!") </script>';
				} else {
					echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
					// $thongbao = "Tai khoan khong ton tai";
				}
			}
			include './Accounts/login.php';
			break;
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
		case 'changepassword':
			if (isset($_POST['doimatkhau']) && $_POST['doimatkhau']) {
				$id = $_POST['id'];
				$ten_tk = $_POST['ten_tk'];
				$oldpass = $_POST['oldpass'];
				$newpass1 = $_POST['newpass1'];
				$newpass2 = $_POST['newpass2'];

				if ($oldpass === $_SESSION['ten_tk']['pass']) {
					if ($newpass1 === $newpass2) {
						update_mk($id, $newpass2);
						$_SESSION['ten_tk'] = checkAccount($ten_tk, $newpass2);
						$thongbao = "Đổi mật khẩu thành công!";
						header('location: index.php?goto=exit');
					} else {
						$thongbaodung = "Mật khẩu mới không trùng khớp";
					}
				} else {
					$thongbaodung = "Nhập sai mật khẩu cũ";
				}
			}
			include './Accounts/changepw.php';
			break;
		// THông tin cá nhân
		case 'editUser':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$user = getOneAccount($_GET['id']);
			}
			include './Users/updateUser.php';
			break;
		case 'updateUser':
			if (isset($_POST['updateUser']) && $_POST['updateUser']) {
				$ma_tk = $_POST['ma_tk'];
				$ho_ten = $_POST['ho_ten'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$dia_chi = $_POST['dia_chi'];
				$anh_dai_dien = isset($_FILES['avatar']) ? $_FILES['avatar'] : '';
				$save_url = '';
				if ($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
					$photo_folder = './img/';
					$photo_file = uniqid() . $anh_dai_dien['name'];

					$file_se_luu = $anh_dai_dien['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				update_user($ma_tk, $ho_ten, $email, $phone, $dia_chi, $save_url);
				$_SESSION['ten_tk'] = checkAccount($ten_tk, $pass);
				header('location: index.php?goto=login');
			}
			include './Users/updateUser.php';
			break;
		case 'btn_contact':
			include './Contact/contact.php';
			break;
		case 'btnContact':
			if (isset($_POST['btn_contact']) && ($_POST['btn_contact'])) {
				$ten_ht = $_POST['ten_ht'];
				$ma_tk = $_POST['ma_tk'];
				$noi_dung = $_POST['noi_dung'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				insertContact($ten_ht, $ma_tk, $email, $noi_dung, $phone);
				echo '<script>alert("Cảm ơn bạn đã góp ý")</script>';
				// $thongbao = "Them"

			}
			include './Contact/contact.php';
			break;
		default:
		# code...
	}
} else if (isset($_GET['search'])) {
	switch ($_GET['search']) {
		case 'typerooms':
			$id = isset($_POST['loaiphong']) ? $_POST['loaiphong'] : 0;
			$Price = isset($_POST['price_chose']) ? $_POST['price_chose'] : '';
			$err = array();

			if (!empty($_POST['price-min']) && ($_POST['price-min'] < 0)) {
				$err['min'] = "Nhập giá trị không hợp lệ!";
			} else {
				isset($_POST['price-min']) ? $_POST['price-min'] : 0;
			}

			if (!empty($_POST['price-max']) && ($_POST['price-max'] < 0)) {
				$err['max'] = "Nhập giá trị không hợp lệ!!";
			} else {
				isset($_POST['price-max']) ? $_POST['price-max'] : 0;
			}
			$Price_min = isset($_POST['price-min']) ? $_POST['price-min'] : 0;
			$Price_max = isset($_POST['price-max']) ? $_POST['price-max'] : 0;

			if (empty($err)) {
				$BothFiltered = bothFilter($id, $Price, $Price_min, $Price_max);
			}

			$listCates = selectCates();

			include './Rooms/roomsSearch.php';
			break;
		default:
			# code...
			break;
	}
} else {
	$listCates = selectCates();
	$list8rooms = selectEightRooms();
	include './View/body.php';
}
include './View/footer.php';