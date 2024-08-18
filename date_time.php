<?php
session_start();
include './connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract user input

    if (isset($_POST['time'])) { // Check if time selection is set
        $time_type = $_POST['time'];
        if ($time_type === "full-day") {
            $start_time = '00:00:00'; 
            $end_time = '23:59:59';
            $date = $_POST['date'];
           
        } if ($time_type === 'custom-time') {
            $start_time = $_POST['start-time'];
            $end_time = $_POST['end-time'];
            $date = $_POST['date'];
        }
        $_SESSION['date'] = date($_POST['date']);
        $_SESSION['day'] = date('d', strtotime($_SESSION['date']));
        $_SESSION['month'] = date("F", mktime(0, 0, 0, date('m', strtotime($_SESSION['date'])), 10));
    }


    $sql = "SELECT Email FROM present_user"; // Select Email from present_user table
    $stmt = $conn->prepare($sql); // Prepare statement for security

    if ($stmt->execute()) {
        $result = $stmt->get_result(); // Get the result set

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc(); // Fetch the first row (assuming you only need the current user's email)

            $email = $row['Email']; // Example usage (replace with your logic)
        } 
    } 

    $stmt->close(); 

    $user_mail = $email;

    $sql_user_details = "SELECT Name, Email, Phone_number FROM logindetails WHERE Email = ?";
    $stmt_user = $conn->prepare($sql_user_details);
    $stmt_user->bind_param("s", $user_mail); // Use "i" for integer data type (user ID)
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    // Assuming successful execution, fetch user details
    if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $user_name = $row_user['Name'];
    $user_email = $row_user['Email'];
    $user_phone_number = $row_user['Phone_number'];
    } else {
    // Handle case where user ID doesn't match a record (optional: display error message)
    echo "Error retrieving user details.";
    exit;
    }

    // Close user details statement and result set
    $stmt_user->close();
    $result_user->close();


        // Prepare and execute SQL query
    $sql = "INSERT INTO bookings (Name,Email,Phone_number,booking_date, Start_time, End_time) VALUES (?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$user_name,$user_email,$user_phone_number, $date, $start_time, $end_time);
    $stmt->execute();
    $conn->close();


$conn =new mysqli("localhost","root","","bookingdetails");
if($conn->connect_error){
    echo "failed to connect db".$conn->connect_error;
    }
    
    $sql = "SELECT Email FROM websitelogin.present_user"; // Select Email from present_user table
    $stmt = $conn->prepare($sql); // Prepare statement for security
    
    if ($stmt->execute()) {
        $result = $stmt->get_result(); // Get the result set
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc(); // Fetch the first row (assuming you only need the current user's email)
    
            $email = $row['Email']; // Example usage (replace with your logic)
        } 
    } 
    
    $stmt->close(); 

    $user_mail = $email;
    
    $sql_user_details = "SELECT Name, Email, Phone_number FROM websitelogin.logindetails WHERE Email = ?";
    $stmt_user = $conn->prepare($sql_user_details);
    $stmt_user->bind_param("s", $user_mail); // Use "i" for integer data type (user ID)
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    
    // Assuming successful execution, fetch user details
    if ($result_user->num_rows > 0) {
      $row_user = $result_user->fetch_assoc();
      $user_name = $row_user['Name'];
      $user_email = $row_user['Email'];
      $user_phone_number = $row_user['Phone_number'];
    } else {
      // Handle case where user ID doesn't match a record (optional: display error message)
      echo "Error retrieving user details.";
      exit;
    }
    
    // Close user details statement and result set
    $stmt_user->close();
    $result_user->close();
    
    
        // Prepare and execute SQL query
    $sql = "INSERT INTO bookings (Name,Email,Phone_number,booking_date, Start_time, End_time) VALUES (?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss",$user_name,$user_email,$user_phone_number, $date, $start_time, $end_time);
    $stmt->execute();
    $conn->close();
    
    header('Location: ../planb/confirmation.php');
}


?>
