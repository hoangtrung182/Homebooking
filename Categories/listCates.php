<?php 
	$thongbao = isset($thongbao) ? $thongbao : '';
	$thongbao_delete = isset($thongbao_xoa) ? $thongbao_xoa : '';
?>
<p class=""><?= $thongbao ?></p>
<p class=""><?= $thongbao_delete ?></p>

<div class="container">
	<h2 class="form_title">Danh sách loại phòng</h2>
	<table border="1" cellspacing="0" class="content-table">
		<thead>
			<tr class="">
				<th class="type">Mã phòng</th>
				<th class="type">Tên loại phòng</th>
				<th class="type" colspan="2">Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($listCates as $loaiphong) {
					extract($loaiphong);
					$editCate = "index.php?goto=editCate&id=".$ma_lp;
					$deleteCate = "index.php?goto=deleteCate&id=".$ma_lp;
					?>
					<tr class="list">
						<td><?= $ma_lp ?></td>
						<td><?= $ten_lp ?></td>
						<td>
							<a href="<?= $editCate ?>">
								<input type="button" value="Cập nhật"  class="btn btn_edit">
							</a>
						</td> 
						<td>
							<a href="<?= $deleteCate ?>">
								<input type="button" value="Xóa" class="btn btn_delete"
								 onclick="return confirm('Bạn có chắc chắn muốn xóa không!')">
							</a>
						</td>
					</tr>
				<?php  }  ?>
		</tbody>
	</table>
	<button class="btn input_submit">
		<a href="index.php?goto=addCate1">Thêm mới</a>
	</button>
</div>
