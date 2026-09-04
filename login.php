<?php
session_start();
require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, fullname, password, event FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["fullname"] = $user["fullname"];
            $_SESSION["event"] = $user["event"];
            header("Location: login.php?success=1");
            exit;
        } else {
            $message = "Invalid Student ID or Password.";
        }
    } else {
        $message = "Invalid Student ID or Password.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CampusConnect Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<?php if (isset($_SESSION["fullname"]) && isset($_GET["success"])): ?>
    <h1>Login Successful!</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION["fullname"]); ?>.</p>
    <p>Registered Event: <?php echo htmlspecialchars($_SESSION["event"]); ?></p>
    <a class="button-link" href="logout.php">Logout</a>
<?php else: ?>
    <h1>Student Login</h1>
    <?php if ($message): ?><p class="error"><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>New student? <a href="index.php">Register Here</a></p>
<?php endif; ?>
</div>
</body>
</html>
