<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thêm mới nhân viên</title>
<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php
	include ('include/header.html'); 
	require("connection/connect_qlnv.php");
?>
<form action="" method="post" enctype="multipart/form-data">

<table align="center" id="table_themnv">
<thead>
	<td colspan="2">THÊM MỚI NHÂN VIÊN</td>
</thead>
<tr>
	<td id="fl_right">Mã nhân viên: </td>
	<td><input type="text" name="ma_nv" size="50" value="<?php if(isset($_POST['ma_nv'])) echo $_POST['ma_nv'];?>" /></td>
</tr>
<tr>
	<td id="fl_right">Họ nhân viên: </td>
	<td><input type="text" name="ho" size="50" value="<?php if(isset($_POST['ho'])) echo $_POST['ho'];?>" /></td>
</tr>
<tr>
	<td id="fl_right">Tên nhân viên: </td>
	<td><input type="text" name="ten" size="50" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>" /></td>
</tr>
<tr>
	<td id="fl_right">Ngày sinh: </td>
	<td><input type="text" name="ngay_sinh" size="50" value="<?php if(isset($_POST['ngay_sinh'])) echo $_POST['ngay_sinh'];?>" /></td>
</tr>
<tr>
	<td id="fl_right">Giới tính: </td>
	<td style="text-align: left;">
		<input type="radio" name="gioi_tinh" value=1 <?php if(isset($_POST['gioi_tinh'])&&($_POST['gioi_tinh'])==1) echo 'checked'?> checked/>Nam
		<input type="radio" name="gioi_tinh" value=0 <?php if(isset($_POST['gioi_tinh'])&&($_POST['gioi_tinh'])==0) echo 'checked'?>/>Nữ
	</td>
</tr>
<tr>
	<td id="fl_right">Địa chỉ: </td>
	<td><input type="text" name="dia_chi" size="50" value="<?php if(isset($_POST['dia_chi'])) echo $_POST['dia_chi'];?>" /></td>
</tr>
<tr>
	<td id="fl_right">Loại nhân viên: </td>
	<td><select name="loai_nv">
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
	</td>
</tr>
<tr>
	<td id="fl_right">Phòng ban: </td>
	<td><select name="phong_ban">
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
	</td>
</tr>
<tr>
	<td id="fl_right">Ảnh nhân viên: </td>
	<td style="text-align: left;"><input type="FILE" name ="anh" size="80" value="<?php if(isset($_POST['anh'])) echo $_POST['anh'];?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><button name ="them">Thêm mới</button></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
	//kiem tra ma nhan vien
	if(empty($_POST['ma_nv'])){
		$errors[]="Bạn chưa nhập mã nhân viên";
	}
	else{
		$ma_nv=trim($_POST['ma_nv']);
	}
	//kiểm tra họ tên
	if(empty($_POST['ho'])){
		$errors[]="Bạn chưa nhập họ nhân viên";
	}
	else{
		$ho=trim($_POST['ho']);
	}
	if(empty($_POST['ten'])){
		$errors[]="Bạn chưa nhập tên nhân viên";
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
		$errors[]="Bạn chưa nhập ngày sinh";
	}
	else{
		$ngay_sinh=trim($_POST['ngay_sinh']);
	}


	//kiem tra địa chỉ
	if(empty($_POST['dia_chi'])){
		$errors[]="Bạn chưa nhập địa chỉ nhân viên";
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
	}else{
		$errors[]="Bạn chưa chọn ảnh cho nhân viên";
	}

	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO nhan_vien VALUES ('$ma_nv','$ho','$ten','$ngay_sinh', '$gioi_tinh', '$dia_chi', '$ten_anh','$ma_loai_nv', '$ma_phong')";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
			echo "<div align='center'>Thêm mới thành công!</div>";			
			$query="Select nhan_vien.*, ten_phong, ten_loai_nv from nhan_vien, phong_ban, loai_nv WHERE nhan_vien.ma_phong = phong_ban.ma_phong and nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv and ma_nv = '".$ma_nv."'";
			$result=mysqli_query($dbc,$query);
			if(mysqli_num_rows($result)==1)
			{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				if ($row['gioi_tinh'] == 1)	$row['gioi_tinh'] = "Nam";
				else 				$row['gioi_tinh'] = "Nữ";
				echo '<table align="center">';
					
				echo '<tr>
					<td width="200" align="center">
						<img src="anh_nhan_vien/'.$row['anh'].'"/>
					</td>';

				echo '<td style="text-align: left;">'.
					'<i><b>Mã nhân viên: </i></b>'.$row['ma_nv'].'<br />'.
					'<i><b>Họ và tên: </i></b>'.$row['ho'].' '.$row['ten'].'<br />'.
					'<i><b>Ngày sinh: </b></i>'.$row['ngay_sinh'].'<br />'.
					'<i><b>Giới tính: </b></i>'.$row['gioi_tinh'].'<br />'.
					'<i><b>Địa chỉ: </b></i>'.$row['dia_chi'].'<br />'.
					'<i><b>Chức vụ: </b></i>'.$row['ten_loai_nv'].'<br />'.
					'<i><b>Phòng ban: </b></i>'.$row['ten_phong'].'<br />';
				echo '</td>
					</tr>
				</table>';
			}
		}
		else //neu khong them duoc
		{
			echo "<p>Có lỗi, không thể thêm được</p>";
			echo "<p>".mysqli_error($dbc)."<br/><br />Query: ".$query."</p>";	
		}
	}
	else
	{//neu co loi
		echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
		foreach($errors as $msg)
		{
			echo "- $msg<br/><\n>";
		}
		echo "</p><p>Hãy thử lại.</p>";
	}
}
mysqli_close($dbc);
include ('include/footer.html');
?>
</body>
</html>

