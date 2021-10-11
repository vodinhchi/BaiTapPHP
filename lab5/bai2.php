<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 2 - lab 5</title>
	<style type="text/css">
		body{
			font-family: arial;
		}
		form{
			display: flex;
		 	justify-content: center;
		}
		table{
			border: 1px solid SeaGreen;
			background-image: url(https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg);
		    	border-radius: 15px;
		    	padding: 15px;
            		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		}
		input{
			background-color: AliceBlue;
			text-align: center;
			font-weight: bold;   
			border-radius: 10px;
			/*padding: 10px;*/
			border: 1px solid LightGoldenRodYellow;
		}
		hr{
			border: 1px solid black;
			color: black;
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
		thead{
			font-weight: bold;
			text-align: center;
			color: tomato;
		}		
		fieldset {
			color: black;
			border-radius: 15px;
		}
	</style>
</head>
<body>
<?php
class PHAN_SO
{	var $tuso, $mauso;
	function get_tuso(){
		return $this-> tuso;
	}
	function set_tuso($value){
		$this->tuso=$value;	
	}
	function get_mauso(){	
		return $this->mauso;
	}	
	function set_mauso($value){
		$this->mauso=$value;
	}
	function khoitao_ps($p_ts, $p_ms){
		$this->tuso=$p_ts;
		$this->mauso=$p_ms;
	}
	//tim USCLN cua 2 so
	function USCLN($a,$b)
	{	//neu phan so am thi doi dau cua tu so
		if($a<0) $a=(-1)*$a;
		$sonho=($a<$b)? $a :$b;
		for($i=$sonho;$i>0;$i--)
			if(($a%$i)==0 && ($b%$i)==0)
			{	//return $i;
				break;
			}
		return $i;
	
	}
	//toi gian phan so
	function toigian_ps()
	{	$uscln=$this->USCLN($this->tuso, $this->mauso);
		$this->tuso=$this->tuso/$uscln;
		$this->mauso=$this->mauso/$uscln;
		
	}
	//tinh tong hai phan so
	function tong($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=($this->tuso*$ps->mauso)+($ps->tuso*$this->mauso);
		$ps->mauso= $this->mauso*$ps->mauso;
		$ps->toigian_ps();
		return $ps;		
	}
	//tinh hieu 2 phan so
	function hieu($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=($this->tuso*$ps->mauso)- ($ps->tuso*$this->mauso);
		$ps->mauso= $this->mauso*$ps->mauso;
		$ps->toigian_ps();
		return $ps;
	}
	//tinh thương 2 phan so
	function tich($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);
		$ps->tuso=$this->tuso*$ps->tuso;
		$ps->mauso= $this->mauso*$ps->mauso;
		$ps->toigian_ps();
		return $ps;
	}

	function thuong($p_tuso,$p_mauso)
	{	$ps= new PHAN_SO();
		$ps->khoitao_ps($p_tuso,$p_mauso);

		$mautam = $ps->mauso;
		$tutam = $ps->tuso;
		
		$ps->tuso=$this->tuso*$mautam;
		$ps->mauso= $this->mauso*$tutam;
		$ps->toigian_ps();
		return $ps;
	}
		
}
?>
<?php
	$tuso_1=isset($_POST['tuso_1'])?$_POST['tuso_1']:'';
	$mauso_1=isset($_POST['mauso_1'])?$_POST['mauso_1']:'';
	$tuso_2=isset($_POST['tuso_2'])?$_POST['tuso_2']:'';
	$mauso_2=isset($_POST['mauso_2'])?$_POST['mauso_2']:'';
?>
<form id="form1" name="form1" method="post" action="">
 	<table>
 		<thead><td colspan="5"><h4>PHÉP TÍNH TRÊN PHÂN SỐ</h4></td></thead>
 		<tr>
 			<td></td>
 			<td><input name="tuso_1" size="1" type="text" id="tuso_1" size="10" maxlength="10" value="<?php echo $tuso_1?>"/></td>
 			<td></td>
 			<td></td>
 			<td><input name="tuso_2" size="1" type="text" id="tuso_2" size="10" maxlength="10" value="<?php echo $tuso_2?>"/></td>
 		</tr>
 		<tr>
 			<td>Phân số thứ nhất:</td>
 			<td><hr></td>
 			<td width="100px"></td>
 			<td>Phân số thứ hai:</td>
 			<td><hr></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><input name="mauso_1" size="1" type="text" id="mauso_1" size="10" maxlength="10" value="<?php echo $mauso_1?>"/></td>
 			<td></td>
 			<td></td>
 			<td><input name="mauso_2" size="1" type="text" id="mauso_2" size="10" maxlength="10" value="<?php echo $mauso_2?>"/></td>
 		</tr>
 		<tr>
 			<td colspan="5">
 				<fieldset>
				<legend>Chọn phép tính</legend>
				<input type="radio" name="pheptinh" value="cộng" <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="cộng") echo 'checked'?> /> Cộng
				<input type="radio" name="pheptinh" value="trừ" <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="trừ") echo 'checked'?>/> Trừ
				<input type="radio" name="pheptinh" value="nhân" <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="nhân") echo 'checked'?>/> Nhân
				<input type="radio" name="pheptinh" value="chia" <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="chia") echo 'checked'?>/> Chia
				</fieldset>
 			</td>
 		</tr>
 		<tr>
 			<td colspan="5" align="center">
 				<button name="Chon_pheptinh">Kết quả</button>
 			</td>
 		</tr>
 		<tr>
 			<td colspan="5" align="center">
 			<br>
 	<?php
	$ps_1=new PHAN_SO();
	$ps_1->set_tuso($tuso_1);
	$ps_1->set_mauso($mauso_1);
	$ps_2=new PHAN_SO();
	$ps_2->khoitao_ps($tuso_2,$mauso_2);
	$ketqua="";
	if (isset($_POST['Chon_pheptinh'])) 
	{
		$pheptinh=$_POST['pheptinh'];
		switch($pheptinh)
		{	case "cộng": 
				$ps=new PHAN_SO();
				$ps=$ps_1->tong($ps_2->tuso,$ps_2->mauso);
				$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."+".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
				break;
			case "trừ":
				$ps=new PHAN_SO();
				$ps=$ps_1->hieu($ps_2->tuso,$ps_2->mauso);
				$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."-".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
				break;
			case "nhân":
				$ps=new PHAN_SO();
				$ps=$ps_1->tich($ps_2->tuso,$ps_2->mauso);
				$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."*".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
				break;
			case "chia":
				$ps=new PHAN_SO();
				$ps=$ps_1->thuong($ps_2->tuso,$ps_2->mauso);
				$ketqua=$ps_1->get_tuso()."/".$ps_1->get_mauso()."/".$ps_2->get_tuso()."/".$ps_2->get_mauso()."=".$ps->get_tuso()."/".$ps->get_mauso();
				break;
		}
		echo "Phép ".$pheptinh." là : ". $ketqua;
	}
?>
 			</td>
 		</tr>
 	</table>
</form>
</body>
</html>

