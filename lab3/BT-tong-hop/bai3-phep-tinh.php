<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tính toán</title>
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
		if(isset($_POST['so1']))
			$so1 = trim($_POST['so1']);
		else $so1 = 0;

		if(isset($_POST['so2']))
			$so2 = trim($_POST['so2']);
		else $so2 = 0;
	 ?>

	<form action="bai3-xu-li-phep-tinh.php" method="post">
		<h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
		<table align="center"><td></td>
			<tr>
				<td style="text-align: right; color: red;">Cho phép tính:</td>
				<td style="color: red;">
					<input type="radio" name="rdPhepTinh" value="cong" <?php if(isset($_POST['rdPhepTinh']) && $_POST['rdPhepTinh']=='cong') echo 'checked = "checked"' ?>checked>Cộng
					<input type="radio" name="rdPhepTinh" value="tru" <?php if(isset($_POST['rdPhepTinh']) && $_POST['rdPhepTinh']=='tru') echo 'checked = "checked"' ?>>Trừ
					<input type="radio" name="rdPhepTinh" value="nhan" <?php if(isset($_POST['rdPhepTinh']) && $_POST['rdPhepTinh']=='nhan') echo 'checked = "checked"' ?>>Nhân
					<input type="radio" name="rdPhepTinh" value="chia" <?php if(isset($_POST['rdPhepTinh']) && $_POST['rdPhepTinh']=='chia') echo 'checked = "checked"' ?>>Chia
				</td>
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
				<td></td>
				<td><input type="submit" name="tinh" value="Tính"></td>
			</tr>
		</table>
	</form>
</body>
</html>