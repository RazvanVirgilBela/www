<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

?>
<?php require '../includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4"> Administration</h1>
    <div class="text-center">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="article.php">Article</a>
            </div>
            <div class="col">    
                <a class="btn btn-primary" href="category-page.php">Category</a>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>

