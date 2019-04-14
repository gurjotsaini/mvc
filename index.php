<?php
    // Start Session
    session_start();

    // Including config
    require 'config.php';

    require 'classes/Bootstrap.php';
    require 'classes/Controller.php';
    require 'classes/Model.php';

    require 'controllers/Home.php';
    require 'controllers/Shares.php';
    require 'controllers/Users.php';

    require 'models/HomeModel.php';
    require 'models/ShareModel.php';
    require 'models/UserModel.php';

    $bootstrap = new Bootstrap($_GET);
    $controller = $bootstrap->createController();

    // Check for the controller
    if ($controller) {
        $controller->executeAction();
    }