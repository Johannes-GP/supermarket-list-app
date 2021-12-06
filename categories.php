<?php

require 'config.php';
$pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
);
$result = $pdo->query('SELECT * FROM category');
$rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>ELIGE UNA CATEGORIA</h1>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <div class="row">
            <?php foreach ($rows as $row) { ?>
                <div class="col-sm-12">
                    <a href="/products.php?category=<?php echo $row['category_name']; ?>">
                        <div class="card mb-3" style="width: 18rem;">
                            <img src="img/<?php echo $row['category_image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $row['category_name']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>