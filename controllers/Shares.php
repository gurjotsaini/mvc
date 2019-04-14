<?php
    /**
     * Created by User: gurjot
     */

    class Shares extends Controller
    {
        /**
         *
         */
        protected function Index() {
            $viewModel = new ShareModel();
            $this->returnView($viewModel->Index(), true);
        }

        protected function add() {
            if ( !isset($_SESSION['is_logged_in']) ) {
                header('Location: ' . ROOT_URL . 'Shares');
            }

            $viewModel = new ShareModel();
            $this->returnView($viewModel->add(), true);
        }
    }