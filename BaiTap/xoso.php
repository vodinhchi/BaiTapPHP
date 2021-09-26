<style type="text/css">
	th, td{
    	border:1px solid gray;
    	height: 40;
	}
	table{
	    border-collapse:collapse;
	    text-align: center;
	    font-size: 20;
	    font-family: Arial;
	}
</style>

<h1 style="text-align: center">XỔ SỐ KHÁNH HÒA</h1>
<table>
<tr>
	<td style="width:150px">Giải 8</td>
	<td style="color: red; font-size: 24; font-weight: bold; width:150vw"><center><?php 
		$X = random_int(0,99);
		if(strlen($X)==1)	echo "0".$X;
		else echo $X;
	 ?></center></td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>Giải 7</td>
	<td><?php 
		$X = random_int(0,999);
		if(strlen($X)==1)		echo "00".$X;
		else if(strlen($X)==2)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 6</td>
	<td><?php 
	for ($i=0; $i < 3 ; $i++) { 
		$X = random_int(0,9999);
		if(strlen($X)==1)		echo "&emsp;"."000".$X;
		else if(strlen($X)==2)	echo "&emsp; "."00".$X;
		else if(strlen($X)==3)	echo "&emsp; "."0".$X;
		else echo "&emsp;".$X;
	}
	 ?></td>
	
</tr>
<tr bgcolor="#DCDCDC">
	<td>Giải 5</td>
	<td><?php 
		$X = random_int(0,9999);
		if(strlen($X)==1)		echo "000".$X;
		else if(strlen($X)==2)	echo "00".$X;
		else if(strlen($X)==3)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>Giải 4</td>
	<td><?php 
	for ($i=0; $i < 7 ; $i++) { 
		$X = random_int(0,99999);
		if(strlen($X)==1)		echo "&emsp;"."0000".$X;
		else if(strlen($X)==2)	echo "&emsp;"."000".$X;
		else if(strlen($X)==3)	echo "&emsp;"."00".$X;
		else if(strlen($X)==4)	echo "&emsp;"."0".$X;
		else echo "&emsp;".$X;
	}
	 ?></td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>Giải 3</td>
	<td><?php 
	for ($i=0; $i < 2 ; $i++) { 
		$X = random_int(0,99999);
		if(strlen($X)==1)		echo "&emsp;"."0000".$X;
		else if(strlen($X)==2)	echo "&emsp;"."000".$X;
		else if(strlen($X)==3)	echo "&emsp;"."00".$X;
		else if(strlen($X)==4)	echo "&emsp;"."0".$X;
		else echo "&emsp;".$X;
	}
	 ?></td>
</tr>
<tr>
	<td>Giải 2</td>
	<td><?php 
		$X = random_int(0,99999);
		if(strlen($X)==1)		echo "0000".$X;
		else if(strlen($X)==2)	echo "000".$X;
		else if(strlen($X)==3)	echo "00".$X;
		else if(strlen($X)==4)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>Giải 1</td>
	<td><?php 
		$X = random_int(0,99999);
		if(strlen($X)==1)		echo "0000".$X;
		else if(strlen($X)==2)	echo "000".$X;
		else if(strlen($X)==3)	echo "00".$X;
		else if(strlen($X)==4)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
<tr>
	<td>ĐB</td>
	<td style="color: red; font-size: 24; font-weight: bold;"><?php 
		$X = random_int(0,999999);
		if(strlen($X)==1)		echo "00000".$X;
		else if(strlen($X)==2)	echo "0000".$X;
		else if(strlen($X)==3)	echo "000".$X;
		else if(strlen($X)==4)	echo "00".$X;
		else if(strlen($X)==5)	echo "0".$X;
		else echo $X;
	 ?></td>
</tr>
</table>