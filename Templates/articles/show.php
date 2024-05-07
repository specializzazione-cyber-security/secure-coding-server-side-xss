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
        <div class="row align-items-center py-5 vh-100">
            <div class="col-6 d-flex flex-column align-items-center justify-content-center">
                <img src="/img/<?php echo $article->img?>" alt="" class="img-fluid">
                <p>È ancora disponibile? premi qui per scoprirlo:</p>
                <a id="checkStockBtn" class="btn btn-warning" path="<?php echo $article->name ?>">Controlla Quantità</a>
                <p id="stockText"></p>
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                <h1 class="display-5"><?php echo $article->name ?></h1>
                <p><?php echo $article->description ?></p>
                <p class="display-6"><?php echo $article->price ?> $</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
    </div>

    <script src="/js/checkStock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>