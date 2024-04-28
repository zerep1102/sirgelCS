<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('images/bgpink.gif');
    background-size: cover;
}
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-container input {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: calc(50% - 5px);
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .register {
            background-color: #007bff;
        }
    </style>

    <form method="post" id="form" class="form-container">

        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br><br>


        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br><br>

        <button type="submit">LogIn</button>
        <button type="button" class="register" id = "register">Register</button>
        
    </form>

   

    

    
    <script src="jquery.js"></script>
    <script>
        $('#register').click(function() {
            window.location.href = 'register';
        });
        $('#form').submit(function(e){
            e.preventDefault();
            var data = new FormData(this);
            var username = $('#username').val();
            var password = $('#password').val();
            data.append('username', username);
            data.append('password', password);
            $.ajax({
                type: "POST",
                url: "loginprocess",
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Logged In Successfully',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'mainp.php'; // Redirect to mainp.php after successful login
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Invalid username or password',
                        allowOutsideClick: false
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log the error to the console for debugging
                }
            });
        });


    </script>

    
</body>
</html>