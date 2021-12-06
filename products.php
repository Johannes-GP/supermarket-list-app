<?php
    require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    if ( isset($_GET['category']) ) {
        $category = $_GET['category'];
    } else {
        $category = '';
    }

    $query = 'SELECT id FROM category WHERE category_name = :catName';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':catName', $category);
    $stmt->execute();
    $category_id = $stmt->fetch();

    $products_query = 'SELECT * FROM product WHERE category = :catID';
    $statement = $pdo->prepare($products_query);
    $statement->bindParam(':catID', $category_id['id'], PDO::PARAM_INT);
    $statement->execute();
    $rows = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container text-center mt-5">
        <h1>PRODUCTOS DISPONIBLES EN LA CATEGORIA:</h1>
        <h3><?php echo strtoupper($category); ?></h3>
    </div>
    <div class="container mt-3 d-flex flex-column text-center">
        <?php foreach ( $rows as $row ) { ?>
            <a href="/list.php?item=<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></a>        
        <?php } ?>
    </div>
</body>
</html>