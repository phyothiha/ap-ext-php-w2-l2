<?php
    require 'config.php';

    $stmt = $pdo->prepare("
        DELETE FROM `todo` WHERE `id` = :id
    ");

    $result = $stmt->execute([
        'id' => $_GET['id'],
    ]);

    header("Location: index.php");
