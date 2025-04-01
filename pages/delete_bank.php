<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bank_id'])) {
    $bank_id = $_POST['bank_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $db->prepare('DELETE FROM bank_accounts WHERE id = :bank_id AND user_id = :user_id');
    $stmt->bindValue(':bank_id', $bank_id);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
}

header('Location: dashboard.php');
exit;
