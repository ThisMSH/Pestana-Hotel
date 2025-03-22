<?php
class Db {
    private $connection;
    
    protected function conn() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $options = array(PDO::ATTR_PERSISTENT => true);

        try {
            $this->connection = new PDO($dsn, DB_USER, DB_PW, $options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }
}