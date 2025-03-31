<?php
session_start();
include('../config/config.php');
include('../includes/functions.php');

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = safeQuery($db, 'SELECT username FROM users WHERE id = :user_id', [':user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'] ?? 'Gebruiker';

$stmt = safeQuery($db, 'SELECT * FROM transactions WHERE user_id = :user_id AND type = "inkomen" ORDER BY date DESC', [':user_id' => $user_id]);
$incomeTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

include('views/income_view.php');