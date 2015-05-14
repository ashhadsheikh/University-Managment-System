<?php
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from course");
		oci_execute($sql2);	

		echo "<table border=1 style='width:880px'>";
			echo "<tr><th>Course code</th><th>Course Title</th><th>Credit Hours</th><th>Section </th><th>Semester</th><th>Year</th><th>Department</th><th>Pre-requisite </th></tr>";
		while($row=oci_fetch_array($sql2))
		{
			echo "<tr>";
			echo "<th> $row[0] </th>";
			echo "<th>" . $row[1] . "</th>";
			echo "<th>" . $row[2] . "</th>";
			echo "<th>" . $row[3] . "</th>";
			echo "<th>" . $row[4] . "</th>";
			echo "<th>" . $row[5] . "</th>";
			
			$sql = oci_parse($conn,"select * from department where d_no='$row[6]'");
			oci_execute($sql);	
			$row2=oci_fetch_array($sql);
			echo "<th>" . $row2[1] . "</th>";
			echo "<th>" . $row[7] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		
	?>