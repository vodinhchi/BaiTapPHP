<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Diện tích hình chữ nhật</title>
	<style type="text/css">
		body{
			font-family: Arial;
			background-color: darkseagreen;
		}
		table{
			border-radius: 10%;
			border: 2px solid darkslategray;
			padding: 20px;
			background-color: oldlace;
			margin-top: 200px;
/*			align: center;*/
		}
		thead{
			color: darkslategray;
			font-weight: bold;
		}
		td{
			color: darkslategray;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_POST['chieu_dai']))
			$chieu_dai = trim($_POST['chieu_dai']);
		else $chieu_dai = 0;

		if(isset($_POST['chieu_rong']))
			$chieu_rong = trim($_POST['chieu_rong']);
		else $chieu_rong = 0;

		if(isset($_POST['tinh']))
			if(is_numeric($chieu_dai) && is_numeric($chieu_rong))
				$dien_tich = $chieu_dai * $chieu_rong;
			else{
				// echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $dien_tich= "Vui lòng nhập vào số!";
			}
		else $dien_tich = 0;
	 ?>
	<form name="myform" action="bai1.php" method="post">
		<table align="center">
			<thead>
				<th colspan="2"><h3>DIỆN TÍCH HÌNH CHỮ NHẬT</h3></th>
			</thead>

			<tr>
				<td>Chiều dài</td>
				<td><input type="text" name="chieu_dai" value="<?php echo($chieu_dai) ?>"></td>
			</tr>
			<tr>
				<td>Chiều rộng</td>
				<td><input type="text" name="chieu_rong" value="<?php echo($chieu_rong) ?>"></td>
			</tr>
			<tr>
				<td>Diện tích</td>
				<td><input type="text" name="dien_tich" disabled="disabled" value="<?php echo($dien_tich) ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Tính" name="tinh"></td>

			</tr>
		</table>
	</form>
	
</body>
</html>