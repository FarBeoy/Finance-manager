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

    if (!$transaction) {
        die('Transactie niet gevonden of toegang geweigerd.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $amount = $_POST['amount'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $date = $_POST['date'];

        if (!is_numeric($amount) || $amount <= 0) {
            die("Ongeldig bedrag.");
        }

        if (!in_array($type, ['inkomen', 'uitgave'])) {
            die("Ongeldig transactietype.");
        }

        if (empty($category) || empty($date)) {
            die("Alle velden zijn verplicht.");
        }

        safeQuery($db, 'UPDATE transactions SET amount = :amount, type = :type, category = :category, date = :date WHERE id = :id', [
            ':amount' => $amount,
            ':type' => $type,
            ':category' => $category,
            ':date' => $date,
            ':id' => $transaction_id
        ]);

        header('Location: transactions.php');
        exit;
    }
} else {
    die('Ongeldige aanvraag.');
}

include 'views/edit_transaction_view.php';
