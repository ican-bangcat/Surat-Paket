<?php
class Database
{
    private $servername = "localhost"; // Ganti dengan nama server MySQL Anda
    private $username = "root"; // Ganti dengan username MySQL Anda
    private $password = ""; // Ganti dengan password MySQL Anda
    private $database = "surpa"; // Ganti dengan nama database MySQL Anda
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function execute($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insert($table, $col, $values)
    {
        $status = false;
        // print_r($col);
        $f = "";
        foreach ($col as $val) {
            $f .= $val . ",";
        }
        $f = rtrim($f, ",");
        $v = "";
        foreach ($values as $val) {
            $v .= "'" . $val . "',";
        }
        $v = rtrim($v, ",");
        // echo $v;
        $query = "INSERT INTO $table ($f) VALUES ($v)";
        // echo $query;
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            // Check the number of affected rows
            $affectedRows = mysqli_affected_rows($this->conn);
            if ($affectedRows > 0) {
                $status = true;
            }
        } else {
            $status = false;
        }

        return $status;
    }

    public function update($table, $data, $where)
    {
        $status = false;
        // print_r($col);
        $f = "";
        foreach ($data as $col => $val) {
            $f .= "$col='$val',";
        }
        $f = rtrim($f, ",");

        $query = "UPDATE $table SET $f WHERE $where";
        // echo $query;
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            // check the number of affected rows
            $affectedRows = mysqli_affected_rows($this->conn);
            if ($affectedRows > 0) {
                $status = true;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function getConnection()
    {
        return $this->conn;
    }
    public function delete($table, $where)
    {
        $status = false;
        $query = "DELETE FROM $table WHERE $where";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            $affectedRows = mysqli_affected_rows($this->conn);
            if ($affectedRows > 0) {
                $status = true;
            }
        } else {
            $status = false;
        }

        return $status;
    }
}
 // public function insert($table, $col, $values)
    // {
    //     if ($this->conn) {
    //         $status = false;
    //         $f = implode(",", $col);
    //         $v = implode("','", $values);
    //         $query = "INSERT INTO $table ($f) VALUES ('$v')";
    //         $result = mysqli_query($this->conn, $query);

    //         if ($result) {
    //             $affectedRows = mysqli_affected_rows($this->conn);
    //             if ($affectedRows > 0) {
    //                 $status = true;
    //             }
    //         } else {
    //             $status = false;
    //         }

    //         return $status;
    //     } else {
    //         echo "Database connection is not established.";
    //         return false;
    //     }
    // }
