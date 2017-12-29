<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare(/** @lang text */
    "
    SELECT id, name, done
    FROM items
    WHERE user = :user
");

$itemsQuery->execute([
    'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

foreach ($items as $item) {
    echo $item['name'], '<br>';
}
?>