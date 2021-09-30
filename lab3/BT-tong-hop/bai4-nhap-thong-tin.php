<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nhập thông tin</title>
	<style type="text/css">
		legend{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_POST['ten']))
			$ten = $_POST['ten'];
		else $ten = "";

		if(isset($_POST['dia_chi']))
			$dia_chi = $_POST['dia_chi'];
		else $dia_chi = "";

		if(isset($_POST['sdt']))
			$sdt = $_POST['sdt'];
		else $sdt = "";
	 ?>
	<form action="bai4-xu-li-thong-tin.php" method="post">
		<fieldset>
			<legend>Enter Your Information</legend>
			<table>
				<tr>
					<td>Họ và tên:</td>
					<td><input type="text" name="ten" size="40" value="<?php echo $ten ?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td><input type="text" name="dia_chi" size="40" value="<?php echo $dia_chi ?>"></td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td><input type="text" name="sdt" size="40" value="<?php echo $sdt ?>"></td>
				</tr>
				<tr>
					<td>Giới tính:</td>
					<td>
						<input type="radio" name="rdGioiTinh" value="Nam" <?php if(isset($_POST['rdGioiTinh']) && $_POST['rdGioiTinh']=='nam') echo 'checked = "checked"' ?>checked>Nam
						<input type="radio" name="rdGioiTinh" value="Nữ" <?php if(isset($_POST['rdGioiTinh']) && $_POST['rdGioiTinh']=='nu') echo 'checked = "checked"' ?>>Nữ
					</td>
				</tr>
				<tr>
					<td>Quốc tịch:</td>
					<td>
						<select name="quoc_tich">
							<option value="Việt Nam" <?php if(isset($_POST['quoc_tich'])&& $_POST['quoc_tich']=='viet_nam') echo 'selected';?>>Việt Nam</option>
							<option value="Lào" <?php if(isset($_POST['quoc_tich'])&& $_POST['quoc_tich']=='lao') echo 'selected';?>>Lào</option>
							<option value="Trung Quốc" <?php if(isset($_POST['quoc_tich'])&& $_POST['quoc_tich']=='trung_quoc') echo 'selected';?>>Trung Quốc</option>
							<option value="Thái Lan" <?php if(isset($_POST['quoc_tich'])&& $_POST['quoc_tich']=='thai_lan') echo 'selected';?>>Thái Lan</option>
							<option value="Ấn Độ" <?php if(isset($_POST['quoc_tich'])&& $_POST['quoc_tich']=='an_do') echo 'selected';?>>Ấn Độ</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Các môn đã học:</td>
					<td>
						<input type="checkbox" name="chk1" value="PHP & MySQL" <?php if(isset($_POST['chk1'])&& $_POST['chk1']=='php_sql') echo 'checked'; else echo ""?>/>PHP & MySQL
						<input type="checkbox" name="chk2" value="C#" <?php if(isset($_POST['chk2'])&& $_POST['chk2']=='c_sharp') echo 'checked'; else echo ""?>/>C#
						<input type="checkbox" name="chk3" value="XML" <?php if(isset($_POST['chk3'])&& $_POST['chk3']=='xml') echo 'checked'; else echo ""?>/>XML
						<input type="checkbox" name="chk4" value="Python" <?php if(isset($_POST['chk4'])&& $_POST['chk4']=='python') echo 'checked'; else echo ""?>/>Python
					</td>
				</tr>
				<tr>
					<td>Ghi chú:</td>
					<td><textarea cols="38" rows="5" name="ghi_chu" > <?php if(isset($_POST['ghi_chu'])) echo $_POST['ghi_chu']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Gửi"> <input type="reset" value="Hủy"></td>
				</tr>
			</table>
		</fieldset>		
	</form>
</body>
</html>