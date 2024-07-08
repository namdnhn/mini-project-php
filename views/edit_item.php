<?php
require_once '../config/config.php';
require_once '../controllers/CrudController.php';
require_once '../helpers/Session.php';

Session::start();
if (!Session::get('user')) {
    header('Location: login.php');
    exit();
}

$crudController = new CrudController($pdo);
$item = $crudController->readOne($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<form action="../index.php?action=update&id=<?php echo $item['id']; ?>" method="post">
        <h2>Edit Item</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
