<?php
    /**
     * Created by User: gurjot
     */

    abstract class Model
    {
        protected $dbh;
        protected $stmt;

        /**
         * Model constructor.
         */
        public function __construct () {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('config.ini');

            // Set DSN
            $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database_name'];

            // Set Options
            $options = array(
                PDO::ATTR_PERSISTENT    => true,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
            );

            $this->dbh = new PDO($dsn, $config['username'], $config['password'], $options);
        } // end of __construct method

        /**
         * @param $query
         */
        public function query( $query) {
            $this->stmt = $this->dbh->prepare($query);
        } // end of query method

        /**
         * @param      $param
         * @param      $value
         * @param null $type
         */
        public function bind( $param, $value, $type = null) {
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

        /**
         * @return mixed
         */
        public function execute() {
            return $this->stmt->execute();
        } // end of execute method

        /**
         *
         */
        public function lastInsertId() {
            return $this->dbh->lastInsertId();
        } // end of lastInsertId method

        /**
         * @return all values
         */
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        } // end of resultSet method

        /**
         * @return single value
         */
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
    }