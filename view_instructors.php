<?php
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from instructor");
		oci_execute($sql2);	

		echo "<table border=1 style='width:1080px'>";
			echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Gender </th><th>Blood Group</th><th>DOB</th><th>CNIC</th><th>Email </th>
			<th>Room# </th><th>Department </th></tr>";
		while($row=oci_fetch_array($sql2))
		{
			echo "<tr>";
			echo "<th> $row[0] </th>";
			echo "<th>" . $row[1] . "</th>";
			echo "<th>" . $row[2] . "</th>";
			echo "<th>" . $row[3] . "</th>";
			echo "<th>" . $row[4] . "</th>";
			echo "<th>" . $row[5] . "</th>";
			echo "<th>" . $row[6] . "</th>";
			echo "<th>" . $row[7] . "</th>";
			echo "<th>" . $row[8] . "</th>";
			$sql = oci_parse($conn,"select * from department where d_no='$row[10]'");
			oci_execute($sql);	
			$row2=oci_fetch_array($sql);
			echo "<th>" . $row2[1] . "</th>";
			
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		
	?>