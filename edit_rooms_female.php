<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query = "SELECT * FROM female WHERE R_id = '".$_REQUEST["id_female"]."';";
	$result = mysqli_query($connection, $query);
	$fetch = mysqli_fetch_object($result);

	if (isset($_POST["update"]))
	{
		$query = "UPDATE female SET 
			Room_no ='".$_POST["Room_no"]."', 
			Floor_no ='".$_POST["Floor_no"]."', 
			Block_name ='".$_POST["Block_name"]."' WHERE R_id = '".$_REQUEST["id_female"]."';";
			
		mysqli_query($connection, $query);
		header("location: view_rooms.php");
	}

?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>

		<div id="page" class="container">
			<div class="title">
				<h1>Edit Room</h1>
				<br>

				<form style="margin: auto;" method="POST">

					<table style="margin: auto;">
						<tr>
							<th>Room no.: </th>
							<td><input type="text" name="Room_no" pattern="[F][0-9]{3}" title="Must start with 'F' followed by 3 digits" value="<?php echo $fetch->Room_no ?>" required/></td>
						</tr>
						<tr>
							<th>Floor no.: </th>
							<td><input type="text" name="Floor_no" value="<?php echo $fetch->Floor_no ?>" required/></td>
						</tr>
						<tr style="display:none">
							<th>Building no.: </th>
							<td><input type="text" name="Block_name" value="<?php echo $fetch->Block_name ?>" /></td>
						</tr>
					</table>

					<input class="button" type="submit" name="update" value="UPDATE" />

				</form>
				<button class="button back" onclick="document.location='./view_rooms.php'">Back</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>