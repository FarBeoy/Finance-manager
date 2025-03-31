<?php
session_start();
include('../config/config.php');
include('../includes/functions.php');

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    if (!is_numeric($amount) || $amount <= 0) {
        die("Ongeldig bedrag.");
    }

    if (!in_array($type, ['inkomen', 'uitgave'])) {
        die("Ongeldig transactietype.");
    }

    if (empty($category) || empty($date)) {
        die("Alle velden zijn verplicht.");
    }

    safeQuery($db, 'INSERT INTO transactions (user_id, amount, type, category, date) VALUES (:user_id, :amount, :type, :category, :date)', [
        ':user_id' => $user_id,
        ':amount' => $amount,
        ':type' => $type,
        ':category' => $category,
        ':date' => $date
    ]);

    header('Location: transactions.php');
    exit;
}

include('views/add_transaction_view.php');
