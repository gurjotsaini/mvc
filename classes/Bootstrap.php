<?php
    /**
     * Created by User: gurjot
     */

    class Bootstrap
    {
        private $controller;
        private $action;
        private $request;

        /**
         * Bootstrap constructor.
         * @param $request
         */
        public function __construct ( $request) {
            $this->request = $request;

            // If there is no controller specified, redirect to home
            // else, redirect to specified controller.
            if ($this->request['controller'] == "") {
                // URL: mysite.com/home
                // Output: home
                $this->controller = 'home';
            } else {
                // URL: mysite.com/controllerName
                // Output: controllerName
                $this->controller = $this->request['controller'];
            }

            // If there is no action specified, redirect to index
            // else, redirect to specified action.
            if ($this->request['action'] == "") {
                // URL: mysite.com/home/index
                // Output: index
                $this->action = 'index';
            } else {
                // URL: mysite.com/home/actionName
                // Output: actionName
                $this->action = $this->request['action'];
            }
        } // End of __constructor method

        /**
         *
         */
        public function createController() {
            // Check for the Controller Class
            if (class_exists($this->controller)) {
                // Sets the Controller Class as Parent Class
                $parents = class_parents($this->controller);

                // Check if Controller Class is extended
                if (in_array("Controller", $parents)) {
                    // Check if controller includes the action
                    if (method_exists($this->controller, $this->action)) {
                        // Returns the new Instance of the controller
                        return new $this->controller($this->action, $this->request);
                    } else {
                        // Informs that method doesn't exists
                        echo '<h1>Method does not exist</h1>';
                        return;
                    } // End of method_exists if-else Statement
                } else {
                    // Informs that Base Controller doesn't found
                    echo '<h1>Base Controller not found</h1>';
                    return;
                } // End of in_array if-else Statement
            } else {
                // Informs that Controller doesn't exists
                echo '<h1>Controller class does not exists</h1>';
                return;
            } // End of class_exists if-else Statement
        }
    }