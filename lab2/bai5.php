<?php
    function kiemTraNguyenTo($n){
        if ($n < 2) {
            return false;
        }
        $squareRoot = sqrt($n);
        for ($i = 2; $i <= $squareRoot; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
    $number = rand(-100, 100);
    echo "Số được tạo là: $number <br>";
    $fp = @fopen('soNT.txt', "a+");
    
    if (!$fp){
        echo 'Mở file không thành công';
    }
    else if(kiemTraNguyenTo($number)){
        echo "$number là số nguyên tố đã đưa vào lưu trữ trong tập tin có tên là soNT.txt";
        $data = "$number" . "\n";
        
        fwrite($fp, $data);

        fclose($fp);
    }
    else{
        echo "$number không phải là số nguyên tố";
    }
?>
