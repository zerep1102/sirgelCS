<?php
    include('config.php');
    
    // Check if the request is made via POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Initialize response array
        $response = array();

        // Sanitize input
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';


       

        session_start();

        // Check if the user is already logged in, redirect to mainp.php if they are
        if(isset($_SESSION['username'])) {
            header("Location: mainp.php");
            exit; // Make sure to exit after sending the redirect header
        }
    
        // Check if the form is submitted
        if(isset($_POST['submit'])) {
            // Perform login validation here (e.g., check username and password)
    
            // Assuming login is successful, set session variable and redirect
            $_SESSION['username'] = $_POST['username'];
            header("Location: mainp.php");
            exit;
        }
        
       

            




        

        // Query to fetch user details
        $query = "SELECT * FROM finals WHERE username = '$username'";
        $sql = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_array($sql);
        if($fetch == null) {
            $checkpass = false;
        } else {
            $dbpass = $fetch['password'];
            $checkpass = password_verify($password, $dbpass);
        }

        if ($checkpass==1) {
            // User found, set response status to success
            $response['status'] = 'success';
            $response['message'] = 'Login successful.';
        } else {
            // User not found, set response status to error
            $response['status'] = 'error';
            $response['message'] = 'Invalid username or password.';
        }

        // Close database connection
        $conn->close();

        // Send response in JSON format
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // If the request is not made via POST, return an error
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method Not Allowed";
    }
?>
