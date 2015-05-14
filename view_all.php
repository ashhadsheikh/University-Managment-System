	<?php
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from pass");
		oci_execute($sql2);	

		echo "<table border=1 style='width:880px'>";
			echo "<tr><th>Username</th><th>Password</th><th>Role</th></tr>";
		while($row=oci_fetch_array($sql2))
		{
			echo "<tr>";
			echo "<th>" . $row[0] . "</th>";
			echo "<th>" . $row[1] . "</th>";
			echo "<th>" . $row[2] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		
		
	?>