
<body>
	<section class="main">
		<h2 class="form_title">Form thêm mới tin tức</h2>
		<form action="index.php?goto=addNews2" method="post" enctype="multipart/form-data">
			</select><br>
			<div class="text_input">
				<input type="hidden" name="ma_tin" disabled placeholder="Không thay đổi mã tin tức"
					class="input_second">
			</div>
			<div class="text_input">
				<p class="form_label">Tiêu đề</p>
				<input type="text" name="title" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Hình ảnh</p>
				<input type="file" name="image" multiple="true" class="input_second">
			</div>
			<div class="text_input">
				<p class="form_label">Mô tả</p>
				<textarea name="desc" cols="96" rows="4" class="text-area"></textarea>
			</div>
			<div class="text_input">
				<p class="form_label">Nội dung</p>
				<!-- <input type="text" name="content" class="input_second"><br> -->
				<textarea name="content" cols="96" rows="4" class="text-area"></textarea>
			</div>
			<div class="text_input">
				<p class="form_label">ngày đăng</p>
				<input type="date" name="timeupload" class="input_second"><br>
			</div>
			<br>
			
				
			<div class="button">
				<input type="submit" value="Thêm" name="addNewNews" class="input_button btn">
				<input type="reset" value="Xóa hết" class="input_button btn">
				<a href="index.php?goto=listNews"><input type="button" value="Danh sách" class="btn"></a>
			</div>
			<?= isset($thongbao) ? $thongbao : '' ?>
		</form>
	</section>
</body>

</html>