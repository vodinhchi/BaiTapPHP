<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 1</title>
	<style type="text/css">
		<?php include 'styleBT.css'; ?>
	</style>
</head>
<body>
<?php 
	$kq = "";

	if(isset($_POST['n']))	$n = $_POST['n'];
	else 					$n = 0;

	function sapXep($vitri, $n, $so, &$arr, &$kq){
		// explode($so,$arr,2);
		$arr1 = array();
		for ($i=0; $i < $vitri; $i++) { 
			$arr1[$i] = $arr[$i];
		}
		asort($arr1);

		$arr2 = array();
		for ($i= $n; $i > $vitri ; $i--) { 
			$arr2[$i] = $arr[$i];
		}
		arsort($arr2);
		array_push($arr1, $so);
		$arr = $arr1 + $arr2;
		$kq .= "Mảng sau sắp xếp: " . implode(", ", $arr) . "&#13;&#10;";
	}
	if (isset($_POST['hthi'])) {
		// tạo mảng
		$arr = array();
		for ($i=0; $i < $n; $i++) { 
			$x = rand(-200,200);
			$arr[$i] = $x;
		}
		$kq = "Mảng được tạo là: " . implode(", ", $arr) . "&#13;&#10;";

		// sắp xếp
		sort($arr);
		$kq .= "Mảng sau sắp xếp là: " . implode(", ", $arr) . "&#13;&#10;";

		// thêm số
		$vitri = rand(0, $n);
		$so = rand(-200,200);
		array_splice($arr, $vitri, 0, $so);
		$vt = $vitri + 1;
		$kq .= "Thêm số $so vào vị trí $vt: " . implode(", ", $arr) . "&#13;&#10;";

		// funtion
		sapXep($vitri, $n, $so, $arr, $kq);
	}

 ?>
<form method="post">
	<table>
		<tr>
			<td>Nhập n</td>
			<td><input type="number" name="n" value="<?php echo $n ?>"></td>
		</tr>
		<tr>
			<td>Kết quả</td>
			<td><textarea cols="70" rows="10" name="kq"><?php echo $kq ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><button name="hthi">Hiển thị</button></td>
		</tr>
		
	</table>
</form>
</body>
</html>