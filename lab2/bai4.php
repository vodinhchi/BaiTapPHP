<table border="1" bgcolor="lightgreen">
	<tr>
		<?php 
			$matran = array(array());
			$m = random_int(2, 5);	// dòng m
			$n = random_int(2, 5);	// cột n

			for ($i=0; $i < $m; $i++) { 
				echo "<tr>";
				for ($j=0; $j < $n; $j++) { 
					$matran[$i][$j] = rand(-100,100);
					echo "<td>" . $matran[$i][$j] . "</td>";
				}
				echo "</tr>";
			}
		 ?>
	</tr>
</table>