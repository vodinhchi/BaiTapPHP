<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nhân viên</title>
	<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php 
	include ('include/header.html');
	require("connection/connect_qlnv.php");
	$strSQL = "SELECT * FROM nhan_vien";
	$result = mysqli_query($dbc,$strSQL);
	if(mysqli_num_rows($result) == 0){
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1>NHÂN VIÊN</h1>
		<table align=center>
			<thead>
				<td><b>Mã nhân viên</b></td>
				<td><b>Họ tên nhân viên</b></td>
				<td><b>Ngày sinh</b></td>
				<td><b>Giới tính</b></td>
				<td><b>Địa chỉ</b></td>
				<td><b>Loại nhân viên</b></td>
				<td><b>Phòng ban</b></td>
			</thead>";
		$stt=1;

		while ($row = mysqli_fetch_array($result))
		{
			if ($row[4] == 1)	$row[4] = "Nam";
			else 				$row[4] = "Nữ";
			if($stt%2!=0){
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1] $row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "<td>$row[7]</td>";
				echo "<td>$row[8]</td>";
				echo "</tr>";
			}
			else{
				echo "<tr id=mau>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1] $row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "<td>$row[7]</td>";
				echo "<td>$row[8]</td>";
				echo "</tr>";
			}
			$stt+=1;
		}
		echo '</table>';
	}
	mysqli_close($dbc);
	include ('include/footer.html');
?>
</body>
</html>
