<?php 
    include('include/header.php');
    include("connection/connect_qlnv.php");
    $ma= $_REQUEST['ma'];
    $query="SELECT * 
    FROM nhan_vien JOIN phong_ban JOIN loai_nv
    ON nhan_vien.ma_phong = phong_ban.ma_phong AND nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv
    WHERE ma_nv = '$ma'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                if ($row['gioi_tinh'] == 1) $row['gioi_tinh'] = "Nam";
                else                $row['gioi_tinh'] = "Nữ";
                echo '<form method="post" enctype="multipart/form-data">
                <fieldset>
                <legend>BẠN CÓ CHẮC CHẮN MUỐN XÓA</legend>';
                if(($_SERVER['REQUEST_METHOD'] == 'POST')){
                    $sql = "DELETE FROM nhan_vien WHERE ma_nv ='$ma'";
                    if (mysqli_query($dbc, $sql)) {
                        echo "<div class='alert alert-success' role='alert'>Xóa nhân viên thành công !
                            </div><script> setTimeout(function(){window.location='index.php';},3000);</script>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Xóa không thành công !</div>";
                    }
                }
                echo '
                    <div class="row">
                        <div class="col-lg-6 col-sm-12"><img style="width:80%; float:right" src="anh_nhan_vien/'.$row['anh'].'" /></div>
                        <div class="col-lg-6 col-sm-12">
                            <label>Mã NV:'.$row['ma_nv'].'</label><br>
                            <label>Họ tên:'.$row['ho'].' '.$row['ten'].'</label><br>
                            <label>Giới tính: '.$row['gioi_tinh'].'</label><br>
                            <label>Ngày sinh: '.$row['ngay_sinh'].'</label><br>
                            <label>Địa chỉ: '.$row['dia_chi'].'</label><br>
                            <label>Loại: '.$row['ten_loai_nv'].'</label><br>
                            <label>Phòng ban: '.$row['ten_phong'].'</label><br>
                        </div>
                    </div>
                 <center><input type="submit" class="btn btn-danger" name="xoa" value="Xóa">
                 <a class="btn btn-success" href="index.php">Quay lại</a>
                 </center></fieldset></form>';
            }
        }
    
    mysqli_close($dbc);
    include('include/footer.html');
 ?>
