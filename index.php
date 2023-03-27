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
		// Categories - Loại Phòng
		case 'listCates':
			$listCates = selectCates();
			include './Categories/listCates.php';
			break;
		case 'addCate1':
			include './Categories/addCate.php';
			break;
		case 'addCate2':
			if (isset($_POST['addNewCate']) && $_POST['addNewCate']) {
				$ten_lp = $_POST['tenloai'];
				insertCate($ten_lp);
				$thongbao = "Thêm mới loại phòng thành công!";
			}
			$listCates = selectCates();
			include './Categories/listCates.php';
			break;
		case 'deleteCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteCate($_GET['id']);
				$thongbao_xoa = "Xóa thành công !!";
			}

			$listCates = selectCates();
			include './Categories/listCates.php';
			break;
		case 'editCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = getOneItem($_GET['id']);
			}
			include './Categories/updateCate.php';
			break;
		case 'editedCate':
			if (isset($_POST['updateCate']) && $_POST['updateCate']) {
				$id = $_POST['id'];
				$ten_lp = $_POST['tenloai'];
				updateCate($id, $ten_lp);
				$thongbao = "Cập nhật loại phòng thành công!";
			}
			$listCates = selectCates();
			include './Categories/listCates.php';
			break;
		// Rooms -- Phòng Ở
		case 'listRooms':
		case 'viewRooms': 
			$listRooms = selectRooms();
			$listCates = selectCates();
			include './Rooms/viewRooms.php';
			break;
		// Login
		case 'login':

			if (isset($_POST['click'])) {
				$email = $_POST['email'];
				$pass = $_POST['mat_khau'];
				$user = check_client($email, $pass);

				if (is_array($user)) {
					$_SESSION['user'] = $user;

					if ($_SESSION['user']['vai_tro'] == 1) {
						header("Location:../Admin/admin.php");
					} else if ($_SESSION['user']['vai_tro'] == 0) {
						//$_SESSION['success'] = "";
						var_dump($_SESSION['user']);
						//include 'Client/index1.php';
						header("Location:Client/index1.php");
						exit();
					}
				}
			}
			include './Account/login.php';
			break;
		// Tin tuc

		case 'listNews':
			$listNews = selectNews();

			include './News/listNews.php';
			break;
		case 'addNews1':
			include './News/addNews.php';
			break;
		case 'addNews2':
			if (isset($_POST['addNewNews']) && $_POST['addNewNews']) {
				$tieu_de = $_POST['tieu_de'];
				$gioi_thieu = $_POST['mo_ta'];
				$ngay_dang = $_POST['ngay_dang'];
				// $ma_tk = $_POST['ma_tk'];
				$mo_ta = $_POST['mo_ta'];
				$noi_dung = $_POST['noi_dung'];
				$hinh_anh = isset($_FILES['hinh_anh']) ? $_FILES['hinh_anh'] : '';
				$save_url = '';
				if ($hinh_anh['size'] > 0 && $hinh_anh['size'] < 500000) {
					$photo_folder = 'img/';
					$photo_file = uniqid() . $hinh_anh['name'];

					$file_se_luu = $hinh_anh['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				// var_dump($hinh_anh); 
				insertNews($tieu_de, $save_url, $mo_ta, $noi_dung, $ngay_dang);


				insertNews($tieu_de, $save_url, $mo_ta, $noi_dung, $ngay_dang);

				$thongbao = "Thêm mới phong thành công !";
			}

			$listNews = selectNews();
			include './News/listNews.php';
			break;
		case 'editNews':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$news = getOneNews($_GET['id']);
			}

			$listNews = selectNews();
			include './News/editNews.php';
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
					$photo_folder = 'img/';
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

			$listRooms = selectRooms();
			include './Rooms/listRooms.php';
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
				echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
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
					// header('location: index.php');
					$_SESSION['ten_tk'] = $checkAcc;

					// header('location:index.php');
					echo '<script> alert("Đăng nhập thành công!") </script>';

					if ($_SESSION['ten_tk']['vai_tro'] === 1) {
						header('location: Admin/index.php');
						return $_SESSION['ten_tk'];
						// echo '<script> alert("Đăng nhập thành công!") </script>';
					} else {
						header('location:index.php');
						return $_SESSION['ten_tk'];
						// echo '<script> alert("Đăng nhập thành công!") </script>';
					}
					// echo '<script> alert("Đăng nhập thành công!") </script>';
				} else {
					echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
					// $thongbao = "Tai khoan khong ton tai";
					header('location:index.php');
				}
			}
			include './Accounts/login.php';
			break;
			//End login
		case 'logout':
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
				$err['min'] = "Giá trị phải nhập số dương !!";
			}else {
				isset($_POST['price-min']) ? $_POST['price-min'] : 0;
			}

			if(!empty($_POST['price-max']) && ($_POST['price-max'] < 0)) {
				$err['max'] = "Giá trị phải nhập số dương !!";
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
	$listRooms = selectRooms();
	include './View/body.php';
}

include './View/footer.php';
