<?php
    $list = file_get_contents('products.json', true);
    $products = json_decode($list);
    
    if(isset($_GET['item'])) {
        $item = $_GET['item'];
        $products[] = $item;
    }
    $json = json_encode($products, JSON_PRETTY_PRINT);
    file_put_contents('products.json', $json);
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
</head>
<body>
    <div class="container text-center mt-5">
        <h1>TU LISTA:</h1>
        <?php
            foreach ($products as $product) { ?>
                <p><?php echo $product; ?></p>
            <?php }
        ?>
    </div>
    <div class="container mt-3 d-flex flex-column text-center">
        <a href="/products.php">Agregar otro producto</a>
        <!--<a href="https://api.whatsapp.com/send?phone=4451575864?text=De%20la%20FARMACIA%20quiero%3A%0AParacetamol%0AAspirina">Enviar Lista</a>-->
        <a href="https://wa.me/524451575864?text=De%20la%20FARMACIA%20quiero%3A%0AParacetamol%0AAspirina">Enviar Lista</a>
    </div>
</body>
</html>