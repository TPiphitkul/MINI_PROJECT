<?php
$conn = new mysqli("localhost", "root", "", "mini_project");

if ($conn->connect_error) {
    die("DB Connection Failed");
}

$conn->set_charset("utf8mb4");

session_start();
