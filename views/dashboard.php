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
$crudController = new CrudController($pdo);
$items = $crudController->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <h2>Dashboard</h2>
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</span>
                <a class="button" href="../index.php?action=logout">Logout</a>
            </div>
        </header>
        <main>
            <div class="actions">
                <a class="button" href="add_item.php">Add Item</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id']); ?></td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['description']); ?></td>
                            <td>
                                <a class="button" href="edit_item.php?id=<?php echo $item['id']; ?>">Edit</a>
                                <a class="button delete"
                                    href="../index.php?action=delete&id=<?php echo $item['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>