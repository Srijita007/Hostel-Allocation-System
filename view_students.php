<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_REQUEST["del_id"]))
	{
		$query = "DELETE FROM students WHERE S_id = '".$_REQUEST["del_id"]."';";
		mysqli_query($connection, $query);
		header("location: view_students.php");
	}

	$query_2 = "SELECT * FROM students;";
	$result = mysqli_query($connection, $query_2);
?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<h1>View all the Students</h1>

				<table class="table" style="margin: auto;">
					<tr>
						<th>Student ID</th>
						<th>Name</th>
						<th>Contact no.</th>
						<th>Email ID</th>
						<th>Address</th>
						<th>Room No.</th>
						<th>Profile Picture</th>
						<th>Edit Students</th>
						<th>Delete Students</th>
					</tr>
					<?php while ($fetch = mysqli_fetch_object($result)) { ?>
					<tr>
						<td>
							<?php echo $fetch->S_id; ?>
						</td>
						<td>
							<?php echo $fetch->Name; ?>
						</td>
						<td>
							<?php echo $fetch->Phn_no; ?>
						</td>
						<td>
							<?php echo $fetch->Email; ?>
						</td>
						<td>
							<?php echo $fetch->Address; ?>
						</td>
						<td>
							<?php echo $fetch->Room_no; ?>
						</td>
						<td>
						<img src="./Student_Images/<?php echo $fetch->Profile_pic; ?>" alt="Profile Picture" style="max-width: 50px; max-height: 50px;" />
						</td>
						<td>
							<a href="./edit_students.php?id=<?php echo $fetch->S_id; ?>Room_no=<?php echo $fetch->Room_no; ?>">EDIT</a>
						</td>
						<td>
							<a href="./view_students.php?del_id=<?php echo $fetch->S_id; ?>">DELETE</a>
						</td>
					</tr>
					<?php } ?>
				</table>

				<br>
				<button class="button" onclick="document.location='./admin.php'">BACK</button>
				<button class="button" onclick="document.location='./gender.php'">ADD NEW STUDENT</button>
				<?php include "./logout.php"; ?>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>