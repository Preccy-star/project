<?php
	session_start();
	include "../connect.php";
?>

<?php 
	include "sadmin_page_header.php";
?>

<table style="color:black; margin-top: 60px;" id="table-style">
	<th>
		<tr>
			<th>Name</th>
			<th>Date of Birth</th>
			<th>Email</th>
			<th>Status</th>
			<th>Permission</th>
			<th>Organization</th>
		</tr>
	</th>

	<tbody>
		<?php
			$query = "SELECT * FROM users";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0){
				//output data for each row
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>" . $row['fname'] . ' ' . $row['lname']. "</td><td>". $row['date_of_birth']. "</td><td>". $row['email']. "</td><td>". $row['status']. "</td><td>". $row['permission']. "</td><td>". $row['organization']. "</td><td>" . "<a href='activate_user.php?id=". $row["id"]. "'>ACTIVATE</a>&nbsp;". "<a href='deactivate_user.php?id=". $row["id"]. "'>DEACTIVATE</a>". "</td></tr>";
				}
			}else{
				echo "0 result";
			}

		?>
	</tbody>
</table>


	<a href="registration.php">ADD</a>
	<a href="index.php">BACK</a>

<?php 
	include "sadmin_page_footer.html";
?>