<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <form action="../index.php?action=login" method="post">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error">Username or password is invalid</p>
        <?php endif; ?>
        <?php if (isset($_GET['message'])): ?>
            <p class="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="checkid" style="word-wrap:break-word">
            <input id="checkid" type="checkbox" value="test" /> Remember me
        </label>

        <button type="submit">Login</button>
    </form>
</body>

</html>