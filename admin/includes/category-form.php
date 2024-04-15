<?php if(!empty($category->errors)) : ?>

  <ul>
        <?php foreach ($category->errors as $error) : ?>
            <li><?= $error ?></li>    
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form method="post" id="formCategory">

    <div class="form-group">
        <label for="category-name">Category name</label>
        <input name="category-name" id="category-name" placeholder="Category name"
            class="form-control <?php echo isset($error) ? 'is-invalid' : ''; ?>" required>
        <div class="invalid-feedback">
            <?php echo isset($error) ? $error : ''; ?>
        </div>
    </div>

    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Add</button>
</form>