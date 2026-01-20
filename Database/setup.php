<?php
include 'db.php';

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'users' checked/created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Check if role column exists (for handling existing table updates)
$checkColumn = "SHOW COLUMNS FROM users LIKE 'role'";
$result = $conn->query($checkColumn);
if ($result->num_rows == 0) {
    $alterSql = "ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'user'";
    if ($conn->query($alterSql) === TRUE) {
        echo "Column 'role' added successfully.<br>";
    } else {
        echo "Error adding column: " . $conn->error . "<br>";
    }
}

// Create Admin Account
$adminEmail = 'admin@library.com';
$adminPass = 'admin123'; // Note: Using plain text as per current project configuration
$adminName = 'Super Admin';
$adminRole = 'admin';

// Check if admin exists
$checkAdmin = "SELECT id FROM users WHERE email = '$adminEmail'";
$adminResult = $conn->query($checkAdmin);

if ($adminResult->num_rows == 0) {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $adminName, $adminEmail, $adminPass, $adminRole);

    if ($stmt->execute()) {
        echo "Admin account created successfully.<br>";
        echo "Email: $adminEmail<br>";
        echo "Password: $adminPass<br>";
    } else {
        echo "Error creating admin account: " . $stmt->error . "<br>";
    }
    $stmt->close();
} else {
    echo "Admin account already exists.<br>";
}

echo "<br><a href='../login_page.php'>Go to Login</a>";

$conn->close();
?>