<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Database connection details
    $host = 'localhost';
    $db_username = 'root';
    $db_password = 'Dheeraj@123';
    $db_name = 'form';

    // Connect to the database
    $conn = new mysqli($host, $db_username, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute an SQL query to insert data
    $sql = "INSERT INTO contact (name,lastname, email,number, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $lastname, $email, $phone, $message);

    if ($stmt->execute()) {
        // Data inserted successfully
        $stmt->close();
        $conn->close();

        // Redirect to a thank you page after saving the data
        header("Location: thankyou.html");
        exit();
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
