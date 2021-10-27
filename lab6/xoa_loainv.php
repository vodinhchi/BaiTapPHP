<?php 
    include('include/header.php');
    include("connection/connect_qlnv.php");
    $ma= $_REQUEST['ma'];
    $query="SELECT * 
    FROM loai_nv 
    WHERE ma_loai_nv = '$ma'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                echo '<form method="post" enctype="multipart/form-data">
                <fieldset>
                <legend>BẠN CÓ MUỐN XÓA</legend>';
                if(($_SERVER['REQUEST_METHOD'] == 'POST')){
                    $sql = "DELETE FROM loai_nv WHERE ma_loai_nv ='$ma'";
                    if (mysqli_query($dbc, $sql)) {
                        echo "<div class='alert alert-success' role='alert'>Xóa loại nhân viên thành công !
                            </div><script> setTimeout(function(){window.location='loaiNhanVien.php';},2000);</script>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Xóa không thành công !</div>";
                    }
                }
                echo '
                    <i>Mã loại: </i><b>'.$row["ma_loai_nv"].'</b></br>
                    <i>Tên loại: </i><b>'.$row["ten_loai_nv"].'</b>
                 <center>
                 <input type="submit" class="btn btn-danger" name="xoa" value="Xóa">
                 <a class="btn btn-success" href="loaiNhanVien.php">Quay lại</a>
                 </center> </fieldset></form>';
            }
        }
    mysqli_close($dbc);
    include('include/footer.html');
 ?>

