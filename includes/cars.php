<?php
require_once(__DIR__ . '/../database/connection.php');

$cars = [];

try {
    $query = "SELECT * FROM auto";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $cars = [];
}

function get_car_by_slug(string $slug, array $cars)
{
    foreach ($cars as $car) {
        if ($car['slug'] === $slug) {
            return $car;
        }
    }

    return null;
}
