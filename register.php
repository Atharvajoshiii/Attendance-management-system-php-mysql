<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #4e54c8, #8f94fb);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registration-container {
            width: 400px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .registration-container h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        .registration-container label {
            font-size: 16px;
            color: #555;
        }
        .registration-container input[type="text"],
        .registration-container input[type="email"],
        .registration-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .registration-container input[type="text"]:focus,
        .registration-container input[type="email"]:focus,
        .registration-container input[type="password"]:focus {
            border-color: #4e54c8;
            outline: none;
        }
        .registration-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to bottom right, #4e54c8, #8f94fb);
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .registration-container input[type="submit"]:hover {
            background: linear-gradient(to bottom right, #8f94fb, #4e54c8);
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .login-link:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Registration Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="register" value="Register">
        </form>
        <a href="login.php" class="login-link">Already have an account? Login</a>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            $servername = "localhost";
            $username = "root"; // Change this to your MySQL username
            $password = ""; // Change this to your MySQL password
            $database = "add"; // Change this to your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Insert data into database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: #4e54c8; text-align: center; margin-top: 20px;'>Registration successful!</p>";
            } else {
                echo "<p style='color: red; text-align: center; margin-top: 20px;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
