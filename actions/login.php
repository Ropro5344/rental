<?php
session_start();
require_once __DIR__ . "/../database/connection.php";

$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$password = $_POST['password'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
    $_SESSION['message'] = 'Voer uw e-mailadres en wachtwoord in.';
    $_SESSION['email'] = htmlspecialchars($email);
    header('Location: /login-form');
    exit();
}

$select_user = $conn->prepare("SELECT id, email, password FROM account WHERE email = :email LIMIT 1");
$select_user->bindParam(":email", $email);
$select_user->execute();
$user = $select_user->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    header('Location: /');
    exit();
}

$_SESSION['message'] = 'Ongeldige logingegevens. Probeer het opnieuw.';
$_SESSION['email'] = htmlspecialchars($email);
header('Location: /login-form');
exit();
