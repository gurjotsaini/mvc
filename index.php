<?php
    require 'classes/Database.php';

    use classes\Database;
    $database = new Database();

    $database->query('SELECT * FROM posts');
    $rows = $database->resultSet();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index</title>
    </head>
    <body>
        <h1>Posts</h1>
        <div>
            <?php foreach ($rows as $row) : ?>
                <div>
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['body']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
