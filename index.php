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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>To do</title>
        <!-- czcionka
        <link href="" rel="stylesheet">
        -->
        <link rel="stylesheet" href="css/main.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="list">
            <h1 class="header">to do</h1>

            <ul class="items">
                <li>
                    <span class="item">Pick up shopping</span>
                    <a href="#" class="done-button">Mark as done</a>
                </li>
                <li>
                    <span class="item done">Learn php</span>
                </li>
            </ul>

            <form class="item-add" action="add.php" method="post">
                <input type="text" name="name" placeholder="What you gonna do." class="input" autocomplete="off" required>
                <input type="submit" value="Add" class="submit">
            </form>
        </div>


    </body>
</html>
