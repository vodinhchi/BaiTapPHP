<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kết quả phép tính</title>
	<style type="text/css">
		body{
			font-family: arial;
			background-color: ghostwhite;
			padding: 20px;
			text-align: center;
		}
		h2, td{
			color: blue;
			font-weight: bold;
		}
		h2{
			text-align: center;
		}
		p{
			color: red;
		}
	</style>
</head>
<body>
	<?php 
		$phepTinh = $_REQUEST['rdPhepTinh'];
		
		$so1 = $_REQUEST['so1'];

		$so2 = $_REQUEST['so2'];

		if(is_numeric($so1) && is_numeric($so2)){
			if($phepTinh=='cong'){
				$phepTinh = 'Phép cộng';
				$ket_qua = (int)$so1 + (int)$so2;
			}
			else if($phepTinh=='tru'){
				$phepTinh = 'Phép trừ';
				$ket_qua = (int)$so1 - (int)$so2;
			}
			else if($phepTinh=='nhan'){
				$phepTinh = 'Phép nhân';
				$ket_qua = (int)$so1 * (int)$so2;
			}
			else if($phepTinh=='chia'){
				$phepTinh = 'Phép chia';
				$ket_qua = (int)$so1 / (int)$so2;
			}
		}
		else {
			$phepTinh = "Không có phép toán cho số và chữ";
			$ket_qua = 0;
		}
	 ?>

	<form action="" method="get">
		<h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
		<table align="center">
			<tr>
				<td style="text-align: right; color: red;">Cho phép tính:</td>
				<td style="color: red; text-align: left;"><?php echo $phepTinh; ?></td>
			</tr>
			<tr>
				<td style="text-align: right;">Số thứ nhất:</td>
				<td><input type="text" name="so1" size="30" value="<?php echo($so1) ?>"></td>
			</tr>
			<tr>
				<td style="text-align: right;">Số thứ nhì:</td>
				<td><input type="text" name="so2" size="30" value="<?php echo($so2) ?>"></td>
			</tr>
			<tr>
				<td style="text-align: right;">Kết quả:</td>
				<td><input type="text" name="ket_qua" size="30" disabled="disabled" value="<?php echo($ket_qua) ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
			</tr>
		</table>
	</form>
	 
</body>
</html>