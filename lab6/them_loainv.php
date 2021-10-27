<?php
	include ('include/header.php'); 
	include ("connection/connect_qlnv.php");
	$mess = "";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(empty($_POST['ma_loai_nv'])){
			$mess .= "Bạn chưa nhập mã nhân viên";
		}
		else{
			$ma_loai_nv = trim($_POST['ma_loai_nv']);
		}
		//kiểm tra họ tên
		if(empty($_POST['ten_loai_nv'])){
			$mess .= "Bạn chưa nhập họ nhân viên";
		}
		else{
			$ten_loai_nv=trim($_POST['ten_loai_nv']);
		}
		$query="INSERT INTO loai_nv VALUES ('$ma_loai_nv','$ten_loai_nv')";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
			$mess .= "<div class='alert alert-success' role='alert'>Thêm loại nhân viên thành công !<script> setTimeout(function(){window.location='loaiNhanVien.php';},2000);</script></div>";
		}
		else //neu khong them duoc
		{
			$mess .= "<div class='alert alert-danger' role='alert'>Lỗi!<br>Vui lòng thử lại.</div>";
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>THÊM MỚI</legend>
	<?php echo $mess; ?>
	<div class="form-group">
		<label>Mã loại nhân viên</label>
		<input type="text" name="ma_loai_nv"class="form-control" value="<?php if(isset($_POST['ma_loai_nv'])) echo $_POST['ma_loai_nv'];?>" required/>
		<label>Tên loại nhân viên</label>
		<input type="text" name="ten_loai_nv" class="form-control" value="<?php if(isset($_POST['ten_loai_nv'])) echo $_POST['ten_loai_nv'];?>" required/>
		<center><button class="btn btn-primary" type="submit" name ="them">Thêm mới</button></center>
	</div>
</fieldset>
</form>
<?php 
	mysqli_close($dbc);
	include ('include/footer.html');
?>

