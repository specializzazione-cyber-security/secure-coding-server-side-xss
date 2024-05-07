<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php include_once __DIR__ . '/../components/navbar.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 py-5">
                <h1 class="text-center display-1">Ecco tutti gli articoli!</h1>
            </div>
            <?php foreach ($articles as $article) : ?>
                <div class="col-3 my-3">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/<?php echo $article->img?>" class="card-img-top" alt="..." height="300">
                        <div class="card-body">
                            <h5 class="card-title text-truncate"><?php echo $article->name ?></h5>
                            <p class="card-text text-truncate"><?php echo $article->description ?></p>
                            <a href="/articles/show?name=<?php echo $article->name  ?>" class="btn btn-warning">Scopri di più</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>