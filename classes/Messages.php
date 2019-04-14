<?php
    /**
     * Created by User: gurjot
     */

    class Messages
    {
        public static function setMessage($text, $type) {
            if ($type == 'error') {
                $_SESSION['errorMsg'] = $text;
            } else {
                $_SESSION['successMsg'] = $text;
            }
        }

        public static function display() {
            if (isset($_SESSION['errorMsg'])) {
                echo '<div class="container h-100 d-flex justify-content-center">
                        <div class="text-center my-auto">
                        <br>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                ' . $_SESSION['errorMsg'] . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                     </div>';

                unset($_SESSION['errorMsg']);
            }

            if (isset($_SESSION['successMsg'])) {
                echo '<div class="container h-100 d-flex justify-content-center">
                        <div class="text-center my-auto">
                        <br>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                ' . $_SESSION['successMsg'] . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                     </div>';

                unset($_SESSION['successMsg']);
            }
        }
    }