<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";
?>

<body>

	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<button class="button" onclick="document.location='./view_students.php'">Students</button>
				<button class="button" onclick="document.location='./view_rooms.php'">Rooms</button>
				<?php include "./logout.php"; ?>
			</div>
		</div>

	</div>
	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
