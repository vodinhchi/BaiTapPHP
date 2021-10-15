<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tra cứu nhân viên</title>
<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php include ('include/header.html'); ?>
<form action="" method="get">
	<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
		   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
	<tr>
		<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN NHÂN VIÊN</h3></font></td>
	</tr>
	<tr>
		<td align="center">Tên nhân viên: <input type="text" name="ten" size="30" 
					value="<?php if(isset($_GET['ten'])) echo $_GET['ten'];?>">
				<input type="submit" name="tim" value="Tìm kiếm"></td>
	</tr>
	</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['ten'])) echo "<p align='center'>Vui lòng nhập tên nhân viên cần tìm</p>";
	else
	{
		$ten=$_GET['ten'];	
		require("connection/connect_qlnv.php");
		$query=
		"Select * 
		from nhan_vien join phong_ban
		on nhan_vien.ma_phong = phong_ban.ma_phong 
		WHERE ten like '%$ten%' or ho like '%$ten%' 
		group by nhan_vien.ma_nv";
		// $query="Select * 
		//       from nhan_vien
		//       WHERE ten like '%$ten%' or ho like '%$ten%'";
		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows nhân viên được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
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
					// '<i><b>Chức vụ</b></i>'.$row['ten_loai_nv'].'<br />'.
					'<i><b>Phòng ban: </b></i>'.$row['ten_phong'].'<br />';
				echo '</td>
					</tr>
				</table>';
			}
		}
		else echo "<div align='center'><b>Không tìm thấy nhân viên có tên này.</b></div>";
	}
}
include ('include/footer.html');
?>
</body>
</html>
