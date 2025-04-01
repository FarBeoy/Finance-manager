<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $bank_name = $_POST['bank_name'];
    $card_number = $_POST['card_number'];
    $account_number = $_POST['account_number'];
    $iban = $_POST['iban'];

    $stmt = $db->prepare('INSERT INTO bank_accounts (user_id, bank_name, card_number, account_number, iban) VALUES (:user_id, :bank_name, :card_number, :account_number, :iban)');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':bank_name', $bank_name);
    $stmt->bindValue(':card_number', $card_number);
    $stmt->bindValue(':account_number', $account_number);
    $stmt->bindValue(':iban', $iban);
    $stmt->execute();

    header('Location: dashboard.php');
    exit;
}

