<table border="1px">
<tr>
	<td>Giải 8</td>
	<td style="color: red; font-size: 24; font-weight: bold;"><?php 
		$X = random_int(0,99);
		if(strlen($X)==1)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 7</td>
	<td><?php 
		$X = random_int(0,999);
		if(strlen($X)==1)	echo "00".$X;
		else if(strlen($X)==2)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 6</td>
	<?php 
	for ($i=0; $i < 3 ; $i++) { 
		echo "<td>";
			$X = random_int(0,9999);
			if(strlen($X)==1)	echo "000".$X;
			else if(strlen($X)==2)	echo "00".$X;
			else if(strlen($X)==3)	echo "0".$X;
			else echo $X;
		echo "</td>";
	}
	 ?>
</tr>
<tr>
	<td>Giải 5</td>
	<td><?php 
		$X = random_int(0,9999);
		if(strlen($X)==1)	echo "000".$X;
		else if(strlen($X)==2)	echo "00".$X;
		else if(strlen($X)==3)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 4</td>
	<?php 
	for ($i=0; $i < 7 ; $i++) { 
		echo "<td>";
			$X = random_int(0,99999);
			if(strlen($X)==1)	echo "0000".$X;
			else if(strlen($X)==2)	echo "000".$X;
			else if(strlen($X)==3)	echo "00".$X;
			else if(strlen($X)==4)	echo "0".$X;
			else echo $X;
		echo "</td>";
	}
	 ?>
</tr>
<tr>
	<td>Giải 3</td>
	<?php 
	for ($i=0; $i < 2 ; $i++) { 
		echo "<td>";
			$X = random_int(0,99999);
			if(strlen($X)==1)	echo "0000".$X;
			else if(strlen($X)==2)	echo "000".$X;
			else if(strlen($X)==3)	echo "00".$X;
			else if(strlen($X)==4)	echo "0".$X;
			else echo $X;
		echo "</td>";
	}
	 ?>
</tr>
<tr>
	<td>Giải 2</td>
	<td><?php 
		$X = random_int(0,99999);
		if(strlen($X)==1)	echo "0000".$X;
		else if(strlen($X)==2)	echo "000".$X;
		else if(strlen($X)==3)	echo "00".$X;
		else if(strlen($X)==4)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 1</td>
	<td><?php 
		$X = random_int(0,99999);
		if(strlen($X)==1)	echo "0000".$X;
		else if(strlen($X)==2)	echo "000".$X;
		else if(strlen($X)==3)	echo "00".$X;
		else if(strlen($X)==4)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải ĐB</td>
	<td style="color: red; font-size: 24; font-weight: bold;"><?php 
		$X = random_int(0,999999);
		if(strlen($X)==1)	echo "00000".$X;
		else if(strlen($X)==2)	echo "0000".$X;
		else if(strlen($X)==3)	echo "000".$X;
		else if(strlen($X)==4)	echo "00".$X;
		else if(strlen($X)==5)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
</table>