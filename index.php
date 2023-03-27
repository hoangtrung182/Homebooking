<?php
session_start();
ob_start();
include './View/header.php';
include './Models/pdo.php';
include './Models/bookings.php';
include './Models/Categories.php';
include './Models/Rooms.php';
include './Models/news.php';
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
			$listRooms = selectRooms();
			$listCates = selectCates();
			include './Rooms/listRooms.php';
			break;
		case 'addRooms1':
			$listCates = selectCates();
			include './Rooms/addRoom.php';
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
					$photo_folder = 'img/';
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
			include './Rooms/listRooms.php';
			break;
		case 'deleteRoom':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteRoom($_GET['id']);
				$thongbao_delete = "Xóa thành công !!";
			}

			$listRooms = selectRooms();
			include './Rooms/listRooms.php';
			break;
		case 'editRoom':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$room = getOneRoom($_GET['id']);
			}

			$listCates = selectCates();
			include './Rooms/updateRoom.php';
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
					$photo_folder = 'img/';
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
			include './Rooms/listRooms.php';
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

		case 'deleteNews':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				deleteNews($_GET['id']);
				$thongbao_delete = "Xóa thành công !!";
			}

			$listNews = selectNews();
			include './News/listNews.php';
			break;
		// End News

		default:
		# code...
	}
} else if (isset($_GET['search'])) {
	switch ($_GET['search']) {
		case 'cate':
			$roomsFilter = isset($_POST['keyw']) ? $_POST['keyw'] : '';

			$listFiltered = roomsFiltered($roomsFilter);
			$listCates = selectCates();
			include './View/roomsSearch.php';
			break;
		case 'price':
			$roomsByPrice = isset($_POST['price_chose']) ? $_POST['price_chose'] : '';
			$listRoomsByPrice = roomsByPrice($roomsByPrice);
			$listCates = selectCates();
			include './View/roomsPrice.php';
			break;
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
			include './Rooms/listRooms.php';
			break;
		default:
			# code...
			break;
	}
} else {
	$listCates = selectCates();
	$listRooms = selectRooms();
	include './View/body.php';
}

include './View/footer.php';