<?php
    // Including config
    require 'config.php';

    require 'classes/Bootstrap.php';
    require 'classes/Controller.php';
    require 'controllers/Home.php';
    require 'controllers/Shares.php';
    require 'controllers/Users.php';

    $bootstrap = new Bootstrap($_GET);
    $controller = $bootstrap->createController();

    // Check for the controller
    if ($controller) {
        $controller->executeAction();
    }