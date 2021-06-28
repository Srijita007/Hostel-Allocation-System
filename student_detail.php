<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query_2 = "SELECT * FROM students WHERE Email = '".$_SESSION["Email"]."';";
	$result = mysqli_query($connection, $query_2);
?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
		<h1>Your Details</h1>
			<div class="title student_details">
				<?php while ($fetch = mysqli_fetch_object($result)) { ?>
				<div class="student_image"><img src="./Student_Images/<?php echo $fetch->Profile_pic; ?>" alt="Profile Picture" style="max-width: 300px; max-height: 300px;" /></div>
				<h4>Your ID: <?php echo $fetch->S_id; ?></h4>
				<h4>Name: <?php echo $fetch->Name; ?></h4>
				<h4>Contact no.: <?php echo $fetch->Phn_no; ?></h4>
				<h4>Email ID: <?php echo $fetch->Email; ?></h4>
				<h4>Address: <?php echo $fetch->Address; ?></h4>
				<h4>Room No.: <?php echo $fetch->Room_no; ?></h4>
				<?php } ?>
			</div>
			<br>
			<button class="button" onclick="document.location='./handle_login.php?logout=true'">Logout</button>
		</div>
	</div>
	<?php include "./Components/Shared/footer.php" ?>
</body>
</html>