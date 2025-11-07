<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN: <?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../jokes.css"> 
</head>
<body>
    <header>
        <h1>Internet Joke Database - ADMIN AREA</h1>

        <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="jokes.php">Admin Joke List</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="addjoke.php">Add a New Joke</a></li>
                    <!-- <li class="nav-item"><a class="nav-link text-white" href="addjoke.php">Add a new joke</a></li> -->
                    <li class="nav-item"><a class="nav-link text-white" href="../index.php">Back to Public Site</a></li>
                </ul>
        </nav>
    </header>
    <main>
        <?= $output ?>
    </main>
    
<footer class="bg-secondary text-white text-center py-3 mt-auto">
        &copy; IJDB <?=date('Y')?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9furbN+8pQtmPqgL35ZgA4jT+K7N7w" crossorigin="anonymous"></script>
</body>
</html>