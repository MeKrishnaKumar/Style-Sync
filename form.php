<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$host = "localhost";
$dbname = "message-db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection Error:" . mysqli_connect_error());
}

$sql = "INSERT INTO MESSAGE (name, email, subject, message) VALUES (?,?,?,?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

mysqli_stmt_execute($stmt);


echo "Message sent successfully.";

