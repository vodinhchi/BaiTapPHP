<?php 
	// random số ngẫu nhiên a và b
	$a = random_int(1, 4);
	$b = random_int(10, 100);


	// câu lệnh switch
	switch ($a)
	{	
		// nếu a = 1
	    case 1:
	    	echo "1. Hình vuông cạnh $b</br>";
	        echo ("Chu vi hình vuông: ". $b*4 . "</br>");
	        echo ("Diện tích hình vuông: ". $b*$b);
	        break;
		// nếu a = 2
	    case 2:
	    	echo "2. Hình tròn bán kính $b</br>";
	    	echo ("Chu vi hình tròn: ". (float)(2*$b*3.14) . "</br>");
	        echo ("Diện tích hình tròn: ". (float)(3.14 * $b*$b));
	        break;
		// nếu a = 3
	    case 3:
	    	echo "3. Tam giác đều cạnh $b</br>";
	    	echo ("Chu vi hình tam giác đều: " . $b*3 . "</br>");
	        echo ("Diện tích hình tam giác đều: ". (float)($b*$b*(sqrt(3)/4)));
	        break;
		// nếu a = 4
	    case 4 :
	    	echo "4. Hình chữ nhật cạnh $a và $b</br>";
	    	echo ("Chu vi hình chữ nhật: " . ($a+$b)*2 . "</br>");
	        echo ("Diện tích hình chữ nhật: ". $a*$b);
	        break;
	}
 ?>