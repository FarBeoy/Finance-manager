<?php
session_start();
include('../config/config.php');
include('../includes/functions.php');

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $transaction_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $stmt = safeQuery($db, 'SELECT * FROM transactions WHERE id = :id AND user_id = :user_id', [
        ':id' => $transaction_id,
        ':user_id' => $user_id
    ]);


    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($transaction) {
        safeQuery($db, 'DELETE FROM transactions WHERE id = :id', [':id' => $transaction_id]);
        header('Location: transactions.php');
        exit;
    } else {
        die('Transactie niet gevonden of toegang geweigerd.');
    }
} else {
    die('Ongeldige aanvraag.');
}
