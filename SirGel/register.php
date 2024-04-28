<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <style>
        body 
        {
        
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/bgpink.gif');
            background-repeat: repeat;
            background-size: cover;
        }
        .form-container {
            background-color: #ffffff; /* White background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Increased padding for better spacing */
            width: 300px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 10px; /* Increased margin for better spacing */
            display: block;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 5px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

        .form-container button {
            width: 100%;
            background-color: #ff1493; /* Hot Pink button */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #ff007f; /* Neon Pink on hover */
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff1493; /* Hot Pink link */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .form-container a:hover {
            color: #ff007f; /* Neon Pink on hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method = "post" id="form">
            <label for="email">Email</label>
            <input type="email" name = "email" id = "email" required>

            <label for = "Username">Username</label>
            <input type="text" name = "username" id = "Username" required>

            <label for = "password">Password</label>
            <input type="password" name = "password" id = "password" required>
            <button type="submit">Submit</button>

            <a href="login.php">Already have an account? Login here.</a>
        </form>

    </div>



    <script>
$(document).ready(function(){
    $('#form').submit(function(e){
        e.preventDefault(); // Prevent the form from submitting normally
        
        var isValid = validateForm(); // Check if the form is valid
        
        if(isValid) {
            var data = new FormData(this);
            var username = $('#Username').val();
            var password = $('#password').val();
            var email = $('#email').val();

            data.append('username', username);
            data.append('password', password);
            data.append('email', email);
            
            $.ajax({
                type: "POST",
                url: "regprocess.php",
                data: data,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log("Response from server:", response); // Log the response from the server
                    if(response.startsWith('Error:')) {
                        Swal.fire({
                            title: 'Registration Failed',
                            text: response, // Display the error message from PHP
                            icon: 'error',
                            confirmButtonText: 'Okay'
                        });
                    } else {
                        Swal.fire({
                            title: 'Success',
                            text: 'Registered Successfully',
                            icon: 'success',
                            confirmButtonText: 'Okay'
                        }).then(() => {
                            window.location.href = 'login';
                        });
                    }
                },
                error: function(xhr, status, error){
                    console.log("Error:", error); // Log any errors to the console
                    Swal.fire({
                        title: 'Error',
                        text: 'There was an error processing your request. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    });
                }
            });
        }
    });
});

function validateForm() {
    var errors = [];

    // Validate Email
    var email = $('#email').val().trim();
    if (email === '') {
        errors.push("Email is required");
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        errors.push("Invalid email format");
    }

    // Validate Username
    var username = $('#Username').val().trim();
    if (username === '') {
        errors.push("username is required");
    } else if (username.length < 8) {
        errors.push("username must be at least 8 characters long");
    } else if (!/^[A-Za-z0-9]+$/.test(username)) {
        errors.push("username can only contain letters and numbers");
    }

    
    // Validate Password
    var password = $('#password').val().trim();
    if (password === '') {
        errors.push("Password is required");
    } else if (!/^[A-Z][a-zA-Z0-9]{7,15}$/.test(password) || password.indexOf(' ') != -1) {
        errors.push("Password must have a first letter uppercase, not contain whitespace and be 8-16 characters long");
    }


    // Display errors or submit form
    if (errors.length > 0) {
        Swal.fire({
            title: 'Validation Error',
            html: errors.join('<br>'),
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return false; 
    } else {
        return true;
    }
}


    </script>


</body>
</html>

