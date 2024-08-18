<?php
session_start();

// Ensure no output before session_start()

include './connect.php';

if (isset($_POST['login_Btn'])) {
  $email = mysqli_real_escape_string($conn, $_POST['Email']); // Assuming 'Name' is your email input field name
  $password = mysqli_real_escape_string($conn, $_POST['Password']);

  $sql1 = "UPDATE present_user SET Email = ? WHERE 1"; // Update all rows (since you have only one)
  $stmt1 = $conn->prepare($sql1);

  $new_value = $email/* Your logic to determine the new value */; // Replace with your logic
  $stmt1->bind_param("s", $new_value); // Bind new value as string (assuming it's a VARCHAR)

  if ($stmt1->execute()) {
      echo "Total value updated successfully!"; // Optional success message
  } else {
      echo "Error updating total value: " . $stmt1->error; // Handle errors
  }

  $stmt1->close();


  $sql = "SELECT password, Name, Phone_number, City, State FROM logindetails WHERE Email='$email';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
      // Store username (or email) in session for future use (example)
      $_SESSION['username'] = $row['Name'];
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $row['Phone_number'];
      $_SESSION['city'] = $row['City'];
      $_SESSION['state'] = $row['State'];
      // echo "<pre>";
      // print_r($_SESSION);
      // echo "</pre>";
      // Replace 'index.html' with the actual file you want to open upon successful login
      header('Location: index.php');
      exit(); // Ensure script stops after redirection
    } else {
      
      echo "<script>alert('Login unsuccessful-you have entered incorrect password');</script>";
      
    }
  } else {
    
    echo "<script>alert('No user found with this email');</script>";
  }
}

?>

