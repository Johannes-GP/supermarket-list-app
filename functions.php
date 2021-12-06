<?php

require 'config.php';

$pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
);

function save_list( $items ) {
    foreach ( $items as $item ) {
        $query = 'INSERT INTO list (product_id, list_date) VALUES (:prodID, now());';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':prodID', $item['product_id']);
        $stmt->execute();
    }
}