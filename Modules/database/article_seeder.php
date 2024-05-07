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

$database->pdo->query("DROP TABLE IF EXISTS articles");

$database->pdo->query("CREATE TABLE articles (
    name VARCHAR(255) NOT NULL,
    description TEXT,
    img VARCHAR(255) NOT NULL,
    count INT,
    price FLOAT
  );");

$articles = [
    [
      "name" => "Smartphone Samsung Galaxy S23 Ultra",
      "description" => "L'ultimo smartphone di Samsung con un display AMOLED da 6.8 pollici, una fotocamera quadrupla da 108MP e una batteria da 5000mAh.",
      "img" => "samsung-galaxy-s23-ultra.jpg",
      "count" => 10,
      "price" => 1249.00
    ],
    [
      "name" => "Libro Harry Potter e la pietra filosofale",
      "description" => "Il primo libro della serie di Harry Potter di J.K. Rowling. Un romanzo fantasy per bambini e adulti.",
      "img" => "harry-potter-e-la-pietra-filosofale.jpg",
      "count" => 50,
      "price" => 15.90
    ],
    [
      "name" => "Scarpe Nike Air Force 1",
      "description" => "Un modello iconico di scarpe da ginnastica Nike. Disponibili in vari colori e stili.",
      "img" => "nike-air-force-1.jpg",
      "count" => 20,
      "price" => 109.99
    ],
    [
      "name" => "Televisore LG OLED C2",
      "description" => "Un televisore OLED con una qualità dell'immagine eccezionale. Smart TV con supporto per le principali app di streaming.",
      "img" => "lg-oled-c2.jpg",
      "count" => 7,
      "price" => 1499.00
    ],
    [
      "name" => "Caffettiera elettrica De'Longhi EC155",
      "description" => "Una caffettiera elettrica semplice da usare per preparare un caffè espresso perfetto.",
      "img" => "delonghi-ec155.jpg",
      "count" => 15,
      "price" => 49.99
    ]
  ];

  foreach ($articles as $article) {
    $query = "INSERT INTO articles (name, description, img, count, price)
              VALUES (:name, :description, :img, :count, :price)";

    $stmt = $database->pdo->prepare($query);

    $stmt->bindParam(":name", $article["name"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $article["description"], PDO::PARAM_STR);
    $stmt->bindParam(":img", $article["img"], PDO::PARAM_STR);
    $stmt->bindParam(":count", $article["count"], PDO::PARAM_INT);
    $stmt->bindParam(":price", $article["price"], PDO::PARAM_STR);
  
    $stmt->execute();
  
    if ($stmt->errorCode() !== "00000") {
      $error = $stmt->errorInfo();
      die("Errore di inserimento: " . $error[2]);
    }

  $database->pdo->query("DROP TABLE IF EXISTS orders");

    $database->pdo->query("CREATE TABLE orders (
      id INT PRIMARY KEY AUTO_INCREMENT,
      user_id INT NOT NULL,
      total DECIMAL(10,2) NOT NULL,
      note VARCHAR(255) DEFAULT NULL,
      date DATE NOT NULL,
      FOREIGN KEY (user_id) REFERENCES users(id)
    );");

    $database->pdo->query("INSERT INTO orders (user_id, total, note, date)
    VALUES (2, 559.99, 'Consegna al piano', '2024-05-04');");

    $database->pdo->query("INSERT INTO orders (user_id, total, note, date) 
    VALUES (2, 99.9, 'Citofono non funzionante', '2024-05-04');");
    
}

