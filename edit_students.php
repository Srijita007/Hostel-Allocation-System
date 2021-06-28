<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query = "SELECT * FROM students WHERE S_id = '".$_REQUEST["id"]."';";
	$result = mysqli_query($connection, $query);
	$fetch = mysqli_fetch_object($result);

	$query_2 = "SELECT * FROM male WHERE Status = 'Available' UNION SELECT * FROM Female WHERE Status = 'Available';";
	$result_2 = mysqli_query($connection, $query_2);

	if (isset($_POST["update"]))
	{
		

		if (isset($_FILES["Profile_pic"])) 
		{
			$file_name = "";
			unlink("Student_Images/" . $fetch->Profile_pic);
			
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

		$query = "UPDATE students SET 
			Name ='".$_POST["Name"]."', 
			Room_no ='".$_POST["Room_no"]."', 
			Email = '".$_POST["Email"]."', 
			Phn_no = '".$_POST["Phn_no"]."',
			Address = '".$_POST["Address"]."', 
			Profile_pic = '".$file_name."' WHERE S_id = '".$_REQUEST["id"]."';";

		mysqli_query($connection, $query);
		header("location: view_students.php");
	}
?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<h1>Edit Data of Student</h1>
				<br>
				<form style="margin: auto;" method="POST" enctype="multipart/form-data">
					<table style="margin: auto;">
						<tr>
							<th>Name: </th>
							<td><input type="text" name="Name" pattern="([a-zA-Z\s]){1,}" title="Must contain only letters" value="<?php echo $fetch->Name ?>" required/></td>
						</tr>
						<tr>
							<th>Email: </th>
							<td><input type="text" name="Email" value="<?php echo $fetch->Email ?>" required/></td>
						</tr>
						<tr>
							<th>Address: </th>
							<td><input type="text" name="Address" value="<?php echo $fetch->Address ?>" required/></td>
						</tr>
						<tr>
							<th>Contact no.: </th>
							<td><input type="text" name="Phn_no" pattern="[0-9]{10}" title="Must contain 10 digits" value="<?php echo $fetch->Phn_no ?>" required/></td>
						</tr>
						<tr>
							<th>Room no.: </th>
							<td>
								<select name="Room_no" required>
								<?php while ($fetch_2 = mysqli_fetch_object($result_2)) { ?>
									<option value="<?php echo $fetch_2->Room_no; ?>" <?php if ($fetch->Room_no == $fetch_2->Room_no) { ?> selected = "selected" <?php } ?> ><?php echo $fetch_2->Room_no; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Profile Picture: </th>
							<td><input type="file" name="Profile_pic" reqiured/></td>
						</tr>
					</table>

					<input class="button" type="submit" name="update" value="UPDATE" />
				</form>
				<button class="button back" onclick="document.location='./view_students.php'">Back</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>