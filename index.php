<?php 
	include "./Components/Shared/header.php";
?>

<body>

	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<button class="button" onclick="document.location='./login.php'">Admin</button>
				<button class="button" onclick="document.location='./guest_login.php'">Students</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
