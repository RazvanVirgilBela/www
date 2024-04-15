<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$paginator = new Paginator($_GET['category'] ?? 1, 4, Category::getTotal($conn));

$categories = Category::getCategory($conn, $paginator->limit, $paginator->offset);

?>
<?php require '../includes/header.php'; ?>

<h2>Categories</h2>

<?php
if (empty($categories)): ?>
    <a href="new-category.php">Add new category</a>
    <p>No categories found.</p>
<?php else: ?>

  <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
             <a class="navbar-brand" href="new-category.php">+New category</a>
        </div>
    </nav>
   

    <table class="table text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
         
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td>
                        <a href="category.php?id=<?= $category['id']; ?>">
                            <?= htmlspecialchars($category['name']); ?>
                        </a>
                    </td>
                    <td>
                      <a class="btn btn-danger" href="delete-category.php?id=<?= $category['id']; ?>">Delete</a>
                      <a class="btn btn-primary" href="edit-category.php?id=<?= $category['id']; ?>">Edit</a>
                    </td>
                </tr>
                
                    
                
            <?php endforeach; ?>
        </tbody>
    </table>

   

    <?php require '../includes/pagination.php';

endif;
?>

<?php require '../includes/footer.php'; ?>