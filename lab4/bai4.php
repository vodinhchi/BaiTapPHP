<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 4 - Đình Chí</title>
	<style type="text/css">
		<?php include 'styleBT.css'; ?>
	</style>
</head>
<body>
<?php 
	$kq = "";
	if(isset($_POST['m']))	$m = $_POST['m'];	// số dòng
	else $m = 0;
	if(isset($_POST['n']))	$n = $_POST['n'];	// số cột
	else $n = 0;
	// In ra ma trận vừa mới tạo.
	function taoMaTran($m, $n, &$arr, &$kq){
		$kq .= "Câu a: In ma trận: " . "&#13;&#10;";
		for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $arr[$i][$j] = rand(-200, 200);
                $kq .= $arr[$i][$j] . " ";
            }
            $kq .=  "&#13;&#10;";
        }
	}
	// Đếm số phần tử có chữ số cuối là số lẻ.
	function demSoLe($m, $n, &$arr, &$kq){
		$dem = 0;
		for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($arr[$i][$j] % 2 !== 0) {
                    $dem = $dem + 1;
                }
            }
        }
        $kq .= "&#13;&#10;" . "Câu b: Số phần tử lẻ trong ma trận: " . $dem . "&#13;&#10;";
	}
	// Thay thế các phần tử khác 0 thành 1. In ra ma trận sau khi thay thế.
	function thaySo($m, $n, &$arr, &$kq){
		$kq .=  "&#13;&#10;" . "Câu c: In lại ma trận sau khi thay thế các phần tử khác 0 thành 1: " . "&#13;&#10;";
		for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($arr[$i][$j] !== 0){
                	$arr[$i][$j] = 1;
                }
                else{
                	$arr[$i][$j] = $arr[$i][$j];
                }
                $kq .= $arr[$i][$j] . " ";
            }
            $kq .=  "&#13;&#10;";
        }
	}
	if (isset($_POST['thuchien'])){
		$arr = array();
		taoMaTran($m, $n, $arr, $kq);
	    demSoLe($m, $n, $arr, $kq);
       	thaySo($m, $n, $arr, $kq);
	}
 ?>
<form method="post">
	<table>
		<thead>
			<td colspan="3">THAO TÁC VỚI MA TRẬN</td>
		</thead>
		<tr>
			<td colspan="3"><hr></td>
		</tr>
		<tr>
			<td></td>
			<td>m = <input type="number" name="m" value="<?php echo $m ?>"></td>
			<td>n = <input type="number" name="n" value="<?php echo $n ?>"></td>
		</tr>
		<tr>
			<td>Kết quả:</td>
			<td colspan="2"><textarea name="kq" cols="60" rows="10"><?php echo $kq ?></textarea></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><button name="thuchien">Thực hiện</button></td>
		</tr>
	</table>
</form>
</body>
</html>