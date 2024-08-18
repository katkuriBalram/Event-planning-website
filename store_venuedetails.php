<?php

include './connect.php';

$venue_name = $_POST['venue_name'];
$venue_number = $_POST['venue_number'];
$location = $_POST['location'];
$photo = $_POST['photo'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (Name,Email,Phone_number,booking_date,Start_time,End_time,venue_name, venue_number, location, photo) VALUES ("","","","","","",?, ?, ?, ?)");
$stmt->bind_param("ssss", $venue_name, $venue_number, $location, $photo);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>


