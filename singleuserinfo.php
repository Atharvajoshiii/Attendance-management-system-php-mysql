<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Attendance</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #4e54c8, #8f94fb);
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Navbar styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 0;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }

        /* Content styles */
        .content {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 900px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            margin: 10px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-attendance {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Check Your Attendance</a>
        <a href="index.php">Logout</a>
    </div>

    <div class="content">
        <h2>Search Attendance</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Enter ID: <input type="text" name="id">
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                // Get ID from the form
                $id = $_POST["id"];

                // Fetch data for the given ID
                $sql = "SELECT * FROM attendance WHERE id = $id";
                $result = $conn->query($sql);

                // Display attendance information in a table if data exists
                if ($result->num_rows > 0) {
                    $totalAttendance = 0; // Initialize total attendance

                    echo "<h3>Attendance Information</h3>";
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Name</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>";
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

                        // Calculate total attendance
                        $totalAttendance += array_sum($row); // Sum attendance values for each day
                    }
                    
                    // Subtract the given ID from total attendance
                    $totalAttendance -= $id;

                    echo "<tr class='total-attendance'><td colspan='2'>Total Attendance <td><td colspan='7'></td><td>$totalAttendance</td></tr>";
                    echo "</table>";
                } else {
                    echo "No results found for ID: $id";
                }

                // Close connection
                $conn->close();
            }
        ?>
    </div>
</body>
</html>
