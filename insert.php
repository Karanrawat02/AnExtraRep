<?php
$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];
$health_report = $_FILES['health_report']['name'];

$conn = mysqli_connect('localhost', 'root', '', 'health_form');

if ($conn) {
  $sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$health_report')";

  if (mysqli_query($conn, $sql)) {
    echo "User details and PDF file inserted successfully!";
  } else {
    echo "Error inserting user details and PDF file: " . mysqli_error($conn);
  }
} else {
  echo "Error connecting to database: " . mysqli_connect_error();
}

mysqli_close($conn);
?>
