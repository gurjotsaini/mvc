<?php
    /**
     * Created by User: gurjot
     */

    //namespace Controllers;

    //use Classes\Controller;

    class Home extends Controller
    {
        protected function Index() {
            $viewModel = new HomeModel();

            $this->returnView($viewModel->Index(), true);
        }
    }