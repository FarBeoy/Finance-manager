<?php

session_start();
include(__DIR__ . '/../config/config.php');
include(__DIR__ . '/../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = 'Vul alle velden in.';
    } else {
        $stmt = $db->prepare('SELECT id FROM users WHERE username = :username OR email = :email');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->fetch()) {
            $error = 'Deze gebruiker of e-mail bestaat al.';
        } else {
            $password_hash = hashPassword($password);
            $stmt = $db->prepare('INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)');
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password_hash', $password_hash);
            $stmt->execute();
            $_SESSION['user_id'] = $db->lastInsertId();
            header('Location: dashboard.php');
            exit;
        }
    }
}

include "views/register_view.php";

