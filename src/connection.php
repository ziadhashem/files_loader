<?php
 
/**
 * A class file to connect to database
 */
class DB_CONNECT 
{
    private $mysqli;
 
    // constructor
    function __construct() 
	{
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() 
	{
        // closing db connection
        $this->close();
    }

    /**
     * @return mysqli
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }

    /**
     * Function to connect with database
     */
    function connect()
	{
        // import database connection variables
        require_once __DIR__ . '/configration.php';
        $this->mysqli  = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
        return  $this->mysqli;
    }
 
    /**
     * Function to close db connection
     */
    function close()
	{
        // closing db connection
        $this->mysqli->close();

    }
 
}
 
?>