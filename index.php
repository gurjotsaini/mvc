<?php
    // Including config
    require 'config.php';
    require 'classes/Bootstrap.php';

    $bootstrap = new \Classes\Bootstrap($_GET);
    $controller = $bootstrap->createController();