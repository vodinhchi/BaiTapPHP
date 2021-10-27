<?php
	include ('include/header.php'); 
	include ("connection/connect_qlnv.php");
	$mess = "";

	$ma_loai_nv = $_REQUEST['ma'];
	$query="select * from loai_nv where ma_loai_nv = '$ma_loai_nv'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);

	$ma_loai_nv = $row['ma_loai_nv'];
	$ten_loai_nv = $row['ten_loai_nv'];
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$ma_loai_nv = $ma_loai_nv;
		$ten_loai_nv = $_POST['ten_loai_nv'];
			
		$query="UPDATE loai_nv SET ten_loai_nv= '$ten_loai_nv' WHERE ma_loai_nv = '$ma_loai_nv'";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){
			$mess .= "<div class='alert alert-success' role='alert'>Đã cập nhật thành công !</div>
			<script> setTimeout(function(){window.location='loaiNhanVien.php';},2000);</script>";
		}
		else
		{
			$mess .= "<div class='alert alert-danger' role='alert'>Lỗi!<br>Vui lòng thử lại.</div>";
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>CẬP NHẬT THÔNG TIN</legend>
	<?php echo $mess; ?>
	<div class="form-group">
		<label>Mã loại nhân viên</label>
		<input type="text" name="ma_loai_nv"class="form-control" value="<?php echo $ma_loai_nv;?>" disabled/>
		<label>Tên loại nhân viên</label>
		<input type="text" name="ten_loai_nv" class="form-control" value="<?php echo $ten_loai_nv;?>" required/>
		<center><button class="btn btn-primary" type="submit" name ="capNhat">Cập nhật</button></center>
	</div>
</fieldset>
</form>
<?php 
	mysqli_close($dbc);
	include ('include/footer.html');
?>

