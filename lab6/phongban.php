<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Phòng ban</title>
	<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php 
	include ('include/header.html');
	// Ket noi CSDL
	require("connection/connect_qlnv.php");
	// Chuan bi cau truy van & Thuc thi cau truy van
	$strSQL = "SELECT * FROM phong_ban";
	$result = mysqli_query($dbc,$strSQL);
	// Xu ly du lieu tra ve
	if(mysqli_num_rows($result) == 0)
	{
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1>PHÒNG BAN</h1>
		<table align='center'>
		  	<thead>
				<td><b>Mã phòng ban</b></td>
				<td><b>Tên phòng ban</b></td>
		  	</thead>";
		$stt=1;
		while ($row = mysqli_fetch_array($result))
		{
			if($stt%2!=0){
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "</tr>";
			}
			else{
				echo "<tr id=mau>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "</tr>";
			}
			$stt+=1;
		}
		echo '</table>';
	}
	//Dong ket noi
	mysqli_close($dbc);
	include ('include/footer.html');
?>
</body>
</html>
