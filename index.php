<?php
    require 'classes/Database.php';

    //use classes\Database;
    $database = new Database();

//    $database->query('SELECT * FROM posts WHERE id = :id');
//    $database->bind(':id', 1);


    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if (isset($_POST['submit'])) {
        $title  = $post['title'];
        $body   = $post['body'];

        $database->query('INSERT INTO posts (title, body) VALUES (:title, :body)');
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        $database->execute();

        if ($database->lastInsertId()) {
            echo '<p>Post Added!</p>';
        }
    }

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
        <h1>Add Post</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label for="title">Post Title</label>
            <br />
            <input type="text " name="title" placeholder="Add a title" />
            <br />
            <label for="body">Post Body</label>
            <br />
            <textarea name="body" id="" cols="30" rows="10"></textarea>
            <br />
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        <hr />
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
