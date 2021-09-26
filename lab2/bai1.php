<?php 
    $n = random_int(10, 1000);
    // hàm kiểm tra số nguyên tố
    function kiemTraNguyenTo($x){
       if ($x < 2) {
           return false;
       }
       for ($i=2; $i <= sqrt($x); $i++) { 
           if ($x % $i == 0 ){
                return false;
           }
       }
       return true;
    }
    echo "Câu a. Hiển thị các số nguyên tố nhỏ hơn $n: ";
    for ($i = 0; $i < $n; $i++) { 
        if(kiemTraNguyenTo($i)){
            echo ("$i". "; ");
        }
    }

    // hàm kiểm tra số có bao nhiêu chữ số
    function logarit($x){
        $dem = 0;
        while ($x>=10) {
            $x = $x/10;
            $dem++;
        }
        return $dem;
    }
    $soChuSo = logarit($n)+1;
    echo "</br>Câu b. Số nguyên $n có $soChuSo chữ số";

    // tìm chữ số lớn nhất trong số nguyên
    function chuSoLonNhat($x){
        $max = 0;
        for ($i=$x; $i!=0; $i/=10) { 
            $t = $i%10;
            if($t > $max){
                $max=$t;
            }
        }
        return $max;
    }
    $soLonNhat = chuSoLonNhat($n);
    echo "</br>Câu c. Chữ số lớn nhất trong số nguyên $n là: $soLonNhat";
?>