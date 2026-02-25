<?php
// Test koneksi dan password
require_once __DIR__ . '/app/config/koneksi.php';

echo "<h2>Test Database Connection</h2>";

// Check user
$stmt = $pdo->query("SELECT * FROM users WHERE username = 'admin'");
$user = $stmt->fetch();

if ($user) {
    echo "<p>✅ User 'admin' found!</p>";
    echo "<p>Password hash: <code>" . htmlspecialchars($user['password']) . "</code></p>";
    
    // Test password
    $test_password = 'admin123';
    $verify = password_verify($test_password, $user['password']);
    
    echo "<p>Testing password 'admin123': " . ($verify ? "✅ MATCH" : "❌ NOT MATCH") . "</p>";
    
    if (!$verify) {
        // Generate new hash
        $new_hash = password_hash('admin123', PASSWORD_BCRYPT);
        echo "<p>New hash for 'admin123': <code>" . $new_hash . "</code></p>";
        
        // Update password
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = 'admin'");
        $result = $stmt->execute([$new_hash]);
        
        if ($result) {
            echo "<p style='color: green; font-weight: bold;'>✅ Password updated! Try login again.</p>";
        }
    }
} else {
    echo "<p>❌ User 'admin' not found!</p>";
}
