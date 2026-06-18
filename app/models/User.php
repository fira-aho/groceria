<?php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // LOGIN
    public function login($email, $password)
    {
        $query = "SELECT * FROM users
                  WHERE email='$email'
                  AND password='$password'";

        return mysqli_query($this->conn, $query);
    }

    // CEK EMAIL
    public function cekEmail($email)
    {
        $query = "SELECT * FROM users
                  WHERE email='$email'";

        return mysqli_query($this->conn, $query);
    }

    // REGISTER
    public function register($nama, $email, $password)
    {
        $query = "INSERT INTO users (nama, email, password)
                  VALUES ('$nama', '$email', '$password')";

        return mysqli_query($this->conn, $query);
    }
}