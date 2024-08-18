<?php
session_start();

// Ensure no output before session_start()

include './connect.php';

// Check if form is submitted and all fields are filled
if (isset($_POST['signup_Btn']) && !empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Phone_number']) && !empty($_POST['City']) && !empty($_POST['District']) && !empty($_POST['State']) && !empty($_POST['Password'])) {
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['Phone_number']);
    $town = mysqli_real_escape_string($conn, $_POST['City']);
    $district = mysqli_real_escape_string($conn, $_POST['District']);
    $state = mysqli_real_escape_string($conn, $_POST['State']);
    $password = $_POST['Password']; // Hash the password for security     
    // Prepare the SQL statement to insert data
    $sql = "INSERT INTO logindetails ( Name, Email, Phone_number, City, District, State, password) VALUES ('$name', '$email', '$phone_number', '$town', '$district', '$state', '$password')";     
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>
