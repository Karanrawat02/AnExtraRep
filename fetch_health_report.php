<?php
$email = $_POST['email'];

$conn = mysqli_connect('localhost', 'root', '', 'health_form');

if ($conn) {
  $sql = "SELECT health_report FROM users WHERE email='$email'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $health_report = $row['health_report'];

    header('Content-type: application/pdf');
    header('Content-disposition: attachment; filename="' . $health_report . '"');

    readfile($health_report);
  } else {
    echo "No health report found for this email ID.";
  }
} else {
  echo "Error connecting to database: " . mysqli_connect_error();
}

mysqli_close($conn);
?>
