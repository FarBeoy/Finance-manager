<?php
session_start();
include('../config/config.php');
include('../includes/functions.php');

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare('SELECT username FROM users WHERE id = :user_id');
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'] ?? 'Gebruiker';

$incomeTotal = 0;
$expenseTotal = 0;

$stmt = $db->prepare('SELECT * FROM transactions WHERE user_id = :user_id AND type = "inkomen" ORDER BY date DESC');
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$incomeTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($incomeTransactions as $transaction) {
    $incomeTotal += $transaction['amount'];
}

$stmt = $db->prepare('SELECT * FROM transactions WHERE user_id = :user_id AND type = "uitgave" ORDER BY date DESC');
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$expenseTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($expenseTransactions as $transaction) {
    $expenseTotal += $transaction['amount'];
}

$netWorth = $incomeTotal - $expenseTotal;

include('views/dashboard_view.php');