<?php
    /**
     * Created by User: gurjot
     */

    //namespace Classes;

    abstract class Controller
    {
        protected $request;
        protected $action;

        public function __construct ($action, $request) {
            $this->action   = $action;
            $this->request  = $request;
        } // End of __constructor method

        /**
         * @return action specified to the controller
         */
        public function executeAction() {
            return $this->{$this->action}();
        } // End of executeAction method

        /**
         * @param $viewModel
         * @param $fullView
         *
         * @return view of the controller
         */
        protected function returnView( $viewModel, $fullView) {
            $view = 'views/' . get_class($this) . '/' . $this->action . '.php';

            // Check if it is full view
            if ($fullView) {
                require 'views/main.php';
            } else {
                // Require $view
                require ($view);
            }
        }
    }