<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=htmlspecialchars($title, ENT_QUOTES, 'UTF-8')?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="jokes.css"> 
</head>
<body class="bg-light">
    <header class="bg-success text-white py-3 shadow-sm">
        <div class="container">
            <h1 class="h3 mb-0">Internet Joke Database</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="jokes.php">Jokes List</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="addjoke.php">Add a new joke</a></li>
                </ul>
        </nav>
        </div>
    </header>

    <main class="container my-4 p-4 bg-white rounded shadow-sm">
        <?=$output?>
    </main>

    <footer class="bg-secondary text-white text-center py-3 mt-auto">
        &copy; IJDB <?=date('Y')?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9furbN+8pQtmPqgL35ZgA4jT+K7N7w" crossorigin="anonymous"></script>
</body>
</html>