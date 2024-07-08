<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <form action="../index.php?action=register" method="post">
        <h2>Register</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
