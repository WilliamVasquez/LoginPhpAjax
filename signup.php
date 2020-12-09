<?php

  	require 'database.php';

	$message = '';

  	if (isset($_POST['escritorio']) && isset($_POST['password'])) {
		$sql = "INSERT INTO users (escritorio, password) VALUES (:escritorio, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':escritorio', $_POST['escritorio']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);

		if ($stmt->execute()) {
		$message = 'Successfully created new user';
		} else {
		$message = 'Sorry there must have been an issue creating your account';
		}
  	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SignUp</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css">
  	</head>
<body>

    <?php if(isset($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
		<input name="escritorio" type="text" placeholder="Enter your escritorio">
		<input name="password" type="password" placeholder="Enter your Password">
		<input name="confirm_password" type="password" placeholder="Confirm Password">
		<input type="submit" value="Submit">
    </form>

</body>
</html>
