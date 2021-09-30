<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xử lí thông tin</title>
</head>
<body>
	<h3>Bạn đã đăng nhập thành công, dưới đây là thông tin bạn nhập:</h3>
	<?php 
		$ten = $_REQUEST['ten'];
		$dia_chi = $_REQUEST['dia_chi'];
		$sdt = $_REQUEST['sdt'];
		$gioi_tinh = $_REQUEST['rdGioiTinh'];
		$quoc_tich = $_REQUEST['quoc_tich'];
		$ghi_chu = $_REQUEST['ghi_chu'];

		echo "<br>Họ và tên: $ten";
		echo "<br>Giới tính: $gioi_tinh";
		echo "<br>Địa chỉ: $dia_chi";
		echo "<br>Số điện thoại: $sdt";
		echo "<br>Quốc tịch: $quoc_tich";
		echo "<br>Môn học:";
			if(isset($_REQUEST['chk1'])) echo $_REQUEST['chk1'] . ",";
			if(isset($_REQUEST['chk2'])) echo $_REQUEST['chk2'] . ",";
			if(isset($_REQUEST['chk3'])) echo $_REQUEST['chk3'] . ",";
			if(isset($_REQUEST['chk4'])) echo $_REQUEST['chk4'];
		echo "<br>Ghi chú: $ghi_chu". "<br>";
	?>
	<a href="javascript:window.history.back(-1);">Trở về trang trước</a>
</body>
</html>