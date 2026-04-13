<?php
session_start();
require __DIR__ . "/../database/connection.php";

$email = isset($_POST["email"]) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : '';
$password = $_POST["password"] ?? '';
$confirm_password = $_POST["confirm-password"] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["message"] = "Voer een geldig e-mailadres in.";
    $_SESSION["email"] = htmlspecialchars($email);
    header("Location: /register-form");
    exit();
}

if (empty($password) || empty($confirm_password)) {
    $_SESSION["message"] = "Vul beide wachtwoordvelden in.";
    $_SESSION["email"] = htmlspecialchars($email);
    header("Location: /register-form");
    exit();
}

if ($password !== $confirm_password) {
    $_SESSION["message"] = "Wachtwoorden komen niet overeen.";
    $_SESSION["email"] = htmlspecialchars($email);
    header("Location: /register-form");
    exit();
}

if (strlen($password) < 8) {
    $_SESSION["message"] = "Kies een wachtwoord van minimaal 8 tekens.";
    $_SESSION["email"] = htmlspecialchars($email);
    header("Location: /register-form");
    exit();
}

$check_account = $conn->prepare("SELECT id FROM account WHERE email = :email LIMIT 1");
$check_account->bindParam(":email", $email);
$check_account->execute();

if ($check_account->rowCount() === 0) {
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    $create_account = $conn->prepare("INSERT INTO account (email, password) VALUES (:email, :password)");
    $create_account->bindParam(":email", $email);
    $create_account->bindParam(":password", $encrypted_password);
    $create_account->execute();

    $_SESSION["success"] = "Registratie is gelukt, log nu in.";
    header("Location: /login-form");
    exit();
}

$_SESSION["message"] = "Dit e-mailadres is al in gebruik.";
$_SESSION["email"] = htmlspecialchars($email);
header("Location: /register-form");
exit();
