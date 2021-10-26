<?php
	include ('include/header.php'); 
	include ("connection/connect_qlnv.php");
	$mess = "";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(empty($_POST['ma_nv'])){
			$mess .= "Bạn chưa nhập mã nhân viên";
		}
		else{
			$ma_nv = trim($_POST['ma_nv']);
		}
		//kiểm tra họ tên
		if(empty($_POST['ho'])){
			$mess .= "Bạn chưa nhập họ nhân viên";
		}
		else{
			$ho=trim($_POST['ho']);
		}
		if(empty($_POST['ten'])){
			$mess .= "Bạn chưa nhập tên nhân viên";
		}
		else{
			$ten=trim($_POST['ten']);
		}

		//cap nhat loại nhân viên và phòng ban và giới tính
		$ma_loai_nv = $_POST['loai_nv'];
		$ma_phong = $_POST['phong_ban'];
		$gioi_tinh  = $_POST['gioi_tinh'];

		//kiem tra ngày sinh
		if(empty($_POST['ngay_sinh'])){
			$mess .= "Bạn chưa nhập ngày sinh";
		}
		else{
			$ngay_sinh=trim($_POST['ngay_sinh']);
		}


		//kiem tra địa chỉ
		if(empty($_POST['dia_chi'])){
			$mess .= "Bạn chưa nhập địa chỉ nhân viên";
		}
		else{
			$dia_chi=trim($_POST['dia_chi']);
		}

		//kiểm tra hình nhân viên và thực hiện upload file
		if($_FILES['anh']['name']!=""){
			$anh=$_FILES['anh'];
			$ten_anh=$anh['name'];
			$type=$anh['type'];
			$size=$anh['size'];
			$tmp=$anh['tmp_name'];
			if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
			{
				move_uploaded_file($tmp,"anh_nhan_vien/".$ten_anh);
			}
		}
		$query="INSERT INTO nhan_vien VALUES ('$ma_nv','$ho','$ten','$ngay_sinh', '$gioi_tinh', '$dia_chi', '$ten_anh','$ma_loai_nv', '$ma_phong')";
			$result=mysqli_query($dbc,$query);
			if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
				echo "<div align='center'>Thêm mới thành công!</div>";			
				$query="Select nhan_vien.*, ten_phong, ten_loai_nv from nhan_vien, phong_ban, loai_nv WHERE nhan_vien.ma_phong = phong_ban.ma_phong and nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv and ma_nv = '".$ma_nv."'";
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)==1)
				{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
					$mess .= "<div class='alert alert-success' role='alert'>Thêm nhân viên thành công !
	                            </div><script> setTimeout(function(){window.location='index.php';},3000);</script>";
	            } else {
	                $mess .= "<div class='alert alert-danger' role='alert'>Thêm không thành công !</div>";
	            }
			}

	}
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>THÊM MỚI</legend>
	<?php echo $mess; ?>
	<div class="form-group">
		<label>Mã nhân viên</label>
		<input type="text" name="ma_nv"class="form-control" value="<?php if(isset($_POST['ma_nv'])) echo $_POST['ma_nv'];?>" required/>
		<label>Họ nhân viên</label>
		<input type="text" name="ho" class="form-control" value="<?php if(isset($_POST['ho'])) echo $_POST['ho'];?>" required/>
		<label>Tên nhân viên</label>
		<input type="text" name="ten" class="form-control" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>" required/>
		<label>Ngày sinh</label>
		<input type="text" name="ngay_sinh" class="form-control"value="<?php if(isset($_POST['ngay_sinh'])) echo $_POST['ngay_sinh'];?>" required/>
		<label>Giới tính</label>
		<input type="radio" class="form-check-input" name="gioi_tinh" value=1 <?php if(isset($_POST['gioi_tinh'])&&($_POST['gioi_tinh'])==1) echo 'checked'?> checked/>Nam
		<input type="radio" class="form-check-input" name="gioi_tinh" value=0 <?php if(isset($_POST['gioi_tinh'])&&($_POST['gioi_tinh'])==0) echo 'checked'?>/>Nữ<br>
		<label>Địa chỉ</label>
		<input type="text" name="dia_chi" class="form-control" value="<?php if(isset($_POST['dia_chi'])) echo $_POST['dia_chi'];?>" required/>
		<label>Loại nhân viên</label>
		<select name="loai_nv" class="form-control">
			<?php 
				$query="select * from loai_nv";	//Hiển thị tên các hãng nhân viên
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_loai_nv = $row['ma_loai_nv'];
						$ten_loai_nv = $row['ten_loai_nv'];
						echo "<option value='$ma_loai_nv' "; 
								if(isset($_REQUEST['loai_nv']) && ($_REQUEST['loai_nv']==$ma_loai_nv)) echo "selected='selected'";
						echo ">$ten_loai_nv</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
		<label>Phòng ban</label>
		<select name="phong_ban" class="form-control">
			<?php 
				$query="select * from phong_ban";	//Hiển thị tên các loại nhân viên
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_phong =$row['ma_phong'];
						$ten_phong =$row['ten_phong'];
						echo "<option value='".$ma_phong."' "; 
							if(isset($_REQUEST['phong_ban']) && ($_REQUEST['phong_ban']==$ma_phong)) echo "selected='selected'";
						echo ">".$ten_phong."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
		<label>Ảnh nhân viên</label>
		<input type="FILE" name ="anh" size="80" value="<?php if(isset($_POST['anh'])) echo $_POST['anh'];?>" required/>
		<center><button class="btn btn-primary" type="submit" name ="them">Thêm mới</button></center>
	</div>
</fieldset>
</form>
<?php 
mysqli_close($dbc);
include ('include/footer.html');
?>

