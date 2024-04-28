<?php
 if (isset($_GET['logout'])) {
    // If logout is set, clear the session and redirect to login page
    session_destroy();
    header("Location: login.php");
    exit; // Make sure to exit after sending the redirect header
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Menstrual Tracker</title>
</head>
<body>

<style>
    .navbar {
        background-color: rgba(148, 0, 211, 0.2);
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid rgba(148, 0, 211, 0.2);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
    }
    
    
    .navbar a {
        background-image: linear-gradient(to right, #ffc3cc, #fff);
        color: #333;
        text-decoration: none;
        padding: 10px 25px;
        border-radius: 20px;
        background-color: #007bff;
        transition: background-color 0.3s ease;
        font-size: 18px;
        font-weight: 500;
        display: inline-block;
    }
    
    .navbar a:hover {
        background-color: #0056b3;
    }
    
</style>



    
    <nav class="navbar">
        <a href="login?action=logout" class="navbar-item">Logout</a>
    </nav>
    

    
    

  

    <div class="container">
        <header>
            <h1>Menstrual Tracker</h1>
        </header>
        <main>
            <div class="content">
                <div class="info">
                    <h2>What is Menstrual Tracking?</h2>
                    <p>Menstrual tracking is a simple way to keep track of your menstrual period, including its length, frequency, and any symptoms. By keeping track of your period, you can better understand your body and make healthier decisions about your health.</p>
                </div>
                <div class="features">
                    <h2>How to Use Our App</h2>
                    <ol>
                        <li>Download the app</li>
                        <li>Sign up for a free account</li>
                        <li>Start tracking your period</li>
                    </ol>
                    <h2>Benefits of Using Our App</h2>
                    <ul>
                        <li>Get reminders about your period</li>
                        <li>Keep track of your symptoms</li>
                        <li>Get personalized advice</li>
                    </ul>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2022 Menstrual Tracker</p>
        </footer>
    </div>
</body>
</html>




<style>
    body {
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('images/bgpink.gif');
        background-size: cover;
        color: #000;
    }

    .container {
        width: 100%;
        max-width: 800px;
        margin: 50px auto;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
        animation: fadeIn 1s ease-out; /* Apply the fade-in animation */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    header {
        text-align: center;
        margin-bottom: 30px;
    }

    header h1 {
        font-size: 42px;
        color: #ff69b4;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .info,
    .features {
        flex: 1;
        margin-right: 20px;
    }

    h2 {
        font-size: 32px;
        color: #ff69b4;
        margin-top: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    ol,
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 10px;
        font-size: 18px;
        line-height: 1.6;
    }

    footer {
        text-align: center;
        margin-top: 30px;
        font-size: 14px;
        color: #888;
    }
</style>

</style>