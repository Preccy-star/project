<?php
	session_start();
	include "../connect.php";
?>

<?php 
	include "admin_page_header.php";
?>

<table style="color:white; margin-top: 60px;" id="table-style">
	<th>
		<tr>
			<th>Name</th>
			<th>Comments/th>
		</tr>
	</th>

	<tbody>
		<?php
			$query = "SELECT * FROM users";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0){
				//output data for each row
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>" . $row['fname'] . ' ' . $row['lname']. "</td><td>". $row['comments'] . "</td></tr>";
				}
			}else{
				echo "0 result";
			}

		?>
	</tbody>
</table>


	<!-- <a href="registration.php">ADD</a>
	<a href="index.php">BACK</a>
 -->
<?php 
	include "admin_page_footer.html";
?>