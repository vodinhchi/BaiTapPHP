<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BÀI TẬP TRÊN LỚP</title>
	<style type="text/css">
		form{
			display: flex;
		 	justify-content: center;
		}
		table{
			background-color: LightGreen;
		  	border: 1px solid black;
	    	border-radius: 15px;
	    	width: 30%;
		 	padding: 10px;

		}
		fieldset {
			background-color: Beige;
			color: black;
			border-radius: 15px;
		}
		legend {
		  	background-color: SeaGreen;
		  	color: white;
			padding: 5px 10px;
		  	border: 1px solid black;
	    	border-radius: 15px;
	    	box-shadow: 0 3px #999;
		}
		button{
		    padding: 5px 25px;
		    cursor: pointer;
		    text-align: center;
		    color: white;
		    background-color: SeaGreen ;
		    border-radius: 15px;
		    box-shadow: 0 3px #999;
		}
		input{
			color: DarkGreen;
			background-color: Snow; 
			border-radius: 15px;
			border: 2px solid SeaGreen;
			padding: 5px;
			margin: 5px;
		}
		select{
			border-radius: 15px;
			border: 2px solid SeaGreen;
			padding: 5px;
			margin: 3px;
			width: 95%;
		}
		thead{
			text-align: center;
			font-family: arial;
			font-weight: bold;
		}
		div{
			margin: 10px;
			padding: 10px;
			background-color: LightYellow;
			border-radius: 15px;
			border: 1px dashed SeaGreen;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			var checkedValue = $('input[type=radio][name="radioDT"]:checked').val();
			if(checkedValue == "GV") {
				$(".SV").hide();
				$(".GV").show();
			}
			else {
				$(".GV").hide();
				$(".SV").show();
			}
			$('input[type=radio][name=radioDT]').change(function() {
				if (this.value == 'GV') {
					$(".SV").hide();
					$(".GV").show();
				} else if (this.value == 'SV') {
					$(".GV").hide();
					$(".SV").show();
				}
			});
		});
	</script>
</head>
<body>
<?php 
abstract class Nguoi{
	protected $hoTen, $diaChi, $gioiTinh;

	public function __construct($hoTen, $diaChi, $gioiTinh)
	{
		$this->hoTen = $hoTen;
		$this->diaChi = $diaChi;
		$this->gioiTinh = $gioiTinh;
	}
	public function sethoTen($hoTen){
		$this->hoTen=$hoTen;
	}
	public function gethoTen(){
		return $this->hoTen;
	}
	public function setdiaChi($diaChi){
		$this->diaChi=$diaChi;
	}
	public function getdiaChi(){
		return $this->diaChi;
	}
	public function setgioiTinh($gioiTinh){
		$this->gioiTinh=$gioiTinh;
	}
	public function getgioiTinh(){
		return $this->gioiTinh;
	}
}
class GiangVien extends Nguoi{
	private $trinhDo;
	const luong = 1500000;
	public function __construct($hoTen, $diaChi, $gioiTinh, $trinhDo)
	{
		$this->hoTen = $hoTen;
		$this->diaChi = $diaChi;
		$this->gioiTinh = $gioiTinh;
		$this->trinhDo = $trinhDo;
	}
	public function setTrinhDo($trinhDo){
		$this->trinhDo = $trinhDo;
	}
	public function getTrinhDo($trinhDo){
		return $this->trinhDo;
	}
	public function tinhLuong(){
		switch ($this->trinhDo) {
			case 'Cử nhân':
				return self::luong*2.34;
				break;
			case 'Thạc sĩ':
				return self::luong*3.67;
				break;
			case 'Tiến sĩ':
				return self::luong*5.66;
				break;
		}
	}
}
class SinhVien extends Nguoi{
	private $lopHoc, $nganhHoc;
	public function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc)
	{
		$this->hoTen = $hoTen;
		$this->diaChi = $diaChi;
		$this->gioiTinh = $gioiTinh;
		$this->lopHoc = $lopHoc;
		$this->nganhHoc = $nganhHoc;
	}
	public function setLopHoc($lopHoc){
		$this->lopHoc = $lopHoc;
	}
	public function getLopHoc($lopHoc){
		return $this->lopHoc;
	}
	public function setnganhHoc($nganhHoc){
		$this->nganhHoc = $nganhHoc;
	}
	public function getnganhHoc($nganhHoc){
		return $this->nganhHoc;
	}
	public function tinhDiem(){
		$diem = 0;
		if($this->nganhHoc == "CNTT"){
			$diem = 1;
		}else if($this->nganhHoc == "KT"){
			$diem = 1.5;
		}else{
			$diem = 0;
		}
		return $diem;
	}
}
$str=NULL;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['radioDT'])){
		$doiTuong = $_POST['radioDT'];
		$hoTen = trim($_POST['hoTen']);
		$gioiTinh = $_POST['radioGT'];
		$diaChi = trim($_POST['diaChi']);
		$lopHoc = trim($_POST['lopHoc']);
		$nganhHoc = $_POST['nganhHoc'];
		$trinhDo = $_POST['trinhDo'];
		if($doiTuong == "GV"){
			$gv = new GiangVien($hoTen, $gioiTinh, $diaChi, $trinhDo);
			$str = "<div>" . "<b>Thông tin giảng viên:</b>" .
				"<br>Họ và tên: ". $hoTen .
				"<br>Giới tính: " . $gioiTinh . 
				"<br>Địa chỉ: " . $diaChi . 
				"<br>Trình độ: " . $trinhDo .
				"<br>Lương: " . $gv->tinhLuong() . " vnđ" . "</div>" ;
		}
		else if($doiTuong == "SV"){
			$sv = new SinhVien($hoTen, $gioiTinh, $diaChi,$lopHoc, $nganhHoc);
			$str = "<div>" . "<b>Thông tin sinh viên:</b>" .
				"<br>Họ và tên: ". $hoTen .
				"<br>Giới tính: " . $gioiTinh . 
				"<br>Địa chỉ: " . $diaChi . 
				"<br>Lớp học: " . $lopHoc .
				"<br>Ngành học: " . $nganhHoc .
				"<br>Điểm thưởng: " . $sv->tinhDiem() . "</div>" ;
		}
	}else $str = "Bạn chưa chọn đối tượng";
}
 ?>
<form method="post">
	<table>
		<thead><td colspan="2"><h3>THÔNG TIN GIẢNG VIÊN SINH VIÊN</h3></td></thead>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend>Chọn đối tượng</legend>
					<input type="radio" name="radioDT" value="GV" <?php if ((isset($_POST['radioDT']) && ($_POST['radioDT']) == "GV")) echo 'checked' ?> checked />Giảng viên
					<input type="radio" name="radioDT" value="SV" <?php if ((isset($_POST['radioDT']) && ($_POST['radioDT']) == "SV")) echo 'checked' ?>/>Sinh viên
				</fieldset>
			</td>
		</tr>
		<tr>
			<td>Họ tên:</td>
			<td><input style="width: 90%;" type="text" name="hoTen" value="<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen']; ?>" required></td>
		</tr>
		<tr>
			<td>Giới tính:</td>
			<td>
				<input type="radio" name="radioGT" value="Nam" <?php if ((isset($_POST['radioGT']) && ($_POST['radioGT']) == "Nam")) echo 'checked' ?> checked />Nam
				<input type="radio" name="radioGT" value="Nữ" <?php if ((isset($_POST['radioGT']) && ($_POST['radioGT']) == "Nữ")) echo 'checked' ?>>Nữ
			</td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><input style="width: 90%;" type="text" name="diaChi" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi']; ?>" required></td>
		</tr>
		<tr class="SV">
			<td class="SV">Lớp:</td>
			<td class="SV"><input style="width: 90%;" type="text" name="lopHoc" value="<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc']; ?>" required></td>
		</tr>
		<tr class="SV">
			<td class="SV">Ngành:</td>
			<td class="SV">
				<select name="nganhHoc">
					<option value="Công nghệ thông tin" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='Công nghệ thông tin') echo 'selected';?>>
						Công nghệ thông tin
					</option>
					<option value="Kinh tế" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='Kinh tế') echo 'selected';?>>
						Kinh tế
					</option>
					<option value="Các ngành khác" <?php if(isset($_POST['nganhHoc'])&& $_POST['nganhHoc']=='Các ngành khác') echo 'selected';?>>
						Các ngành khác
					</option>
				</select>
			</td>
		</tr>
		<tr class="GV">
			<td class="GV">Trình độ:</td>
			<td>
				<select name="trinhDo">
					<option value="Cử nhân" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='Cử nhân') echo 'selected';?>>
						Cử nhân
					</option>
					<option value="Thạc sĩ" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='Thạc sĩ') echo 'selected';?>>
						Thạc sĩ
					</option>
					<option value="Tiến sĩ" <?php if(isset($_POST['trinhDo'])&& $_POST['trinhDo']=='Tiến sĩ') echo 'selected';?>>
						Tiến sĩ
					</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><button value="hienThi" >Hiển thị thông tin</button></td>
		</tr>
		<tr>
			<td colspan="2"><?php echo $str; ?></td>
		</tr>
	</table>
</form>
</body>
</html>