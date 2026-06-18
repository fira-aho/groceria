<?php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Login User
    public function login($email, $password)
    {
        $query = "SELECT * FROM users
                  WHERE email='$email'
                  AND password='$password'";

        $result = mysqli_query($this->conn, $query);

        return $result;
    }
}