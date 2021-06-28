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
			<h1>Please select the gender</h1>
			<div class="title">

				<a  href="./add_students_male.php"><img class="gender_pic male" src="Images/male1.png" alt="Male"></a>
				<a  href="./add_students_female.php"><img class="gender_pic female" src="Images/female2.png" alt="Female"></a>
				<br>
                <button class="button back" onclick="document.location='./view_students.php'">Back</button>
				<button class="button back" onclick="document.location='./handle_login.php?logout=true'">Logout</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
