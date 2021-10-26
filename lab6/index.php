<?php 
	include ('include/header.php');
	include ("connection/connect_qlnv.php");
	$dl = "";
	$gt = "";
	$rowPerPage=4;
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    $offset=($_GET['page']-1)*$rowPerPage;

	$strSQL = 'SELECT * 
	FROM nhan_vien JOIN phong_ban JOIN loai_nv
	ON nhan_vien.ma_phong = phong_ban.ma_phong AND nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv
	LIMIT '.$offset.','.$rowPerPage;

	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		$gt = $_POST['gt'];
		$strSQL = 'SELECT * 
	FROM nhan_vien JOIN phong_ban JOIN loai_nv
	ON nhan_vien.ma_phong = phong_ban.ma_phong AND nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv
	WHERE ho LIKE "%'.$gt.'%" OR ten like "%'.$gt.'%" OR CONCAT(ho, " ", ten) like "%'.$gt.'%"
	LIMIT '.$offset.','.$rowPerPage;
	}
	$stt=1;
	$result = mysqli_query($dbc,$strSQL);
    while ($row = mysqli_fetch_array($result)){
    	if ($row['gioi_tinh'] == 1)	$row['gioi_tinh'] = "Nam";
		else 				$row['gioi_tinh'] = "Nữ";
                $dl .=  "<tr>";
                $dl .=  "<td>$stt</td>";
                $dl .=  "<td>$row[ma_nv]</td>";
                $dl .=  "<td><img src='anh_nhan_vien/$row[anh]' style='border-radius: 50%;' width='30px' height='30px'></td>";
                $dl .=  "<td>$row[ho] $row[ten]</td>";
                $dl .=  "<td>$row[ngay_sinh]</td>";
                $dl .=  "<td>$row[gioi_tinh]</td>";
                $dl .=  "<td>$row[dia_chi]</td>";
                $dl .=  "<td>$row[ten_loai_nv]</td>";
                $dl .=  "<td>$row[ten_phong]</td>";
                $dl .=  "<td>
                <a class='edit-btn' href='xem_nv.php?ma=".$row[0]."'><i class='far fa-list-alt text-success'></i></a>
                <a class='edit-btn' href='sua_nv.php?ma=".$row[0]."'><i class='far fa-edit text-primary'></i></a>
                <a class='edit-btn' href='xoa_nv.php?ma=".$row[0]."'><i class='far fa-trash-alt text-danger'></i></a>
                </td>";
                $dl .=  "</tr>";
            $stt+=1;
    }
    $re = mysqli_query($dbc,$strSQL);
    $numRow = mysqli_num_rows($re);
    $maxPage = floor($numRow/$rowPerPage)+1;
?>

<form method="post">
  <fieldset>
	<legend>NHÂN VIÊN</legend>
	<div align="center">
		<input type="text" name="gt" placeholder="Tên nhân viên..." width="200px" value="<?php if(isset($_POST['gt'])) echo $gt; ?>">
		<button type="submit" name="timKiem"><i class="fas fa-search fa-sm"></i></button>
	</div>
	<a class='btn mb-1' href='them_nhanvien.php'>Thêm mới</a>
	<table class='table table-striped' width='100%'>
        <thead>
                <td><b>STT</b></td>
                <td><b>Mã NV</b></td>
                <td><b>Ảnh</b></td>
                <td><b>Họ & tên</b></td>
                <td><b>Ngày sinh</b></td>
                <td><b>Giới tính</b></td>
                <td><b>Địa chỉ</b></td>
                <td><b>Loại</b></td>
                <td><b>Phòng ban</b></td>
                <td><b>Chức năng</b></td>
        </thead>
        <tr>
        	<?php echo $dl;?>
        </tr>
    </table>
    <?php 
        echo '<center>';
		$re = mysqli_query($dbc, $strSQL);
		$numRow = mysqli_num_rows($re);
		$maxPage = floor($numRow/$rowPerPage)+1;

		//gắn thêm nút Back
		if ($_GET['page'] > 1){
			echo "<a class=btn href=". $_SERVER['PHP_SELF']."?page=1> TRANG ĐẦU</a>";
			echo "<a class=btn href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</i></a> ";	
		}

		for ($i=1 ; $i<=$maxPage ; $i++)
		{ 	if ($i == $_GET['page'])
			{ echo '<b style="color:red">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
			}
			else
			echo "<a class=btn href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
		}

		//gắn thêm nút Next
		if ($_GET['page'] < $maxPage){
			echo "<a class=btn href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a>";		
			echo "<a class=btn href=". $_SERVER['PHP_SELF']."?page=".$maxPage."> TRANG CUỐI</a>";		
		}
		echo '</center>';
    ?>
  </fieldset>
</form>
<?php
	mysqli_close($dbc);
    include ('include/footer.html');
?>