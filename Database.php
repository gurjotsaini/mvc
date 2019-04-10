<?php
    /**
     * Created by User: gurjot
     */

    class Database
    {
        private $host       = 'localhost';
        private $username   = 'root';
        private $password   = 'root';
        private $dbName     = 'mvc';

        private $dbh;
        private $error;
        private $stmt;

        public function __construct () {
            // Set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;

            // Set Options
            $options = array(
                PDO::ATTR_PERSISTENT    => true,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
            );
            
            // Create new PDO
            try {
                $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }
    }