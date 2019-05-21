<?php
namespace Bussen;
require '../vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
use Mysqli;

$dotenv = new Dotenv();
$dotenv->load('../.env');
$dbHost = $_ENV["DB_HOST"];
$dbUser = $_ENV["DB_USER"];
$dbPassword = $_ENV["DB_PASSWORD"];

// Create connection
$conn = new Mysqli($dbHost, $dbUser, $dbPassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   