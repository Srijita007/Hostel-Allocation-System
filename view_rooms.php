<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_REQUEST["del_id_male"]))
	{
		$query = "DELETE FROM male WHERE R_id = '".$_REQUEST["del_id_male"]."';";
		mysqli_query($connection, $query);
		header("location: view_rooms.php");
	}

	if (isset($_REQUEST["del_id_female"]))
	{
		$query = "DELETE FROM female WHERE R_id = '".$_REQUEST["del_id_female"]."';";
		mysqli_query($connection, $query);
		header("location: view_rooms.php");
	}

	if (isset($_REQUEST["status"]))
	{
		$query = "UPDATE male SET Status = '".$_REQUEST["status"]."' WHERE R_id = '".$_REQUEST["id_male"]."';";
		mysqli_query($connection, $query);
		header("location: view_rooms.php");
	}

	if (isset($_REQUEST["status"]))
	{
		$query = "UPDATE female SET Status = '".$_REQUEST["status"]."' WHERE R_id = '".$_REQUEST["id_female"]."';";
		mysqli_query($connection, $query);
		header("location: view_rooms.php");
	}

	$query_2 = "SELECT * FROM male;";
	$result_2 = mysqli_query($connection, $query_2);

	$query_3 = "SELECT * FROM female;";
	$result_3 = mysqli_query($connection, $query_3);
?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<h1>View all the rooms</h1>
				<br>

				<table class="table" style="margin: auto; width: 60%">
					<tr>
						<th>Room no.</th>
						<th>Floor no.</th>
						<th>Block name</th>
						<th>Status</th>
						<th>Edit Rooms</th>
						<th>Delete Rooms</th>
					</tr>
					<?php while ($fetch = mysqli_fetch_object($result_2)) { ?>
					<tr>
						<td>
							<?php echo $fetch->Room_no; ?>
						</td>
						<td>
							<?php echo $fetch->Floor_no; ?>
						</td>
						<td>
							<?php echo $fetch->Block_name; ?>-block
						</td>
						<td>
							<?php if ($fetch->Status == "Available") { ?>
							<a class="status" href="./view_rooms.php?status=Unavailable&id_male=<?php echo $fetch->R_id; ?>">Available</a>
							<?php }
							else if ($fetch->Status == "Unavailable") { ?>
							<a class="status" href="./view_rooms.php?status=Available&id_male=<?php echo $fetch->R_id; ?>">Unavailable</a>
							<?php } ?>
						</td>
						<td>
							<a href="./edit_rooms_male.php?id_male=<?php echo $fetch->R_id; ?>">EDIT</a>
						</td>
						<td>
							<a href="./view_rooms.php?del_id_male=<?php echo $fetch->R_id; ?>">DELETE</a>
						</td>
					</tr>
					<?php } ?>


					<?php while ($fetch_3 = mysqli_fetch_object($result_3)) { ?>
					<tr>
						<td>
							<?php echo $fetch_3->Room_no; ?>
						</td>
						<td>
							<?php echo $fetch_3->Floor_no; ?>
						</td>
						<td>
							<?php echo $fetch_3->Block_name; ?>-block
						</td>
						<td>
							<?php if ($fetch_3->Status == "Available") { ?>
							<a class="status" href="./view_rooms.php?status=Unavailable&id_female=<?php echo $fetch_3->R_id; ?>">Available</a>
							<?php }
							else if ($fetch_3->Status == "Unavailable") { ?>
							<a class="status" href="./view_rooms.php?status=Available&id_female=<?php echo $fetch_3->R_id; ?>">Unavailable</a>
							<?php } ?>
						</td>
						<td>
							<a href="./edit_rooms_female.php?id_female=<?php echo $fetch_3->R_id; ?>">EDIT</a>
						</td>
						<td>
							<a href="./view_rooms.php?del_id_female=<?php echo $fetch_3->R_id; ?>">DELETE</a>
						</td>
					</tr>
					<?php } ?>
				</table>

				<br>
				<button class="button back add_rooms" onclick="document.location='./add_rooms_male.php'">ADD ROOM (MALE)</button>
				<button class="button back add_rooms" onclick="document.location='./add_rooms_female.php'">ADD ROOM (FEMALE)</button>
				<br>
				<button style="width:100px" class="button back" onclick="document.location='./admin.php'">Back</button>
				<button style="width:100px" class="button back" onclick="document.location='./handle_login.php?logout=true'">Logout</button>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>
</body>

</html>