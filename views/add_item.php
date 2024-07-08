<?php
require_once '/opt/lampp/htdocs/mini_project/config/config.php';
require_once '/opt/lampp/htdocs/mini_project/controllers/CrudController.php';
require_once '/opt/lampp/htdocs/mini_project/helpers/Session.php';

Session::start();
if (!Session::get('user')) {
    header('Location: login.php');
    exit();
}

$user = Session::get('user');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
<div class="container">
        <header>
            <h2>Add Item</h2>
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</span>
                <a class="button" href="../index.php?action=logout">Logout</a>
            </div>
        </header>
        <main>
            <form action="../index.php?action=create" method="post">
                <?php if (isset($_GET['error'])): ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php endif; ?>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
                <button type="submit">Add</button>
            </form>
        </main>
    </div>
</body>

</html>