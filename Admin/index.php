<?php
session_start();
ob_start();
include './admin.php';
include '../Models/pdo.php';
include '../Models/Categories.php';
include '../Models/Rooms.php';
include '../Models/bookings.php';
include '../Models/news.php';
include '../Models/accounts.php';
include '../Models/thongke.php';
include '../Models/contact.php';
include '../Models/Binhluan.php';

if (isset($_GET['goto'])) {
	switch ($_GET['goto']) {
		// Categories - Loại Phòng
		case 'listCates':
			$listCates = selectCates();
			include '../Categories/listCates.php';
			break;
		case 'addCate1':
			include '../Categories/addCate.php';
			break;
		case 'addCate2':
			if (isset($_POST['addNewCate']) && $_POST['addNewCate']) {
				$ten_lp = $_POST['tenloai'];
				insertCate($ten_lp);
				$thongbao = "Thêm mới loại phòng thành công!";
			}
			$listCates = selectCates();
			include '../Categories/listCates.php';
			break;
		case 'deleteCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteCate($_GET['id']);
				$thongbao_xoa = "Xóa thành công !!";
			}

			$listCates = selectCates();
			include '../Categories/listCates.php';
			break;
		case 'editCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = getOneItem($_GET['id']);
			}
			include '../Categories/updateCate.php';
			break;
		case 'editedCate':
			if (isset($_POST['updateCate']) && $_POST['updateCate']) {
				$id = $_POST['id'];
				$ten_lp = $_POST['tenloai'];
				updateCate($id, $ten_lp);
				$thongbao = "Cập nhật loại phòng thành công!";
			}
			$listCates = selectCates();
			include '../Categories/listCates.php';
			break;
		// Rooms -- Phòng Ở
		case 'listRooms':
			$listRooms = selectRooms();
			$listCates = selectCates();
			include '../Rooms/listRooms.php';
			break;
		case 'addRooms1':
			$listCates = selectCates();
			include '../Rooms/addRoom.php';
			break;
		case 'addRoom':
			if (isset($_POST['addNewRoom']) && $_POST['addNewRoom']) {
				$ten_loai = $_POST['name'];
				$gia = $_POST['price'];
				$discount = $_POST['discount'];
				$mota = $_POST['desc'];
				$ma_loai = $_POST['maloai'];

				$anh_dai_dien = isset($_FILES['avatar']) ? $_FILES['avatar'] : '';
				$save_url = '';
				if ($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
					$photo_folder = '../img/';
					$photo_file = uniqid() . $anh_dai_dien['name'];

					$file_se_luu = $anh_dai_dien['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}

				insertRoom($ten_loai, $gia, $discount, $save_url, $mota, $ma_loai);
				$thongbao = "Thêm mới phong thành công !";
			}
			$cate = getOneItem($ma_loai);
			$listRooms = selectRooms();
			include '../Rooms/listRooms.php';
			break;
		case 'deleteRoom':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteRoom($_GET['id']);
				$thongbao_delete = "Xóa thành công !!";
			}

			$listRooms = selectRooms();
			include '../Rooms/listRooms.php';
			break;
		case 'editRoom':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$room = getOneRoom($_GET['id']);
			}

			$listCates = selectCates();
			include '../Rooms/updateRoom.php';
			// include './Product/list.php';
			break;
		case 'editedRoom':
			if (isset($_POST['updateRoom']) && $_POST['updateRoom']) {
				$id = $_POST['id'];
				$ten_loai = $_POST['name'];
				$gia = $_POST['price'];
				$discount = $_POST['discount'];
				$mota = $_POST['desc'];
				$ma_loai = $_POST['maloai'];

				$anh_dai_dien = isset($_FILES['avatar']) ? $_FILES['avatar'] : '';
				$save_url = '';
				if ($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
					$photo_folder = '../img/';
					$photo_file = uniqid() . $anh_dai_dien['name'];

					$file_se_luu = $anh_dai_dien['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				updateRoom($id, $ten_loai, $gia, $discount, $save_url, $mota, $ma_loai);
				$thongbao_update = "Cập nhật lại phòng thành công!";
			}
			$listRooms = selectRooms();
			include '../Rooms/listRooms.php';
			break;
		// Dat phong
		case 'listBooking':
			date_default_timezone_set('ASIA/HO_CHI_MINH');
			$date = date('Y-m-d H:i:s');
			$list = listBooking();
			include './bookings/listBookings.php';
			break;
		case 'detailBookings':
			date_default_timezone_set('ASIA/HO_CHI_MINH');
			$date = date('Y-m-d H:i:s');

			if (isset($_GET['update_trangthai'])) {
				$ma_dp = $_GET['update_trangthai'];
				$show = showDetail_Clientbooking($ma_dp);
				date_default_timezone_set('ASIA/HO_CHI_MINH');
				$date = date('Y-m-d H:i:s');
			}

			$time_checkin = date_create($show['ngay_den']);
			$time_checkout = date_create($show['ngay_ve']);

			$gio_den = date_format($time_checkin, 'H:i:s');
			$gio_ve = date_format($time_checkout, 'H:i:s');

			$gio_hien_tai = date(' H:i:s');
			$date_qua_gio = strtotime('+1 hour', strtotime($gio_ve));
			$date_qua_gio1 = date('H:i:s', $date_qua_gio);

			if (isset($_GET['id_checkin'])) {
				if ($show['trang_thai'] == 0 && $show['ngay_den'] > $date) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 3) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 2) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 0 && $show['ngay_den'] == $date && $gio_den <= $date_qua_gio1) {
					$trang_thai = 1;
					$ma_dp = $_GET['id_checkin'];
					update_booking($trang_thai, $ma_dp);
					header("Location:index.php?goto=listBooking");
					exit();
				}
			}
			if (isset($_GET['id_checkout'])) {
				if ($show['trang_thai'] == 0) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 3) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 1 && $show['ngay_ve'] == $date && $gio_hien_tai >= $gio_ve) {
					$trang_thai = 2;
					$ma_dp = $_GET['id_checkout'];
					update_booking($trang_thai, $ma_dp);
					header("Location:index.php?goto=listBooking");
					exit();
				}
			}
			if (isset($_GET['huy'])) {
				if ($show['trang_thai'] == 1 && $show['ngay_den'] <= $date) {
					header("Location:index.php?goto=listBooking");
				} elseif ($show['trang_thai'] == 0 && $show['ngay_den'] <= $date) {
					header("Location:index.php?goto=listBooking");
				} else if ($show['trang_thai'] == 2) {
					header("Location:index.php?goto=listBooking");
				} else {
					$trang_thai = 3;
					$ma_dp = $_GET['huy'];
					update_booking($trang_thai, $ma_dp);
					header("Location:index.php?goto=listBooking");
				}
			}

			include './bookings/detailBookings.php';
			break;

		// Tin tuc
		case 'listNews':
			$listNews = selectNews();
			include '../News/listNews.php';
			break;
		case 'addNews1':
			include '../News/addNews.php';
			break;
		case 'addNews2':
			if (isset($_POST['addNewNews']) && $_POST['addNewNews']) {
				$tieu_de = $_POST['tieu_de'];
				$gioi_thieu = $_POST['mo_ta'];
				$ngay_dang = $_POST['ngay_dang'];
				// $ma_tk = $_POST['ma_tk'];
				$noi_dung = $_POST['noi_dung'];
				$hinh_anh = isset($_FILES['hinh_anh']) ? $_FILES['hinh_anh'] : '';
				$save_url = '';
				if ($hinh_anh['size'] > 0 && $hinh_anh['size'] < 500000) {
					$photo_folder = '../img/';
					$photo_file = uniqid() . $hinh_anh['name'];

					$file_se_luu = $hinh_anh['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}

				if ($_SESSION['ten_tk']) {
					extract($_SESSION['ten_tk']);
				}
				// var_dump($hinh_anh); 
				insertNews($tieu_de, $save_url, $gioi_thieu, $noi_dung, $ngay_dang, $ma_tk);

				$thongbao = "Thêm mới phong thành công !";
			}

			$listNews = selectNews();
			include '../News/listNews.php';
			break;
		case 'editNews':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$news = getOneNews($_GET['id']);
			}

			$listNews = selectNews();
			include '../News/editNews.php';
			// include './Product/list.php';
			break;
		case 'editedNews':
			if (isset($_POST['updateNews']) && $_POST['updateNews']) {
				$id = $_POST['id'];
				$tieu_de = $_POST['tieu_de'];
				$ngay_dang = $_POST['ngay_dang'];
				$mo_ta = $_POST['mo_ta'];
				$noi_dung = $_POST['noi_dung'];
				$hinh_anh = isset($_FILES['hinh_anh']) ? $_FILES['hinh_anh'] : '';
				$save_url = '';
				if ($hinh_anh['size'] > 0 && $hinh_anh['size'] < 500000) {
					$photo_folder = '../img/';
					$photo_file = uniqid() . $hinh_anh['name'];
					$file_se_luu = $hinh_anh['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				updateNews($id, $tieu_de, $save_url, $mo_ta, $noi_dung, $ngay_dang);
				$thongbao_update = "Cập nhật lại phòng thành công!";
			}

			$listNews = selectNews();
			include '../News/listNews.php';
			break;

		case 'deleteNews':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteNews($_GET['id']);
				$thongbao_delete = "Xóa thành công !!";
			}

			$listNews = selectNews();
			include '../News/listNews.php';
			break;
		// End News
		// Chi tiết phòng
		// abc thu nghiem
		case 'register':
			if (isset($_POST['register']) && ($_POST['register'])) {
				$hoten = $_POST['Ho_ten'];
				$ten_tk = $_POST['ten_tk'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$phone = $_POST['phone'];
				$address = $_POST['dia_chi'];
				insertAcc($hoten, $ten_tk, $email, $pass, $phone, $address);
				echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
			}
			include '../Accounts/register.php';
			break;
		//End register
		case 'login':
			if (isset($_POST['login']) && ($_POST['login'])) {
				$ten_tk = $_POST['ten_tk'];
				$pass = $_POST['pass'];
				$checkAcc = checkAccount($ten_tk, $pass);

				if (is_array($checkAcc)) {
					$_SESSION['ten_tk'] = $checkAcc;
					return $_SESSION['ten_tk'];
					// echo '<script> alert("Đăng nhập thành công!") </script>';
				}
			}
			include '../Accounts/login.php';
			break;
		//End login
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
			include '../Accounts/ForgetPass.php';
			break;
		//End forget
		case 'listAcc':
			$listUsers = load_taikhoan();
			include '../Accounts/listAcc.php';
			break;
		//end listAcc
		case 'editUsers':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$listUsers = getOneAccount($_GET['id']);
			}
			include '../Accounts/editAcc.php';
			break;
		case 'manageUsers':
			// include './taikhoan/edit.php';
			header('location: index.php?goto=listAcc');
			$listAcc = loadAll_acc();
			include '../Accounts/listAcc.php';
			break;
		//end listAcc
		case 'editAcc':
			if (isset($_POST['editAcc']) && $_POST['editAcc']) {
				$ho_ten = $_POST['ho_ten'];
				$ma_tk = $_POST['ma_tk'];
				$ten_tk = $_POST['ten_tk'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$role = $_POST['vaitro'];
				update_accs($ma_tk, $ten_tk, $ho_ten, $email, $phone, $vai_tro);
				$_SESSION['user'] = checkAccount($ten_tk, $pass);
				header('location: index.php?goto=listAcc');
			}
			include '../Accounts/listAcc.php';
			break;
		// Quản lí hồ sơ admin
		case 'editUser':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$user = getOneAccount($_GET['id']);
			}
			include '../Users/updateUser.php';
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
					$photo_folder = '../img/';
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
		case 'exit':
			session_unset();
			header('location: ../index.php');
			break;
		// Quản lí phản hồi
		case 'listContact':
			$listContact = load_contact();
			include '../Accounts/listContact.php';
			break;
		case 'Feedback':
			include '../Contact/formFeedback.php';
			break;
		case 'btnFeedBack':
			if (isset($_POST['btn_feedBack']) && $_POST['btn_feedBack']) {
				echo '<script>alert("Phản hồi đã gửi")</script>';
			}
			break;
		case 'listContact':
			$listContact = load_contact();
			include '../Accounts/listContact.php';
			break;
		case 'Feedback':
			include '../Contact/formFeedback.php';
			break;
		case 'btnFeedBack':
			if (isset($_POST['btn_feedBack']) && $_POST['btn_feedBack']) {
				echo '<script>alert("Phản hồi đã gửi")</script>';
			}
			break;
		case 'listContact':
			$listContact = load_contact();
			include '../Accounts/listContact.php';
			break;
		case 'Feedback':
			include '../Contact/formFeedback.php';
			break;
		case 'btnFeedBack':
			if (isset($_POST['btn_feedBack']) && $_POST['btn_feedBack']) {
				echo '<script>alert("Phản hồi đã gửi")</script>';
			}
			break;
		case 'thongke':
			$listtk = loadAll_thongke();
			include '../thongke/list.php';
			break;
		case 'chart':
			$listtk = loadAll_thongke();
			include '../thongke/chart.php';
			break;
		default:
		# code...
		// break;
	}
} else if (isset($_GET['search'])) {
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
		default:
			# code...
			break;
	}
} else {
	// $listCates = selectCates();
	// // $listRooms = selectRooms();
	// $list8rooms = selectEightRooms();
	// include './admin.php';
}

include '../View/footer.php';