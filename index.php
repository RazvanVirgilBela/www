<?php

require 'includes/init.php';

require 'includes/create_table.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>
<?php require 'includes/header.php'; ?>

<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Home</h1>
        <ul class="list-unstyled">
            <?php foreach ($articles as $article) : ?>
                <li class="mb-4">
                    <article>
                        <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                        <time datetime="<?= $article['published_at'] ?>">
                            <?php
                                $datetime = new DateTime($article['published_at']);
                                echo $datetime->format("j F, Y");
                            ?>
                        </time>
                        <?php if ($article['category_names']) : ?>
                            <p>Categories:
                                <?php foreach ($article['category_names'] as $name) : ?>
                                    <?= !empty($name) ? htmlspecialchars($name) : 'No category' ?>
                                <?php endforeach; ?>
                            </p>
                        <?php endif; ?>
                        <p><?= htmlspecialchars($article['content']); ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    

    <?php require 'includes/pagination.php'; ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>
