<?php
    /**
     * Created by User: gurjot
     */

    class ShareModel extends Model
    {
        /**
         * @return mixed
         */
        public function Index() {
            $this->query('SELECT * FROM shares ORDER BY create_date DESC');
            $rows = $this->resultSet();

            return $rows;
        }

        public function add() {
            // Sanitize POST array
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check for submission
            if ($post['submit']) {
                // Check if fields are empty. If yes, display error message.
                if ( $post['title'] == '' || $post['body'] == '' || $post['link'] == '' ) {
                    Messages::setMessage('Please fill in all fields.', 'error');
                    return;
                }

                // Insert into DB
                $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
                $this->bind(':title', $post['title']);
                $this->bind(':body', $post['body']);
                $this->bind(':link', $post['link']);
                $this->bind(':user_id', 1);
                $this->execute();

                // Verify
                if ($this->lastInsertId()) {
                    // Redirect
                    header('Location: ' . ROOT_URL . 'Shares');
                }
            }
            return;
        }
    }