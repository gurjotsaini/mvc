<?php
    /**
     * Created by User: gurjot
     */

    //namespace classes;

    class Database
    {
        private $host       = 'localhost';
        private $username   = 'root';
        private $password   = 'root';
        private $dbName     = 'myBlog';

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

        public function query($query) {
            $this->stmt = $this->dbh->prepare($query);
        } // end of query method

        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        } // end of bind method

        public function execute() {
            return $this->stmt->execute();
        } // end of execute method

        public function lastInsertId() {
            $this->dbh->lastInsertId();
        } // end of lastInsertId method

        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        } // end of resultSet method
    } // end of class