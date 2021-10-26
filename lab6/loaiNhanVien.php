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
	$strSQL = 'SELECT * FROM loai_nv LIMIT '.$offset.','.$rowPerPage;
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		$gt = $_POST['gt'];
		$strSQL = 'SELECT * FROM loai_nv
		WHERE ten_loai_nv LIKE "%'.$gt.'%" OR ma_loai_nv like "%'.$gt.'%"
		LIMIT '.$offset.','.$rowPerPage;
	}
	$stt=1;
	$result = mysqli_query($dbc,$strSQL);
    while ($row = mysqli_fetch_array($result)){
        $dl .=  "<tr>";
        $dl .=  "<td>$stt</td>";
   	    $dl .=  "<td>$row[ma_loai_nv]</td>";
        $dl .=  "<td>$row[ten_loai_nv]</td>";
        $dl .=  "<td>
        		<a class='edit-btn' href='#'><i class='far fa-list-alt text-success'></i></a>
                <a class='edit-btn' href='#'><i class='far fa-edit text-primary'></i></a>
                <a class='edit-btn' href='#'><i class='far fa-trash-alt text-danger'></i></a>
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
	<legend>LOẠI NHÂN VIÊN</legend>
	<div align="center">
		<input type="text" name="gt" placeholder="Mã, tên loại NV..." width="200px" value="<?php if(isset($_POST['gt'])) echo $gt; ?>">
		<button type="submit" name="timKiem"><i class="fas fa-search fa-sm"></i></button>
	</div>
	<a class='btn' href='#'>Thêm mới</a>
	<table class='table table-striped' width='100%'>
        <thead>
                <td><b>#</b></td>
                <td><b>Mã loại</b></td>
                <td><b>Tên loại</b></td>
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