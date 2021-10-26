<?php
session_start();
    if (!isset($_SESSION['username'])) {
       header('Location: dangnhap.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  type="text/css" href="include/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>

<div class="header" style="height: 150px;">
  <h2 style="text-align: center;">QUẢN LÝ</h2>
    <p style="text-align: center;">Nhân Viên - Phòng Ban</p>

  	<?php 
        if (isset($_SESSION['username']) && $_SESSION['username']!=NULL) {
      ?>
      <p style="float:right">Bạn đang đăng nhập với tên <?php echo $_SESSION['username']; ?></p>
  	<?php 
        }
      ?>
</div>

<ul>
  <li><a href="index.php">NHÂN VIÊN</a></li>
  <li><a href="loaiNhanVien.php">LOẠI NHÂN VIÊN</a></li>
  <li><a href="phongBan.php">PHÒNG BAN</a></li>
  <li style="float:right;border-left: 1px solid #db7093;"><a href="dangxuat.php">ĐĂNG XUẤT</a></li>
</ul>
<div class="container">

