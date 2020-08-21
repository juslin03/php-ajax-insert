<?php

// parametres de la connexion a la base de donnees
$host = 'your-host';
$dbname = 'your-db';
$user = 'your-user';
$pass = 'your-password';
$reg_date = Date('Y-m-d H:i:s');
try {
    $conn = new PDO("mysql:localhost = $host; dbname = $dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>
