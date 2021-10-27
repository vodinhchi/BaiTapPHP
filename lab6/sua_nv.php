<?php
	include ('include/header.php'); 
	include ("connection/connect_qlnv.php");
	$mess = "";

	$ma_nv = $_REQUEST['ma'];
	$query="select * from nhan_vien where ma_nv = '$ma_nv'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);

	$ma_nv = $row['ma_nv'];
	$ho = $row['ho'];
	$ten = $row['ten'];
	$ngay_sinh = $row['ngay_sinh'];
	$gioi_tinh = $row['gioi_tinh'];
	$dia_chi = $row['dia_chi'];
	$loai_nv = $row['ma_loai_nv'];
	$phong_ban = $row['ma_phong'];
	$anh = $row['anh'];

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$ma_nv = $_POST['ma_nv'];
		$ho = $_POST['ho'];
		$ten = $_POST['ten'];
		$ngay_sinh = $_POST['ngay_sinh'];
		$gioi_tinh = $_POST['gioi_tinh'];
		$dia_chi = $_POST['dia_chi'];
		$loai_nv = $_POST['loai_nv'];
		$phong_ban = $_POST['phong_ban'];

		if($_FILES['anh']['name']!=""){
			$anh=$_FILES['anh'];
			$ten_anh=$anh['name'];
			$type=$anh['type'];
			$size=$anh['size'];
			$tmp=$anh['tmp_name'];
			if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
			{
				move_uploaded_file($tmp,"image/".$ten_anh);
			}
			$query="UPDATE nhan_vien
			SET ho = '$ho', ten= '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi', ma_loai_nv= '$loai_nv', ma_phong = '$phong_ban', anh = '$ten_anh'
			WHERE ma_nv = '$ma_nv'";
		}else{
		$query="UPDATE nhan_vien
		SET ho = '$ho', ten= '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi', ma_loai_nv= '$loai_nv', ma_phong = '$phong_ban'
		WHERE ma_nv = '$ma_nv'";
		}
		$query="UPDATE nhan_vien
		SET ho = '$ho', ten= '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi', ma_loai_nv= '$loai_nv', ma_phong = '$phong_ban'
		WHERE ma_nv = '$ma_nv'";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){
			$mess .= "<div class='alert alert-success' role='alert'>Đã cập nhật thành công !<script> setTimeout(function(){window.location='index.php';},5000);</script></div>";
		}
		else
		{
			$mess .= "<div class='alert alert-danger' role='alert'>Lỗi!<br>Vui lòng thử lại.</div>";
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>CẬP NHẬT</legend>
	<?php echo $mess; ?>
	<div class="form-group">
		<label>Mã nhân viên</label>
		<input type="text" name="ma_nv"class="form-control" value="<?php echo $ma_nv;?>" />
		<label>Họ nhân viên</label>
		<input type="text" name="ho" class="form-control" value="<?php echo $ho;?>" />
		<label>Tên nhân viên</label>
		<input type="text" name="ten" class="form-control" value="<?php echo $ten; ?>" />
		<label>Ngày sinh</label>
		<input type="text" name="ngay_sinh" class="form-control"value="<?php echo $ngay_sinh; ?>" />
		<label>Giới tính</label>
		<input type="radio" class="form-check-input" name="gioi_tinh" value=1 <?php if($gioi_tinh==1) echo 'checked'?>/>Nam
		<input type="radio" class="form-check-input" name="gioi_tinh" value=0 <?php if($gioi_tinh==0) echo 'checked'?>/>Nữ<br>
		<label>Địa chỉ</label>
		<input type="text" name="dia_chi" class="form-control" value="<?php echo $dia_chi;?>" />

		<label>Loại nhân viên</label>
		<select name="loai_nv" class="form-control">
			<?php 
				$query="select * from loai_nv";
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_loai_nv = $row['ma_loai_nv'];
						$ten_loai_nv = $row['ten_loai_nv'];
						echo "<option value='$ma_loai_nv' "; 
							if($loai_nv==$ma_loai_nv) echo "selected='selected'";
						echo ">$ten_loai_nv</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
		<label>Phòng ban</label>
		<select name="phong_ban" class="form-control">
			<?php 
				$query="select * from phong_ban";
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_phong =$row['ma_phong'];
						$ten_phong =$row['ten_phong'];
						echo "<option value='$ma_phong' "; 
							if($phong_ban==$ma_phong) echo "selected='selected'";
						echo ">$ten_phong</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
		<label>Ảnh nhân viên</label>
		<input type="FILE" name ="anh" value="<?php echo $anh;?>" />
		<center><button class="btn btn-primary" type="submit" name ="capNhat">Cập nhật</button></center>
	</div>
</fieldset>
</form>
<?php
	mysqli_close($dbc);
	include ('include/footer.html');
?>
