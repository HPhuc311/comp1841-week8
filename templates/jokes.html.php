<h2 class="mb-4">Jokes List</h2>
 <p><?=$totalJokes?> jokes have been submitted to the Internet Joke Database</p>
<?php foreach ($jokes as $joke): ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <p class="card-text mb-0">
                    <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
                    <small class="text-muted">(by <?=htmlspecialchars($joke['authorName'], ENT_QUOTES, 'UTF-8')?>)</small>
                    <?=htmlspecialchars($joke['categoryName'], ENT_QUOTES, 'UTF-8')?>
                </p>

                <div class="d-flex flex-column align-items-end">
                    <a href="editjoke.php?id=<?=$joke['id']?>" class="btn btn-sm btn-outline-primary mb-1">Edit</a>
                    
                    <form action="deletejoke.php" method="post" class="m-0 p-0">
                        <input type="hidden" name="id" value="<?=$joke['id']?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                onclick="return confirm('Are you sure you want to delete this joke?');">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            
            <footer class="blockquote-footer mt-2 text-end">
                Posted on: <?php
                    $date = new DateTime($joke['jokedate']);
                    echo $date->format('d F Y');
                ?>
            </footer>
        </div>
    </div>
<?php endforeach; ?>