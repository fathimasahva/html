<?php

$name = $email = $password = $confirm_password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
function clean_input($data) {
return htmlspecialchars(stripslashes(trim($data)));
}

 
if (empty($_POST["name"])) {
$errors['name'] = "Name is required<br>";
} else {
$name = clean_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $errors['name'] = "Only letters and spaces allowed<br>";
}
}

 
if (empty($_POST["email"])) {
$errors['email'] = "Email is required<br>";
} else {
$email = clean_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format<br>";
}
}


if (empty($_POST["password"])) {
$errors['password'] = "Password is required<br>";
} else {
$password = clean_input($_POST["password"]);
if (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters<br>";
}
}


if (empty($_POST["confirm_password"])) {
$errors['confirm_password'] = "Confirm your password<br>";
} else {
$confirm_password = clean_input($_POST["confirm_password"]);
if ($confirm_password !== $password) {
    $errors['confirm_password'] = "Passwords do not match<br>";
}
}


if (empty($errors)) {
echo "<h1 style='color:green; text-align:center;'>Registration Successful!</h1>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>PHP Registration Form</title>
<style>
.error { color: red; }
form { width: 350px; margin: auto; }
input { width: 100%; margin: 11px 0; padding: 7px; }
</style>
</head>
<body>

<h2 style="text-align:center; color:blue";>Registration Form</h2>

<form method="POST" action="">

<label style="color:brown";>Name:</label>
<input type="text" name="name" value="<?= $name ?>">
<span class="error"><?= $errors['name'] ?? '' ?></span>

<label style="color:brown";>Email:</label>
<input type="text" name="email" value="<?= $email ?>">
<span class="error"><?= $errors['email'] ?? '' ?></span>

<label style="color:brown";>Password:</label>
<input type="password" name="password">
<span class="error"><?= $errors['password'] ?? '' ?></span>

<label style="color:brown";>Confirm Password:</label>
<input type="password" name="confirm_password">
<span class="error"><?= $errors['confirm_password'] ?? '' ?></span>

<br><br>
<input type="submit" value="Register" style="background-color:pink";>

</form>

</body>
</html>

