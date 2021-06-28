<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_POST["insert"]))
	{
		$file_name = "";

		if (isset($_FILES["Profile_pic"])) 
		{
			$folder = "Student_Images/";
			$file_exts = array("jpg", "jpeg", "bmp", "gif", "png", "doc", "docx", "pdf");
			$value = explode(".", $_FILES["Profile_pic"]["name"]);
			$uploaded_exts = end($value);

			if ((($_FILES["Profile_pic"]["type"] == "image/gif")
			|| ($_FILES["Profile_pic"]["type"] == "image/jpeg")
			|| ($_FILES["Profile_pic"]["type"] == "image/jpg")
			|| ($_FILES["Profile_pic"]["type"] == "image/png")
			|| ($_FILES["Profile_pic"]["type"] == "application/doc")
			|| ($_FILES["Profile_pic"]["type"] == "application/docx")
			|| ($_FILES["Profile_pic"]["type"] == "application/pdf"))
			&& ($_FILES["Profile_pic"]["size"] < 2000000000)
			&& in_array($uploaded_exts, $file_exts))
			{
				if ($_FILES["Profile_pic"]["error"] > 0)
				{
				}
				else
				{
					if (file_exists("$folder/" . $_FILES["Profile_pic"]["name"]))
					{
						echo "<div class='error'>" . "{" . $_FILES["Profile_pic"]["name"] . "}" . "already exists." . "</div>";
					}
					else
					{
						$ran = md5(time().rand());
						$file_name = $ran . "." . $uploaded_exts;
						move_uploaded_file($_FILES["Profile_pic"]["tmp_name"], $folder . $file_name);
					}
				}
			}
		}

		$query = "INSERT INTO students SET 
			Name ='".$_POST["Name"]."', 
			Room_no ='".$_POST["Room_no"]."', 
			Email = '".$_POST["Email"]."', 
			Phn_no = '".$_POST["Phn_no"]."', 
			Address = '".$_POST["Address"]."', 
			Profile_pic = '".$file_name."';";

		mysqli_query($connection, $query);
		header("location: view_students.php");
	}

	$query_2 = "SELECT * FROM male WHERE Status = 'Available';";
	$result = mysqli_query($connection, $query_2);
?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<h1>Add Students</h1>
				<br>
				<form style="margin: auto;" method="POST" enctype="multipart/form-data">

					<table style="margin: auto;">
						<tr>
							<th>Name: </th>
							<td><input type="text" name="Name" value="" pattern="([a-zA-Z\s]){1,}" title="Must contain only letters" placeholder="Harry Potter" required/></td>
						</tr>
						<tr>
							<th>Email: </th>
							<td><input type="email" name="Email" value="" placeholder="harry@hogwarts.com" required/></td>
						</tr>
						<tr>
							<th>Address: </th>
							<td><input type="text" name="Address" value="" placeholder="Las Vegas" required/></td>
						</tr>
						<tr>
							<th>Contact no.: </th>
							<td><input type="text" name="Phn_no" pattern="[0-9]{10}" title="Must contain 10 digits" value="" placeholder="0987654321" required/></td>
						</tr>
						<tr>
							<th>Add room: </th>
							<td>
								<select name="Room_no">
								<?php while ($fetch = mysqli_fetch_object($result)) { ?>
									<option value="<?php echo $fetch->Room_no; ?>"><?php echo $fetch->Room_no; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Profile Picture: </th>
							<td><input type="file" name="Profile_pic"/></td>
						</tr>
					</table>
					<input class="button" type="submit" name="insert" value="INSERT" />
				</form>
				<button class="button back" onclick="document.location='./gender.php'">Back</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>