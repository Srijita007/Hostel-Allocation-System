<?php include "./Components/Shared/header.php"; ?>

<body>
	<!-- navbar -->
	<?php 
	include "./Components/Shared/navbar.php";
	?>
		<div id="page" class="container">
			<div class="title">
				<h1>Login</h1>
				<form style="margin: auto;" method="POST" action="handle_login.php" enctype="multipart/form-data">
                    <table style="margin: auto;">
                        <tr>
                            <th>Email Id</th>
                            <td><input type="text" name="email" value="" /></td>
                        </tr>
						<br>
                        <tr>
                            <th>Password</th>
                            <td><input type="text" name="password" value="" /></td>
                        </tr>
                    </table>

					<input class="button" type="submit" name="login" value="LOGIN" />
                </form>
				<button class="button back" onclick="document.location='./index.php'">Back</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>