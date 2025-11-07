<form action="" method="POST">
    <label for="joketext">Type your joke here:</label>
    <textarea id="joketext" name="joketext"></textarea>
    
    <label for="authorid">Select Author:</label>
    <select name="authorid" id="authorid">
        <?php foreach ($authors as $author): ?>
            <option value="<?= htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for="categoryid">Select Category:</label>
    <select name="categoryid" id="categoryid">
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($category['categoryName'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <input type="submit" name="submit" value="Add Joke">
</form>