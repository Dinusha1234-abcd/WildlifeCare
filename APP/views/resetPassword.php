<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Public/css/resetPassword.css">
    <title>Reset Password</title>
</head>
<body>
<div class="container">
	<h1>Reset Password</h1>

	<form action="" method="POST">

		<label class="reset-label">New Password</label>
		<br>
		<input type="Password" name="newPassword" required class="reset-input">
		<br>
		<label class="reset-label">Confirm Password</label>
		<br>
		<input type="password" name="confirmPassword" required class="reset-input">
		<br>
		<button type="submit" name="submit" class="reset-btn">Submit</button>
	</form>
</div>


</body>
</html>