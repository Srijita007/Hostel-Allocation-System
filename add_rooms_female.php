<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_POST["insert"]))
	{
		$query = "INSERT INTO female SET 
		Room_no ='".$_POST["Room_no"]."', 
		Floor_no ='".$_POST["Floor_no"]."', 
		Block_name ='F';";
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
				<h1>Add Room</h1>

				<form style="margin: auto;" method="POST">

					<table style="margin: auto;">
						<tr>
							<th>Room no. : </th>
							<td><input type="text" name="Room_no" pattern="[F][0-9]{3}" title="Must start with 'F' followed by 3 digits" value="" placeholder="F101"  required/></td>
						</tr>
						<tr>
							<th>Floor no. : </th>
							<td><input type="number" name="Floor_no" value="" placeholder="1" required/></td>
						</tr>
					</table>
					<input type="submit" name="insert" value="INSERT" class="button"/>
				</form>
				<button class="button back" onclick="document.location='./view_rooms.php'">Back</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>