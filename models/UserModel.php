<?php
    /**
     * Created by User: gurjot
     */

    class UserModel extends Model
    {
        /**
         *
         */
        public function register() {
            // Sanitize POST array
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $password = md5($post['password']);

            // Check for submission
            if ($post['submit']) {
                // Check if fields are empty. If yes, display error message.
                if ( $post['name'] == '' || $post['email'] == '' || $post['password'] == '' ) {
                    Messages::setMessage('Please fill in all fields.', 'error');
                    return;
                }

                // Insert into DB
                $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
                $this->bind(':name', $post['name']);
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $this->execute();

                // Verify
                if ($this->lastInsertId()) {
                    // Redirect
                    header('Location: ' . ROOT_URL . 'users/login');
                }
            }
            return;
        } // end of register method

        public function login() {
            // Sanitize POST array
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $password = md5($post['password']);

            // Check for submission
            if ($post['submit']) {
                // Compare login
                $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $this->execute();

                // Adding row value in variable
                $row = $this->single();

                // Check for the row
                if ($row) {
                    $_SESSION['is_logged_in'] = true;

                    // Adding user data in an array
                    $_SESSION['user_data'] = [
                        "id"    =>  $row['id'],
                        "name"  =>  $row['name'],
                        "email" =>  $row['email']
                    ];

                    // Redirect
                    header('Location: ' . ROOT_URL . 'Shares');
                } else {
                    Messages::setMessage('Incorrect Login', 'error');
                }
            }
            return;
        } // end of login method
    }