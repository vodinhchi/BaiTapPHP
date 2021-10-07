<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 2_lab4</title>
	<style type="text/css">
		<?php include 'styleBT.css'; ?>
	</style>
</head>
<body>
<?php 
	if(isset($_POST['dso'])) 	$dso = $_POST['dso'];
	else 						$dso = " ";

	$kqua = 0;
	if (isset($_POST['tinh'])) {
		$arr = explode(",", $dso);
		$kqua = array_sum($arr);
	}
 ?>
<form method="post">
	<table>
		<thead>
			<td colspan="3">NHẬP VÀ TÍNH TRÊN DÃY SỐ</td>
		</thead>
		<tr>
			<td colspan="3"><hr></td>
		</tr>
		<tr>
			<td>Nhập dãy số</td>
			<td><input type="text" name="dso" value="<?php echo $dso ?>"></td>
			<td><span>(*)</span></td>
		</tr>
		<tr>
			<td></td>
			<td><button name="tinh">Tổng dãy số</button></td>
			<td></td>
		</tr>
		<tr>
			<td>Tổng dãy số</td>
			<td><input type="text" name="kqua" value="<?php echo $kqua ?>"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><span>(*)</span> Các số được nhập cách nhau bằng dấu ","</td>
		</tr>
	</table>
</form>
</body>
</html>