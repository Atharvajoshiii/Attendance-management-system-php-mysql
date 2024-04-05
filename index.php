<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #000; /* Changed text color */
            background-color: #fff; /* Fallback color */
        }

        .navbar {
            background-color: white;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .navbar h1 {
            margin: 0;
            padding: 0;
            color: #f2f2f2;
            display: inline-block;
            /* Ensuring it stays on the same line as buttons */
        }

        .navbar i {
            color: green; /* Adjust the color of the icon */
            font-size: 32px; /* Increase the size of the icon */
            margin-right: 10px; /* Add some space between icon and heading */
        }

        .logo {
            display: flex;
            align-items: center; /* Align items vertically */
        }

        .logo h2 {
            margin: 0; /* Remove margin */
            color: #f2f2f2; /* Changed text color */
            font-size: 24px; /* Adjusted font size */
        }

        .navbar .btn {
            padding: 8px 16px; /* Decreased button height */
            font-size: 16px; /* Decreased button font size */
            margin: 0 5px; /* Added margin between buttons */
            background-color: #d9534f; /* Changed button color to red */
            color: white; /* Changed text color to white */
            border: none; /* Removed button border */
            border-radius: 5px; /* Added border radius */
            transition: background-color 0.3s; /* Added transition effect */
        }

        .navbar .btn:hover {
            background-color: #c9302c; /* Darken button color on hover */
        }

        .second {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 50px); /* Adjusted height to accommodate navbar */
            background: url('your_background_image.jpg') no-repeat center center fixed; /* Add your background image */
            background-size: cover; /* Cover the entire section */
            background-color: rgba(0, 0, 0, 0.5); /* Fallback color */
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/employee.jpg'); /* Add linear gradient over background image */
        }

        .second-content {
            text-align: center;
            color: white;
        }

        .second-content h2 {
            margin-bottom: 20px;
            font-size: 50px; /* Increase the size of the h2 heading */
        }

        .second-content p {
            margin-bottom: 20px;
        }

        .second-content button {
            padding: 10px 20px; /* Adjusted button height */
            font-size: 16px; /* Decreased button font size */
            background-color: #c9302c;
            color: white;
            border: none;
            border-radius: 8px;
        }
        .logo h2{
            color: black;
        }

        .third {
            display: flex;
            justify-content: space-around;
            padding: 50px 0;
            background-color: #f2f2f2; /* Adjust background color */
        }

        .card {
            text-align: center;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff; /* Adjust background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
        }

        .card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #333; /* Adjust text color */
        }

        .card p {
            color: #666; /* Adjust text color */
        }

        .footer {
            background-color: black;
            text-align: center;
            padding: 20px 0;
            color: white;
        }

        .footer i {
            color: white; /* Change color of GitHub icon to white */
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <i class="fa-solid fa-circle-check"></i>
            <h2>A T T E N D I F Y</h2>
        </div>

        <?php
        $login_url = "login.php";
        $admin_login_url = "adminlogin.php";
        ?>
        <div class="buttons">
            <a href="<?php echo $login_url; ?>"><button class="btn btn-user">Login as User</button></a>
            <a href="<?php echo $admin_login_url; ?>"><button class="btn btn-admin">Login as Admin</button></a>
        </div>
    </div>
    <section class="second">
        <div class="second-content">
            <h2>Attendance Management System</h2>
            <p>Upgrade your attendance tracking and management process with the most evolved software technologies</p>
            <a href="login.php"><button>Let's get started</button></a>
        </div>
    </section>

    <section class="third">
        <div class="card">
            <img src="images/onlinetracking.png" alt="Image 1">
            <h3>Online Tracking</h3>
            <p>Manage and track attendance online with ease. Keep a real-time record of attendance data for your organization.</p>
        </div>
        <div class="card">
            <img src="images/attendance.jpg" alt="Image 2">
            <h3>Digital Attendance</h3>
            <p>Digitize your attendance system for improved accuracy and efficiency. Say goodbye to manual attendance records.</p>
        </div>
        <div class="card">
            <img src="images/realtime.png" alt="Image 3">
            <h3>Real-time Analysis</h3>
            <p>Gain insights into attendance patterns and trends instantly. Make data-driven decisions for better workforce management.</p>
        </div>
    </section>

    <footer class="footer">
        @Developed by Atharva Joshi
        <a href="https://github.com/Atharvajoshiii" target="_blank">
            <i class="fa-brands fa-github fa-2xl"></i>
        </a>
    </footer>

</body>

</html>
