<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendance</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</style>
<body>
    <h2>Add Attendance</h2>

    <?php
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

        // Get form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $day = $_POST['day'];

        // Set attendance for the selected day to 1, and all other days to 0
        $attendance = array(
            'monday' => ($day == 'monday') ? 1 : 0,
            'tuesday' => ($day == 'tuesday') ? 1 : 0,
            'wednesday' => ($day == 'wednesday') ? 1 : 0,
            'thursday' => ($day == 'thursday') ? 1 : 0,
            'friday' => ($day == 'friday') ? 1 : 0,
            'saturday' => ($day == 'saturday') ? 1 : 0,
            'sunday' => ($day == 'sunday') ? 1 : 0
        );

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO attendance (id, name, monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiiiiii", $id, $name, $attendance['monday'], $attendance['tuesday'], $attendance['wednesday'], $attendance['thursday'], $attendance['friday'], $attendance['saturday'], $attendance['sunday']);

        // Execute SQL statement
        if ($stmt->execute()) {
            // Redirect to admin_panel.php
            header("Location: admin_panel.php");
            exit();
        } else {
            echo "Error recording attendance: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="day">Select Day:</label><br>
        <select id="day" name="day">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
