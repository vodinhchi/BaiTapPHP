<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bảng cửu chương</title>
</head>
<body>
    <table border="1">
        <tr>
            <?php 
                for ($i=1; $i <= 10 ; $i++) {
                    echo "<td>";                     
                    for ($j=1; $j <= 10; $j++) { 
                        $kq = $i*$j;
                        echo ("$i x $j = $kq" . "<br>");
                    }
                    echo "</td>";  
                }
            ?>
        </tr>
    </table>
</body>
</html>