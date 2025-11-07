<h2><?= $title ?></h2>
<p><?= $totalJokes ?> jokes have been submitted to the Internet Joke Database.</p>

<?php foreach ($jokes as $joke): ?>
    <blockquote>
        <img src="./img/joke_icon.png" alt="Joke Icon" class="joke-icon"> 
        
        <div class="joke-content">
            <p>
                <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
                (by 
                <span class="author-name-wrapper">
                    <img src="./img/author_icon.png" alt="Author Icon" class="author-icon"> 
                    <span class="author-name"><?= htmlspecialchars($joke['authorName'], ENT_QUOTES, 'UTF-8') ?></span>
                </span>)
                on <?= $joke['jokedate'] ?> 
                in category <?= htmlspecialchars($joke['categoryName'], ENT_QUOTES, 'UTF-8') ?>
                
            </p>
        </div>
    </blockquote>
<?php endforeach; ?>