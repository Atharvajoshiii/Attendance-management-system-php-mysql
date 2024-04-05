<?php
// Start the session
session_start();

// Check if the user is logged in


// If logout is clicked, destroy the session and redirect to index.php
if (isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to index.php with a parameter to show the error message
    header("Location: index.php?error=logout");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333; /* Text color */
        }
        table {
            border-collapse: collapse;
            width: 90%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .navbar {
            overflow: hidden;
            background-color: black; /* Navbar background color */
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .navbar a {
            float: left;
            display: block;
            color: #fff; /* Navbar text color */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #0056b3; /* Navbar hover color */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Heading color */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="insertuser.php">Insert User</a>
        <a href="updateuser.php">Update User</a>
        <a href="delete_user.php">Delete User</a>
        <a href="index.php?logout=true">Logout</a>
    </div>

    <h2>Attendance Table</h2>

    <?php
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

    // Fetch all rows from the attendance table
    $sql = "SELECT * FROM attendance";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output table headers
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["monday"] . "</td>";
            echo "<td>" . $row["tuesday"] . "</td>";
            echo "<td>" . $row["wednesday"] . "</td>";
            echo "<td>" . $row["thursday"] . "</td>";
            echo "<td>" . $row["friday"] . "</td>";
            echo "<td>" . $row["saturday"] . "</td>";
            echo "<td>" . $row["sunday"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>

    <?php
    // Display an alert if logout is successful
    if (isset($_GET['error']) && $_GET['error'] == 'logout') {
        echo "<script>alert('You have been logged out.');</script>";
    }
    ?>
</body>
</html>
