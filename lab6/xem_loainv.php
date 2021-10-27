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
                <legend>THÔNG TIN CHI TIẾT</legend>
                    <i>Mã loại: </i><b>'.$row["ma_loai_nv"].'</b></br>
                    <i>Tên loại: </i><b>'.$row["ten_loai_nv"].'</b>
                 <center>
                 <a class="btn btn-warning" href="sua_loainv.php?ma='.$ma.'">Sửa</a>
                 <a class="btn btn-success" href="loaiNhanVien.php">Quay lại</a>
                 </center> </fieldset></form>';
            }
        }
    mysqli_close($dbc);
    include('include/footer.html');
 ?>

