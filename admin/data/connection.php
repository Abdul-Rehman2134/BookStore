<?php
class Database
{
    private $conn = null;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = 'bs';
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insert($sql)
    {
        if ($this->conn->query($sql) === TRUE) {
            return TRUE;
        }
        return "Error: " . $sql . "<br>" . $this->conn->error;
    }

    public function getLastId()
    {
        return $this->conn->insert_id;
    }
    
    public function query($sql)
    {
        $result = $this->conn->query($sql);
        
        $rows = [];
        if(isset($result->num_rows) && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function close()
    {
        $this->conn->close();
    }
}