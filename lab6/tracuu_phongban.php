<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tra cứu phòng ban</title>
<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php include ('include/header.html'); ?>
<form action="" method="get">
	<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
		   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
	<tr>
		<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN PHÒNG BAN</h3></font></td>
	</tr>
	<tr>
		<td align="center">Tên phòng ban: <input type="text" name="giatri" size="30" 
					value="<?php if(isset($_GET['giatri'])) echo $_GET['giatri'];?>">
				<input type="submit" name="tim" value="Tìm kiếm"></td>
	</tr>
	</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['giatri'])) echo "<p align='center'>Vui lòng nhập tên phòng ban cần tìm</p>";
	else
	{
		$giatri=$_GET['giatri'];	
		require("connection/connect_qlnv.php");
		// $query="Select sua.*, Ten_hang_sua 
		//       from Sua,hang_sua 
		//       WHERE sua.ma_hang_sua=hang_sua.ma_hang_sua
		// 			AND Ten_sua like '%$ten%'";
		$query="Select * 
		      from phong_ban
		      WHERE ma_phong like '%$giatri%' or ten_phong like '%$giatri%'";
		$result=mysqli_query($dbc,$query);		
		if(mysqli_num_rows($result)<>0)
		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows phòng ban được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table align="center">
					<tr>
					<td width="200" align="center">
						<i><b>Mã phòng ban: </i></b>'.$row['ma_phong'].'<br />
						<i><b>Tên phòng ban: </i></b>'.$row['ten_phong'].'
					</td>
					</tr>
				</table>';
			}
		}
		else echo "<div align='center'><b>Không tìm thấy phòng ban này.</b></div>";
	}
}
include ('include/footer.html');
?>
</body>
</html>
