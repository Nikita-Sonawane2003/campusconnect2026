<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>CampusConnect 2026</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>CampusConnect 2026</h1>
    <p class="subtitle">Student Event Registration Portal</p>

    <form action="register.php" method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="college" placeholder="College Name" required>
        <input type="text" name="location" placeholder="Location" required>

        <select name="event" required>
            <option value="">-- Select Event --</option>
            <option value="Technical Fest">Technical Fest</option>
            <option value="Coding Competition">Coding Competition</option>
            <option value="Project Exhibition">Project Exhibition</option>
            <option value="Cultural Fest">Cultural Fest</option>
            <option value="Sports Event">Sports Event</option>
        </select>

        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <p>Already registered? <a href="login.php">Login Here</a></p>
</div>
</body>
</html>
