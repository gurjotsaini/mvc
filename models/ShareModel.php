<?php
    /**
     * Created by User: gurjot
     */

    class ShareModel extends Model
    {
        public function Index() {
            $this->query('SELECT * FROM shares');
            $rows = $this->resultSet();

            return $rows;
        }
    }