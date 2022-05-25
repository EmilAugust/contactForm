<?php

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$message = $_POST["message"];

$host = "localhost";
$username = "emil";
$password = "password";
$dbname = "message_db";

$conn = mysqli_connect(
  $host,
  $username,
  $password,
  $dbname
);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO message (firstName, lastName, email, message) VALUES (?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $message);

mysqli_stmt_execute($stmt);

echo "Record saved."

?>