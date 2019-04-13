<?php
    /**
     * Created by User: gurjot
     */

    class Shares extends Controller
    {
        protected function Index() {
            $viewModel = new ShareModel();

            $this->returnView($viewModel->Index(), true);
        }
    }