<?php 
	include './View/header.php';
	include './Models/pdo.php';
	include './Models/Categories.php';
	
	if(isset($_GET['goto'])) {
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
					$thongbao = "Thêm mới danh mục thành công!";
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
					$thongbao = "Cập nhật danh mục thành công!";
				}
				$listCates = selectCates();
				include './Categories/listCates.php';
				break;
			default:
				# code...
		}
	}else {
		include './View/body.php';
	}

	include './View/footer.php';
