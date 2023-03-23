
<?php
include './View/header.php';
include './Models/pdo.php';
include './Models/Categories.php';
include './Models/Rooms.php';
include './Models/bookings.php';
include './Models/news.php';

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
		// Đặt phòng
		case 'listRooms_booking':
			$listRooms_booking = selectRooms_booking();
			$test1 = Test();
			//var_dump($test1);
			date_default_timezone_set('ASIA/HO_CHI_MINH');
			$date = date('Y-m-d H:i:s');
			include './Client/bookings/listRooms.php';
			break;
		case 'detailRooms':
			session_start();
			if (isset($_SESSION['user'])) {
				$ten_kh = $_SESSION['user']['ten_kh'];
				$phone = $_SESSION['user']['phone'];
				$dia_chi = $_SESSION['user']['dia_chi'];
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
					$ngay_dat = date('Y-m-d H:i:s');
					if (isset($_SESSION['user'])) {
						$ma_kh = $_SESSION['user']['ma_kh'];
					}
					$so_ngay = getDatesFromRange($_POST['ngay_den'], $_POST['ngay_ve']);
					//var_dump($so_ngay);
					if ($chitiet['giam_gia'] == 0) {
						$gia = $chitiet['gia'];
						$tong_tien = $gia * ($so_ngay - 1);

						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $_POST['ngay_den'],
							'ngay_ve' => $_POST['ngay_ve'],
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
						$tong_tien = $gia * ($so_ngay - 1);

						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $_POST['ngay_den'],
							'ngay_ve' => $_POST['ngay_ve'],
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
						include './Client/bookings/pay.php';
						//header('./index.php?goto=pay');
						die();
					}
				}
			}
			include './Client/bookings/detailRooms.php';
			break;
		case 'pays':
			if (isset($_SESSION['user'])) {
				$ten_kh = $_SESSION['user']['ten_kh'];
				$phone = $_SESSION['user']['phone'];
				$dia_chi = $_SESSION['user']['dia_chi'];
			} else {
				$ten_kh = '';
				$phone = '';
				$dia_chi = '';
			}
			if (isset($_SESSION['user'])) {
				if (isset($_POST['dat_phong'])) {
					$ma_kh = $_SESSION['user']['ma_kh'];
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
			include './Rooms/listRooms.php';
			break;
			// Đặt phòng
		case 'listRooms_booking':
			$listRooms_booking = selectRooms_booking();
			$test1 = Test();
			//var_dump($test1);
			date_default_timezone_set('ASIA/HO_CHI_MINH');
			$date = date('Y-m-d H:i:s');
			include './Client/bookings/listRooms.php';
			break;
		case 'detailRooms':
			session_start();
			if (isset($_SESSION['user'])) {
				$ten_kh = $_SESSION['user']['ten_kh'];
				$phone = $_SESSION['user']['phone'];
				$dia_chi = $_SESSION['user']['dia_chi'];
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
					$ngay_dat = date('Y-m-d H:i:s');
					if (isset($_SESSION['user'])) {
						$ma_kh = $_SESSION['user']['ma_kh'];
					}
					$so_ngay = getDatesFromRange($_POST['ngay_den'], $_POST['ngay_ve']);
					//var_dump($so_ngay);
					if ($chitiet['giam_gia'] == 0) {
						$gia = $chitiet['gia'];
						$tong_tien = $gia * ($so_ngay - 1);

						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $_POST['ngay_den'],
							'ngay_ve' => $_POST['ngay_ve'],
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
						$tong_tien = $gia * ($so_ngay - 1);

						$_SESSION['datphong'] = [
							'ngay_dat' => $ngay_dat,
							'ngay_den' => $_POST['ngay_den'],
							'ngay_ve' => $_POST['ngay_ve'],
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
						include './Client/bookings/pay.php';
						//header('./index.php?goto=pay');
						die();
					}
				}
			}
			include './Client/bookings/detailRooms.php';
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

				
				insertNews($tieu_de,$save_url,$mo_ta,$noi_dung,$ngay_dang);
				
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
			updateNews($id,$tieu_de,$save_url,$mo_ta,$noi_dung,$ngay_dang);
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
	}else if (isset($_GET['search'])) {
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
				include './Rooms/listRooms.php';
				break;

			default:
				# code...
				break;
		}
	} else {
		$listCates = selectCates();
		// $listRooms = selectRooms();
		$list8rooms = selectEightRooms();
		include './View/body.php';
	}

	include './View/footer.php';