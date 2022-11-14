<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.html");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: index.html");
	} else {
		echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<link href="assets/css/style2.css" rel="stylesheet">

<title>RedVsty</title>
</head>
<body>
<div class="alert alert-warning" role="alert">
<?php echo $_SESSION['error']?>
</div>

<div class="container">
<form action="/index.php" method="POST" class="login-email">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
    <div class="input-group">
	<input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
    </div>
    <div class="input-group">
	<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
    </div>
    <div class="input-group">
	<button name="submit" class="btn">Login</button>
    </div>
    <p class="login-register-text">Don't have an account? <a href="register.php">Create new account</a></p>
        </form>
    </div>
</body>
</html>
