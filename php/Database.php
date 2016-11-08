<?php

class Database 
{
    const SERVER = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'Poopoo8594';
    const DATABASE = 'ergo';

    function __construct()
    {
         $this->connection = new mysqli(Database::SERVER, Database::USERNAME, Database::PASSWORD, Database::DATABASE);
    }

    // This will be called at the end of the script.
    function __destruct()
    {
        $this->connection->close();
    }

    function query($query)
    {
        return $this->connection->query($query);
    }
}

?>