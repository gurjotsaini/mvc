<!doctype html>
<html lang="en">
    <head>
        <title>MVC</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="/assets/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>">My MVC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT_URL; ?>Shares">Shares</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav navbar-right">
                        <?php if (isset($_SESSION['is_logged_in'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT_URL; ?>">
                                    Welcome <?= $_SESSION['user_data']['name']; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav><!-- /.nav -->

        <div class="container">
            <div class="row">
                <br>
                <?php Messages::display(); ?>
                <?php require ($view); ?>
            </div>
        </div><!-- /.container -->
    </body>
</html>