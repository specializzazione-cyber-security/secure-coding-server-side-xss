<?php


use Dotenv\Dotenv;
use App\Modules\Database;

require_once dirname(__FILE__, 2) . "/helpers.php";
require_once basePath("vendor/autoload.php");

$dotenv = Dotenv::createImmutable(basePath());
$dotenv->load();

if (!file_exists(basePath() . '.env')) {
    die("Il file .env non è stato trovato.");
}

$db_config = require_once configPath() . "database.php";

if (empty($db_config)) {
    die("Configurazione del database non valida.");
}

$database = new Database($db_config);

$database->pdo->query("DROP TABLE IF EXISTS users");

$data = [
    [
        'email' => 'admin@admin.com',
        'password' => '12345678',
        'is_locked' => 0,
        'is_admin' => 1,
    ],
    [
        'email' => 'user@user.com',
        'password' => '12345678',
        'is_locked' => 0,
        'is_admin' => 0,

    ],
    [
        'email' => 'lockeduser@user.com',
        'password' => '12345678',
        'is_locked' => 1,
        'is_admin' => 0,

    ],
];

$database->pdo->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_locked boolean NOT NULL DEFAULT false,
    is_admin boolean NOT NULL DEFAULT false,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );");

foreach($data as $entry){
    $database->pdo->query("insert into users (email, password, is_locked, is_admin) values ('" . $entry['email'] . "','"  . $entry['password'] . "','"  . $entry['is_locked'] . "','" . $entry['is_admin'] ."')");
}

